@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    <h1 class="text-center">
        Welcome, Admin {{auth()->user()->name}}
    </h1>
    <h1 class="text-center">
        to JH Furniture
    </h1>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Available Furniture!!</h2>
                @foreach($datafurniture as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img style="height: 300px;" src="{{asset('images/'.$item->image)}}" alt="Product image">
                            <a href="{{route('detail_furniture', ['id' => $item->id] )}}" class="link-light">
                                <div class="card-body">
                                    <h5 class="text-center text-white">{{$item->name}}</h5>
                                    <h5 class="text-center text-white">Rp {{$item->price}}</h5>
                                    <a href="{{route('edit_furniture', ['id' => $item->id])}}" class="btn btn-success">Update</a>
                                    <a href="{{route('delete_furniture', ['id' => $item->id])}}" class="btn btn-danger float-end">Delete</a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
