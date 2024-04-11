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
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')->withSuccess('Signed in');
        }

        return redirect("login")->withErrors(['error' => 'Login details are not valid']);
    }

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
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif','max:2048',
            'phone' => 'required|min:10', 'regex:/^\d{10}$/',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have register!');
    }

    public function create(array $data)
    {
        if(isset($data['image'])) {
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

    public function view($id)
    {
        $userData = User::find($id);

        if (!$userData) {
            view('auth.list');
        }
        return view('auth.profile', compact('userData'));
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function list()
    {
        $users = User::paginate(1);
        return view('auth.list', compact('users'));
    }
}
