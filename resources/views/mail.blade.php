<html>
<head>
  <title>NEXGENTECH SOLUTONS</title>
  @include('frontend.layouts.head')	
</head>

<body> <h4>We will get in touch shortly, for any query feeel free to conduct us!</h4>


       
       

       
  


    <h1 class="text-danger"> Order number : {{ $fileTittle }} : For the item(s)</h1>

  <h3 class="text-success">{{$mailData['title'] }}</h3>

  <h2 class="text-danger">Total price : Ksh {{ $myprice }}</h2>
  
  <p>
    @foreach ($myphoto as $imagePath)
    <img src="{{ $message->embed(public_path($imagePath)) }}" alt="">
   @endforeach
</p>

</body>

</html>