@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')

        <div class="content">
            <div class="wrapper-content">
                <div class="content-title">
                    <h1>Update Furniture</h1>
                </div>
                <form action="{{ url('update-furniture/'.$furniture->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <td width="200">Name</td>
                            <td><input type="text" name="name" value="{{$furniture->name}}" title="name" placeholder="Enter the furniture's name" autofocus required/>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><input type="number" name="price" value="{{$furniture->price}}" title="price" placeholder="Enter furniture's price" min="5000" max="10000000" required/></td>
                            </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>
                                <select name="type" required>
                                    <option value="">Choose furniture's type</option>
                                    <option value="Chair">Chair</option>
                                    <option value="Table">Table</option>
                                    <option value="Sofa">Sofa</option>
                                    <option value="Bed">Bed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>
                                <select name="color" required>
                                    <option value="">Choose furniture's color</option>
                                    <option value="Black">Black</option>
                                    <option value="Pink">Pink</option>
                                    <option value="White">White</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Furniture Image</td>
                            <td>
                                <input type="file" name="image" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br>
                                <center>
                                    <button type="submit" class="btn-submit">Update Furniture</button>
                                </center>
                            <td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
@endsection
