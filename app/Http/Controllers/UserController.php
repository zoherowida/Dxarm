<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {

        $users = User::get();
        return view('dashBoard.users.index',compact('users'));
    }

    public function create() {
        return view('dashBoard.users.create');

    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->action('UserController@index')->with('message', 'success create user !');
    }
}
