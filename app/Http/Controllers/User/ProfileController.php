<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function password()
    {
        return view('pages.user.my.password');
    }

    public function passwordUpdate(Request $request)
    {
        $user = Auth::user();        
       
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
        
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return back()->with('success', 'Üstünlikli ýatda saklanyldy!');
        } else {
            return back()->with('error', 'Mesele ýüze çykdy!');            
        };
    }

}
