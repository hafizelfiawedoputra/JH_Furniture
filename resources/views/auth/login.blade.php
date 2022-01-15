@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    <div class="content">
        <div class="wrapper-content">
            <div class="content-title">
                <h1>Login</h1>
            </div>
            <form action="/login" method="POST">
                @csrf
                <table class="text-center">
                    <tr>
                        <td width="200">Email</td>
                        <td><input value="{{Cookie::get('email')}}" type="email" id="inputEmailAddress" name="email" title="email" placeholder="Enter your email" autofocus required/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input value="{{Cookie::get('password')}}" type="password" id="inputPassword" name="password" title="password" placeholder="Enter your full password" required/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="checkbox" name="remember_me" class="form-check-input" value="Remember Me"> Remember Me</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <center>
                                <button type="submit" class="btn-submit text-center">Login</button>
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
