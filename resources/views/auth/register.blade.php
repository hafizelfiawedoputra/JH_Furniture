@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    <div class="content">
        <div class="wrapper-content">
            <div class="content-title">
                <h1>Register</h1>
            </div>
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <table>
                    <tr>
                        <td width="200">Full Name</td>
                        <td><input type="text" name="name" title="name" placeholder="Enter your full name" autofocus required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" title="email" placeholder="Enter your email" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" title="password" placeholder="Enter your password" minlength="5" maxlength="20" required/></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea name="address" placeholder="Enter your address" minlength="5" maxlength="95" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="Male" id="male">
                            <label name="gender" for="Male">Male</label>
                            <input type="radio" name="gender" value="Female" id="female">
                            <label name="gender" for="Male">Female</label><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <center>
                                <button type="submit" class="btn-submit">Register</button>
                                <br>
                                @if($errors->any())
                                    <i class="text-danger text-center mt-3">{{$errors->first()}}</i>
                                @endif
                            </center>
                        <td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection

