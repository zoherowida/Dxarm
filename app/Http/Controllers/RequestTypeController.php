<?php

namespace App\Http\Controllers;

use App\RequestType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RequestTypeController extends Controller
{
    public function index() {

        $requestType = RequestType::get();
        return view('dashBoard.requestTypes.index',compact('requestType'));
    }

    public function create() {
        return view('dashBoard.requestTypes.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required'],
        ]);

        RequestType::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->action('RequestTypeController@index')->with('message', 'success create request type !');
    }
}
