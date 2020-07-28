<?php

namespace App\Http\Controllers;

use App\RequestType;
use App\Step;
use App\User;
use App\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeDashBoardController extends Controller
{

    public function index() {
        $countUser = User::count();
        $countStep = Step::count();
        $countRequestType = RequestType::count();
        $countRequest = RequestModel::count();
        $analytics = [
            'Users' => $countUser,
            'Steps' => $countStep,
            'Request Type' => $countRequestType,
            'Request' => $countRequest
        ];
        return view('dashBoard.home',compact('analytics'));
    }
}
