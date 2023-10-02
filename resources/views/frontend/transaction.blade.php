@extends('layouts.app')

@section('content')

    <head>
        <style>
            table,
            th,
            td {
                border: 2px solid #A748AA;
                color: #151515;
                padding-bottom: 2px;
                padding-top: 2px;
            }

            table {
                border-spacing: 1px;
            }
        </style>
    </head>

    <h1 class="text-center">
        Transaction History
    </h1>

    <div class="py-5">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="container my-5">
                        @if ($transactions->count() > 0)
                            @foreach ($transactions as $transaksi)
                                <div class="card container" style="padding: 30px 30px; margin-block-end: 20px;">
                                    <h5 style="font-weight: bold;">Transaction Id : {{ $transaksi->id }} </h5>
                                    <h6>Transaction Date : {{ $transaksi->created_at }} </h6>
                                    <h6>Method : {{ $transaksi->method }} </h6>
                                    <h6>Card Number : {{ $transaksi->id_card }}</h6>
                                    @if (auth()->user()->kategori == '1')
                                        <h6>User's Name : {{ $transaksi->users->name }}</h6>
                                    @endif
                                    <table class="text-center" style="width:100%">
                                        <tr>
                                            <th>Furniture's Name</th>
                                            <th>Furniture's Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price For Each Furniture</th>
                                        </tr>
                                        @php
                                            $total_price = 0;
                                        @endphp
                                        @foreach ($transaksi->order_items as $order_items)
                                            @if ($order_items->furnitures)
                                                <tr>
                                                    <td>{{ $order_items->furnitures->name }}</td>
                                                    <td>Rp. {{ number_format($order_items->furnitures->price) }}</td>
                                                    <td>{{ $order_items->prod_qty }}</td>
                                                    <td>Rp.
                                                        {{ number_format($order_items->prod_qty * $order_items->furnitures->price) }}
                                                    </td>
                                                </tr>
                                                @php
                                                    $total_price += $order_items->prod_qty * $order_items->furnitures->price;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="3">Total Price</td>
                                            <td>Rp. {{ number_format($total_price) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            @endforeach
                        @else
                            <div class=" text-center">
                                @if (auth()->user()->kategori == '1')
                                    <h2>No transaction from user</h2>
                                @elseif(auth()->user()->kategori == '0')
                                    <h2>Your transaction is empty</h2>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
