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

    public function view($id)
    {
        $userData = User::find($id);

        if (!$userData) {
            view('auth.list');
        }
        return view('auth.profile', compact('userData'));
    }

    public function list()
    {
        $users = User::paginate(1);
        return view('auth.list', compact('users'));
    }
}
