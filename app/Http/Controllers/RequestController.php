<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Request as RequestModel;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index() {
        $requests = RequestModel::get();

        return view('dashBoard.requests.index',compact('requests'));
    }

    public function myRequest(){

        $requests = RequestModel::whereHas('Step', function ($query) {
            return $query->where('userId', '=', Auth::user()->id);
        })->get();
        return $requests;
    }

    public function approveRequest(RequestModel $requestId, $status){

        return $requestId;
    }
}
