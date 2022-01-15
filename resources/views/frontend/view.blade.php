@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        View Furniture
    </h1>

    <div class="d-flex justify-content-end container">
        <form action="/search" class="d-flex">
            <input id="search" type="text" name="search" class="form-control" placeholder="Search by furniture's name">
            <button class="text-white rounded ms-3 btn-search btn-submit1" >Search</button>
        </form>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach($data as $item)
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
            <h3>{{ $data->links() }}</h3>
        </center>
    </div>
@endsection

