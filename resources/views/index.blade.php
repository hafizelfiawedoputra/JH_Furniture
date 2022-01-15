@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    <h1 class="text-center">
        @guest
            Welcome To JH Furniture
        @else
            @if(auth()->user()->kategori == '1')
                <h1 class="text-center">
                    Welcome {{auth()->user()->name}}
                </h1>
                <h1 class="text-center">
                    To JH Furniture
                </h1>
            @elseif(auth()->user()->kategori == '0')
                <h1 class="text-center">
                    Welcome {{auth()->user()->name}}
                </h1>
                <h1 class="text-center">
                    To JH Furniture
                </h1>
            @endif
        @endguest
    </h1>

    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach($furniture as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card product_data">
                            @guest
                                <a href="{{url('detail/'.$item->id)}}" class="link-light">
                                    <img style="height: 300px;" src="{{asset('images/'.$item->image)}}" alt="Product image">

                                    <div class="card-body">
                                        <input type="hidden" value="{{$item->id}}" class="prod_id">
                                        <h5 class="text-center">{{$item->name}}</h5>
                                        <h5 class="text-center">Rp. {{number_format($item->price)}}</h5>
                                        <a class="btn btn-white addToCartBtn center">Add To Cart</a>
                                    </div>
                                </a>
                            @else
                                @if(auth()->user()->kategori == '1')
                                    <a href="{{url('detail/'.$item->id)}}" class="link-light">
                                        <img style="height: 300px;" src="{{asset('images/'.$item->image)}}" alt="Product image">

                                        <div class="card-body">
                                            <h5 class="text-center">{{$item->name}}</h5>
                                            <h5 class="text-center">Rp {{number_format($item->price)}}</h5>
                                            <a href="{{route('edit_furniture', ['id' => $item->id])}}" class="btn btn-success">Update</a>
                                            <a href="{{route('delete_furniture', ['id' => $item->id])}}" class="btn btn-danger float-end">Delete</a>
                                        </div>
                                    </a>
                                @elseif(auth()->user()->kategori == '0')
                                    <a href="{{url('detail/'.$item->id)}}" class="link-light">
                                        <img style="height: 300px;" src="{{asset('images/'.$item->image)}}" alt="Product image">

                                        <div class="card-body">
                                            <input type="hidden" value="{{$item->id}}" class="prod_id">
                                            <h5 class="text-center">{{$item->name}}</h5>
                                            <h5 class="text-center">Rp {{number_format($item->price)}}</h5>
                                            <a class="btn btn-white addToCartBtn center">Add To Cart</a>
                                        </div>
                                    </a>
                                @endif
                            @endguest
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="buttonPn">
        <center>
            <h3>{{ $furniture->links() }}</h3>
        </center>
    </div>
@endsection
