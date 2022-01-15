@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        Checkout
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
                                    <div class="col-md-3 my-auto">
                                        <img src="{{asset('images/'.$item->furnitures->image)}}" height="140px" width="140px" alt="Image Here">
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <h6>{{$item->furnitures->name}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>Rp. {{number_format($item->furnitures->price)}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>{{$item->prod_qty}} Item(s)</h6>
                                        @php $total += $item->furnitures->price * $item->prod_qty ; @endphp

                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6>Rp. {{number_format($item->prod_qty * $item->furnitures->price) }}</h6>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <h5>Total : Rp {{number_format($total)}}</h5>
                            </div>

                            <div class="row content" style=" margin-left: 50px;">
                                <form action="{{url('place-transaction')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <table>
                                        <tr>
                                            <td width="200">Payment Method</td>
                                            <td>
                                                <input type="radio" name="method" value="Credit" id="credit">
                                                <label name="method" for="Credit">Credit</label>
                                                <input type="radio" name="method" value="Debit" id="debit">
                                                <label name="method" for="Debit">Debit</label><br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Card Number</td>
                                            <td><input type="text" name="id_card" title="id_card" placeholder="Enter Card Number" required/>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <button type="submit" class="btn-submit12" style=" margin-right: 50%; margin-left: 70%">
                                                        <a class="nav-link">Checkout</a>
                                                        @if($errors->any())
                                                            <i class="text-danger text-center mt-3">{{$errors->first()}}</i>
                                                        @endif
                                                    </button>
                                                </div>
                                            <td>
                                        </tr>
                                    </table>
                                </form>
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
