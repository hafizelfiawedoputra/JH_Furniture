@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        {{$furniture->name}}
    </h1>

    <div class="container">
        <div class="product_data">
            <div>
                <div class="row product_data">
                    <div class="col-6">
                        @if($furniture->image)
                            <img src="{{asset('images/'.$furniture->image)}}" alt="Furniture image" width="400px">
                        @endif
                    </div>
                    <div class="col-6" style="padding-block: 100px;">
                        <div class="row">
                            <div class="col-3"><h3 class="detail">Name : </h3></div>
                            <div class="col-4 c-right"><h3 class="detail">{{$furniture->name}}</h3></div>
                        </div>

                        <div class="row">
                            <div class="col-3"><h3 class="detail">Price : </h3></div>
                            <div class="col-4 c-right"><h3 class="detail">Rp. {{number_format($furniture->price)}}</h3></div>
                        </div>

                        <div class="row">
                            <div class="col-3"><h3 class="detail">Type : </h3></div>
                            <div class="col-4 c-right"><h3 class="detail">{{$furniture->type}}</h3></div>
                        </div>

                        <div class="row">
                            <div class="col-3"><h3 class="detail">Color : </h3></div>
                            <div class="col-4 c-right"><h3 class="detail">{{$furniture->color}}</h3></div>
                        </div>
                    </div>
                </div>
                @guest
                    <div class="d-flex justify-content-center container">
                        <input type="hidden" value="{{$furniture->id}}" class="prod_id">
                        <button type="submit" class="btn-submit12" onclick="window.history.back()">
                            <a class="nav-link">Previous</a>
                        </button>

                        <button type="button" class="btn-submit12">
                            <a class="nav-link addToCartBtn float-start">Add To Cart</a>
                        </button>
                    </div>
                @else
                    @if(auth()->user()->kategori == '1')
                        <div class="d-flex justify-content-center container">
                            <button type="submit" class="btn-submit12" onclick="window.history.back()">
                                <a class="nav-link" href="#">Previous</a>
                            </button>

                            <button type="submit" class="btn-success1">
                                <a class="nav-link" href="{{route('edit_furniture', ['id' => $furniture->id])}}">Update</a>
                            </button>

                            <button type="submit" class="btn-danger1">
                                <a class="nav-link" href="{{route('delete_furniture',['id' => $furniture->id ] )}}">Delete</a>
                            </button>
                        </div>
                    @elseif(auth()->user()->kategori == '0')
                        <div class="d-flex justify-content-center container">
                            <input type="hidden" value="{{$furniture->id}}" class="prod_id">
                            <button type="submit" class="btn-submit12" onclick="window.history.back()">
                                <a class="nav-link">Previous</a>
                            </button>

                            <button type="button" class="btn-submit12">
                                <a class="nav-link addToCartBtn float-start">Add To Cart</a>
                            </button>
                        </div>
                    @endif
                @endguest
            </div>
        </div>
    </div>
@endsection






