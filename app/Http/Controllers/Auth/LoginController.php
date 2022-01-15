<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $remember_me = $request->remember_me;

        $isValid =  auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if ($isValid){
            if($remember_me){
                Cookie::queue('email', $email, 60);
                Cookie::queue('password', $password, 60);
            }

            if(Auth::user()->kategori == '1') {
                return redirect('/');
            } elseif(Auth::user()->kategori == '0') {
                return redirect('/');
            }
        }else{
            return back()->withErrors(new MessageBag(['Invalid email or password']));
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}







