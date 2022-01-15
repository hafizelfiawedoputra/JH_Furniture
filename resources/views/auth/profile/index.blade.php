@extends('layouts.app')

<link href="{{ asset('frontend/css/contentLoginRegister.css') }}" rel="stylesheet" >

@section('content')
    @if(auth()->user()->kategori == '1')
        <div class="content">
            <div class="wrapper-content">
                <div class="content-title">
                    <h1>{{auth()->user()->name}}'s Profile</h1>
                </div>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <td width="200">Name</td>
                            <td>{{auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{auth()->user()->kategori == 1 ? 'Admin':''}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br>
                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </button>

                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{url('view-transaction')}}">View All User’s Transaction</a>
                                </button>

                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{url('edit-profile/admin/'.auth()->user()->id)}}">Update Profile</a>
                                </button>
                            <td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    @elseif(auth()->user()->kategori == '0' )
        <div class="content">
            <div class="wrapper-content">
                <div class="content-title">
                    <h1>{{auth()->user()->name}}'s Profile</h1>
                </div>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <td width="200">Name</td>
                            <td>{{auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{auth()->user()->address}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{auth()->user()->gender}}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{auth()->user()->kategori == 0 ? 'Member':''}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br>
                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </button>

                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{url('view-transaction')}}">View Transaction History</a>
                                </button>

                                <button type="submit" class="btn-submit1">
                                    <a class="nav-link" href="{{url('edit-profile/member/'.auth()->user()->id)}}">{{ __('Update Profile') }}</a>
                                </button>
                            <td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    @endif

@endsection
