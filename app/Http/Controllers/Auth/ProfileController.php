<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profile(){
        return view('auth.profile.index');
    }

    public function update_profile_admin(Request $request, $id){
        $profile = User::find($id);

        $profile->name = $request->name != null ? $request->name : $profile->name;
        $profile->email = $request->email;
        $profile->password = Hash::make($request['password']);

        $profile->save();
        return redirect('profile');
    }

    public function update_profile_member(Request $request, $id){
        $profile = User::find($id);

        $profile->name = $request->name != null ? $request->name : $profile->name;
        $profile->email = $request->email;
        $profile->password = Hash::make($request['password']);
        $profile->address = $request->address;

        $profile->save();
        return redirect('profile');
    }

    public function edit_admin_profile($id){
        $user = User::find($id);
        return view('auth.profile.update-admin', compact('user'));
    }

    public function edit_member_profile($id){
        $user = User::find($id);
        return view('auth.profile.update-member', compact('user'));
    }
}
