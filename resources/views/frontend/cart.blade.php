@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    <h1 class="text-center">
        Cart
    </h1>

    <div class="py-5">
        <div class="container product_data">
            <div class="row">
                <div class="container my-5">
                    <div class="row" style="margin-top: -40px;">
                        @if($cartitems->count() > 0)
                            @php $total = 0; $subtotal = 0; @endphp
                            @foreach($cartitems as $item)
                                <div class="row product_data">
                                    <div class="col-md-2 my-auto">
                                        <img src="{{asset('images/'.$item->furnitures->image)}}" height="140px" width="140px" alt="Image Here">
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>{{$item->furnitures->name}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>Rp. {{number_format($item->furnitures->price)}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                        <h6><input type="text" class="qty-input text-center" style="width: 60px;" value="{{$item->prod_qty}}"> Item(s)</h6>
                                        @php $total += $item->furnitures->price * $item->prod_qty ; @endphp
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>Rp. {{number_format($item->prod_qty * $item->furnitures->price) }}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto" style="padding-bottom: 20px;">
                                        <button class="btn-submit1 btn-sm changeQuantity increment-btn" style="margin-top: 20px; padding: 20px">+</button>
                                        <button class="btn-submit1 btn-sm changeQuantity decrement-btn " style="margin-top: 20px; padding: 20px">-</button>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <h5>Total : Rp {{number_format($total)}}</h5>
                                <button type="submit" class="btn-submit12" style="margin-top: 20px;">
                                    <a class="nav-link" href="{{url('checkout')}}">Proceed To Checkout</a>
                                </button>
                            </div>
                        @else
                            <div class=" text-center">
                                <h2>Your Cart is empty</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
