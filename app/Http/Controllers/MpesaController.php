<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
//use Illuminate\Support\Facades\Session;
use Mpesa;
//use App\Models\User;
use App\Models\Transaction;
use App\Models\payments;
use Str;
use Session;
use Mail;
use App\Mail\bookMail;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use DB;
use App\User;

class MpesaController extends Controller
{
  ///public $reCode

 // public function __construct()
  //{
   //   $this->reCode ;
 // }


    public function stkSimulation()
    {
        //$user = User::find($user_id);

     //  $item_file_path=$item->file_path;
        //$cart = \Cart::getContent();
//dd(auth()->user()->id);
       // $cart = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();

        //$data = [];

 $order = Order::where('user_id', auth()->user()->id)->latest()
                  ->first();
 $myphone = $order->phone;
 $price=$order->total_amount;


        //if ($request->email !== $request->email_confirmation) {
            //return response()->json(['error' => '.'], 422);
           //session()->flash('error','Email confirmation does not match please try again! !');
         //  return response()->json(['error' => 'Email confirmation does not match please check and try again! ']);
          // return back();
          //  return redirect('/confirmation');
            //return back()->with('error', 'Email confirmation does not match please try again!');
       // }

       // $myphone=$request->phone;
        //$myemail=$request->email;

       // $formattedPrice = number_format($bookPrice, 0, '', '');

        //$transId = Str::random().$bookId.$formattedPrice;
        /*
        $transexists = Order::where('phone', $myphone)->where('status', 'new')->latest

        ->first();

        $oneMinuteAgo = Carbon::now()->subMinutes(1);
        $mytrans=Transaction::where('created_at', '<', $oneMinuteAgo)->where('status',0)->first();
        if ($mytrans !== null) {
          $mytrans->status = 3;
          $mytrans->save();
      }

        if($transexists){
            //session()->flash('error','You still have a pending transaction  wait for 5 minutes and try again!');
            //return back();

            return response()->json(['error' => 'You still have a pending transaction  wait for one minute and try again']);
        }  */




        /*
        $trans = new Transaction;
        //$trans->user_id = $user_id;
        $trans->phone=$myphone;
        $trans->email= $myemail;
        $trans->transaction_id =$transId;
        //$trans->cart = json_encode($cart);

        $trans->item_id=$bookId;
        $trans->save(); */



        $phone = $myphone;
        $formatedPhone = substr($phone, 1);//726582228
        $code = "254";
        $phoneNumber = $code.$formatedPhone;//254726582228


        //start of function call to initiate mpesa payment
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $BusinessShortCode=174379;
        //$LipaNaMpesaPasskey=env('MPESA_PASS_KEY');
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType="CustomerPayBillOnline";
        $Amount=$price;
        $PartyA=$phoneNumber;
        $PartyB=174379;
        $PhoneNumber=$phoneNumber;
        $CallBackURL="https://1a25-102-213-241-73.ngrok-free.app/api/mpesa/stkpush/response";
        $AccountReference="DAVIS's SHOP ";
        $TransactionDesc="lipa Na M-PESA web development";
        $Remarks="Thank for paying!";

        $stkPushSimulation=$mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);

       // return  $stkPushSimulation;


      // return redirect('/confi')->with('success', 'Operation was successful wait as process your payment...!');

      //return redirect('/');
      //return response()->json(['message' => 'Request received successfully check your email for the item']);






    //  return response()->json(['message' => 'Request received successfully check your email for the item']);


  // Return a response message
  //return response()->json([
     // 'message' => 'Check your phone for the M-PESA prompt to enter your PIN...After Payment  check your email for your item',
 // ]);

  session()->forget('cart');
  session()->forget('coupon');

  request()->session()->flash("success","Check your phone for the M-PESA prompt to enter your PIN...After Payment  check your email for your item");

  return redirect()->route('home');


  }





    public function resData(Request $request)
    {

        $response = json_decode($request->getContent());
        \Log::info(json_encode($response));
        $resData =  $response->Body->stkCallback->CallbackMetadata;
       $reCode =$response->Body->stkCallback->ResultCode;
        $resMessage =$response->Body->stkCallback->ResultDesc;
        $amountPaid = $resData->Item[0]->Value;
        $mpesaTransactionId = $resData->Item[1]->Value;
        $paymentPhoneNumber =$resData->Item[4]->Value;
        $paymentDate =$resData->Item[3]->Value;
        //replace the first 254 with 0
        $formatedPhone = str_replace("254","0",$paymentPhoneNumber);
        //$user = transanction::where('phone', $formatedPhone)->first();
        $order = Order::where('phone', $formatedPhone)->where('status', 'new')->latest
        ->first();
       // $trans = Transaction::where('phone', $formatedPhone)->where('status', 0)->first();
       // $trans = Transaction::with('items')->where('phone', $formatedPhone)->where('status', 0)->first();

       $order_number=$order->order_number;


       // $mymyitem = $trans->items->id;

        $payment = new payments;
        $payment->amount = $amountPaid;

        //$payment->user_id = $user->id;
        //$payment->user_id = 1;
        $payment->mpesa_code = $mpesaTransactionId;
        $payment->phone = $formatedPhone;
       $payment->order_number= $order_number;
       $payment->user_id=order->user_id;

        $payment->save();

        $order->status = 'delivered';
        $order->save();

       // $payment = Payment::where('mpesa_trans_id', $mpesaTransactionId)->where('phone', $formatedPhone)->first();


       /* if($payment){

   $fileTittle=$title;
   $mailData=[

    'title'=>$title,
    'body'=>$desc,
    'attachment' => public_path($item_file_path)
   ];
  // $mailData=public_path('/public/uploads/1696507541_Doc15.pdf');
   Mail::to($email)->send(new bookMail($mailData, $fileTittle));

   //\Log::info(json_encode($item));
  //dd('email send well');
//return response()->json('success', 'PDF sent successfully!');

//return response()->json(['message' => 'Request received successfully check your email for the item']);


    // Email sent successfully
  //  return redirect('/confirmation')->with('success', 'Email sent successfully! Check your email for the item.');
  //Log::info('Email sent successfully.');

  return response()->json(['message' => 'Request received successfully check your email for the item']);


//return redirect('/confirmation');
}
*/





    }





}
