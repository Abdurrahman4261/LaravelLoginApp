<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function profile(){
        return view('admindashboard',compact('users'));
    }
    public function index()
    {
        $users = User::all(); 

        return view('admindashboard', compact('users'));
    }

    public function userlist()
    {
        $users = User::all();
        return view('userlist', compact('users'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function view(User $user)
    {
        return view('admin.users.view', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string', // Adres alanı burada validasyon kurallarına dahil edilmeli
        ]);

        // Kullanıcı verilerini güncelle
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address; // Doğru alan adını kullanarak güncelleme yapın
        $user->save();

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }
    public function destroy(User $user)
    {
        $user->delete(); 

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}
