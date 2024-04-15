@extends('frontend.layouts.master')

@section('title', 'Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">




            <form class="form"  id="myForm" method="POST" action="{{ route('cart.order') }}">
                @csrf
                <div class="row">



                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h4 class="text-info">Make Your Checkout Here</h4>



                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Name<span>*</span></label>
                                        <input type="text" name="first_name" placeholder=""
                                            value="{{Auth::user()->name }}" value="{{ old('first_name') }}" required  autocomplete="off">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder="" value="{{Auth::user()->email }}"  autocomplete="off">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="number" name="phone" placeholder="" required
                                            value="{{ old('phone') }}"  autocomplete="off"  maxlength="10">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>County<span>*</span></label>

                                        <select name="county" id="county"   autocomplete="off">
                                            <option value="" disabled selected>Select Address</option>
                                            <option value="baringo">Baringo</option>
                                            <option value="bomet">Bomet</option>
                                            <option value="bungoma">Bungoma</option>
                                            <option value="busia">Busia</option>
                                            <option value="elgeyo marakwet">Elgeyo Marakwet</option>
                                            <option value="embu">Embu</option>
                                            <option value="garissa">Garissa</option>
                                            <option value="homa bay">Homa Bay</option>
                                            <option value="isiolo">Isiolo</option>
                                            <option value="kajiado">Kajiado</option>
                                            <option value="kakamega">Kakamega</option>
                                            <option value="kericho">Kericho</option>
                                            <option value="kiambu">Kiambu</option>
                                            <option value="kilifi">Kilifi</option>
                                            <option value="kirinyaga">Kirinyaga</option>
                                            <option value="kisii">Kisii</option>
                                            <option value="kisumu">Kisumu</option>
                                            <option value="kitui">Kitui</option>
                                            <option value="kwale">Kwale</option>
                                            <option value="laikipia">Laikipia</option>
                                            <option value="lamu">Lamu</option>
                                            <option value="machakos">Machakos</option>
                                            <option value="makueni">Makueni</option>
                                            <option value="mandera">Mandera</option>
                                            <option value="meru">Meru</option>
                                            <option value="migori">Migori</option>
                                            <option value="marsabit">Marsabit</option>
                                            <option value="mombasa">Mombasa</option>
                                            <option value="muranga">Muranga</option>
                                            <option value="nairobi">Nairobi</option>
                                            <option value="nakuru">Nakuru</option>
                                            <option value="nandi">Nandi</option>
                                            <option value="narok">Narok</option>
                                            <option value="nyamira">Nyamira</option>
                                            <option value="nyandarua">Nyandarua</option>
                                            <option value="nyeri">Nyeri</option>
                                            <option value="samburu">Samburu</option>
                                            <option value="siaya">Siaya</option>
                                            <option value="taita taveta">Taita Taveta</option>
                                            <option value="tana river">Tana River</option>
                                            <option value="tharaka nithi">Tharaka Nithi</option>
                                            <option value="trans nzoia">Trans Nzoia</option>
                                            <option value="turkana">Turkana</option>
                                            <option value="uasin gishu">Uasin Gishu</option>
                                            <option value="vihiga">Vihiga</option>
                                            <option value="wajir">Wajir</option>
                                            <option value="pokot">West Pokot</option>
                                        </select>


                                            @error('county')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Town<span>*</span></label>
                                        <input type="text" name="address1" placeholder=""
                                            value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address2" placeholder=""
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="post_code" placeholder=""
                                            value="{{ old('post_code') }}">
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Cart
                                            Subtotal<span>ksh {{ number_format(Helper::totalCartPrice(), 2) }}</span></li>
                                        <li class="shipping">
                                            Shipping Cost
                                            @if (count(Helper::shipping()) > 0 && Helper::cartCount() > 0)
                                                <select name="shipping" class="nice-select" >

                                                    <option value="" disabled selected>Select your address</option>
                                                    @foreach (Helper::shipping() as $shipping)
                                                        <option value="{{ $shipping->id }}" class="shippingOption"
                                                            data-price="{{ $shipping->price }}">{{ $shipping->type }}:
                                                            ksh {{ $shipping->price }}</option>
                                                    @endforeach

                                                </select>

                                                <p class="bg-danger">
                                                    @error('shipping')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                               </p>
                                            @else
                                                <span>Free</span>
                                            @endif
                                        </li>

                                        @if (session('coupon'))
                                            <li class="coupon_price" data-price="{{ session('coupon')['value'] }}">You
                                                Save<span>ksh{{ number_format(session('coupon')['value'], 2) }}</span></li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session('coupon')) {
                                                $total_amount = $total_amount - session('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session('coupon'))
                                            <li class="last" id="order_total_price">Total<span>Ksh
                                                    {{ number_format($total_amount, 2) }}</span></li>
                                        @else
                                            <li class="last" id="order_total_price">Total<span>Ksh
                                                    {{ number_format($total_amount, 2) }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->


                            @php
                                $productNames =Helper::getAllProductFromCartName();
                            @endphp
                            <p>{{ implode(' ,  ', $productNames) }}</p>





                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                        <form-group>
                                            <input name="payment_method"  type="radio" value="cod"> <label> Cash On Delivery</label><br>
                                            <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label>
                                            <input name="payment_method"  type="radio" value="mpesa"> <label> Mpesa</label>
                                        </form-group>

                                    </div>
                                </div>
                            </div>



                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <!--
                            <div class="single-widget payement">
                                    <div class="content">
                                        <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                    </div>
                                </div>   -->
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit"  class="btn">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }




    </style>
@endpush


@push('scripts')



    <script>
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis = 'none';
            if (checkbox == "none") {
                vis = 'block';
            }
            if (checkbox == "block") {
                vis = "none";
            }
            document.getElementById(box).style.display = vis;
        }
    </script>

    <script>

        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                // alert(coupon);
                $('#order_total_price span').text('Ksh'  + (subtotal + cost - coupon).toFixed(2));
            });

        });




        // Prevent autocomplete for the input with id "username"


    </script>

    <script> document.getElementById('county').setAttribute('autocomplete', 'new-password');</script>









@endpush
