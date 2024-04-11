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
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif','max:2048',
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
        }
        else {
            $user->image = 'loi upload file';
            $user->save();
        }
        return redirect("list")->with('success','You have signed-in');
        
    }
   
}
