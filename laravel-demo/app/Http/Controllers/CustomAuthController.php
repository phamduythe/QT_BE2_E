<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Favorite;
use App\Models\User_favorite;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function profileUser($id)
    {
        $user = User::find($id);
        // Lấy danh sách các sở thích của người dùng
        $favorites = User_favorite::where('user_id', $id)->pluck('favorite_id')->toArray();
        // Lấy tất cả các sở thích
        $allFavorites = Favorite::all();

        return view('profile_user', compact('user', 'favorites', 'allFavorites'));
    }

    public function addFavorites(Request $request)
    {
        $userId = $request->user_id;
        $selectedFavorites = $request->favorites;

        // Xóa các sở thích cũ của người dùng
        User_favorite::where('user_id', $userId)->delete();

        // Lưu các sở thích mới
        foreach ($selectedFavorites as $favoriteId) {
            User_favorite::create([
                'user_id' => $userId,
                'favorite_id' => $favoriteId
            ]);
        }

        return redirect()->back()->with('success', 'Your favorites have been updated successfully.');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // $email = '1@gmail.com';
        // $password = 'admin1';

        // if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //     return redirect()->intended('list')->withSuccess('Signed in');
        // }
        // 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')->with('message', 'Đăng nhập thành công !');
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
        ])->with('message', 'Người dùng đã được tạo thành công.');
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);


            // Kiểm tra xem người dùng có sở thích không
            if ($user->favorities()->exists()) {
                return redirect('list')->with('message', 'Người dùng có sở thích, không được xóa user này.');
            }

            // Kiểm tra xem người dùng có bài viết không
            if ($user->posts()->exists()) {
                // Nếu có bài viết, không cho phép xóa người dùng
                return redirect('list')->with('message', 'Người dùng có bài post, không được xóa user này.');
            }

            $user->delete();

            return redirect("list")->with('message', 'Người dùng đã được xóa thành công.');
        } catch (ModelNotFoundException $e) {
            // Xử lý nếu không tìm thấy người dùng
            return redirect("auth.login")->with('message', 'Không tìm thấy người dùng.');
        }
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

    public function view($id)
    {
        $userData = User::find($id);
        return view('auth.profile', compact('userData'));
    }

    public function list()
    {
        $users = User::paginate(3);
        return view('auth.list', compact('users'));
    }
}
