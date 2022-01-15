@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="wrapper-content">
            <div class="content-title">
                <h1>Update Profile</h1>
            </div>
            <form action="{{ url('update-profile-admin/'.$user->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td width="200">Full Name</td>
                        <td><input type="text" name="name" value="{{$user->name}}" title="name" placeholder="Enter your full name" autofocus required/>
                            @error('name') Name already exists @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" title="email" value="{{$user->email}}" placeholder="Enter your email" required/>
                            @error('email') Email already exists @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" title="password" placeholder="Enter your password" minlength="5" maxlength="20"  required/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <center>
                                <button type="submit" class="btn-submit">Update Profile</button>
                            </center>
                        <td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection



