<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $users = User::all();
            if ($user->user_type == 0) {
                return redirect()->route('adminprofile', compact('users'));
            } 
            elseif ($user->user_type == 1) {
                return redirect()->route('userprofile', compact('user'));
            }
        }
        else 
        {
            // Giriş başarısız

            // Email kontrolü
            $user = \App\Models\User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'Bu email adresi kayıtlı değil.'])->withInput();
            }

            // Parola kontrolü
            if (!\Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'Parola yanlış.'])->withInput();
            }

            return redirect()->back()->withErrors(['email' => 'Giriş bilgileri hatalı.'])->withInput();
        }
    }
}
