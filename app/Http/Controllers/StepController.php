<?php

namespace App\Http\Controllers;

use App\Step;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class StepController extends Controller
{
    public function index() {

        $steps = Step::get();
        return view('dashBoard.steps.index',compact('steps'));
    }

    public function create() {
        $users = User::get();
        return view('dashBoard.steps.create',compact('users'));

    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required'],
            'stepNumber' => ['required'],
            'userId' => ['required', 'exists:users,id'],
        ]);

        Step::create([
            'name' => $request->input('name'),
            'stepNumber' => $request->input('stepNumber'),
            'userId' => $request->input('userId')
        ]);

        return redirect()->action('StepController@index')->with('message', 'success create step !');
    }
}
