<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:6',
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'phone' => 'required|min:10', 'regex:/^\d{10}$/',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have register!');
    }

    public function create(array $data)
    {
        if (isset($data['image'])) {
            $file = $data['image'];
            $path = 'images/avatar';
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
        } else {
            $fileName = 'avatar_defaul.jpg';
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' =>  $fileName,
            'password' => Hash::make($data['password'])
        ])->with('message', 'Người dùng đã được xóa thành công.');
    }
}
