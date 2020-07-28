<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Request as RequestModel;

class RequestController extends Controller
{
    public function index() {
        $requests = RequestModel::get();

        return view('dashBoard.requests.index',compact('requests'));
    }
}
