<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect("list")->with('message', 'Người dùng không tồn tại.');
        }

        $user->delete();
        return redirect("list")->with('message', 'Người dùng đã được xóa thành công.');
    }

    public function update($id)
    {
        $userData = User::find($id);
        return view('auth.update', compact('userData'));
    }

    public function customUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10', 'regex:/^\d{10}$/',
            'password' => 'required|min:6',
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
        ]);
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'User khong ton tai.']);
        }

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        if ($user->image) {
            Storage::delete('images/avatar/' . $user->image);
        }
        if ($request->hasFile('image')) {
            $avatarPath = $request->file('image');
            $path = 'images/avatar';
            $imageName = $avatarPath->getClientOriginalName();
            $avatarPath->move($path, $imageName);
            $user->image = $request->file('image')->getClientOriginalName();
            $user->save();
        } else {
            $user->image = 'loi upload file';
            $user->save();
        }
        return redirect("list")->with('success', 'You have signed-in');
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
