<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Request as RequestModel;
use App\RequestStatus;
use App\Step;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index() {
        $requests = RequestModel::get();

        return view('dashBoard.requests.index',compact('requests'));
    }

    public function myRequest(){

        $requests = RequestModel::with('RequestStatus')->whereHas('Step', function ($query) {
            return $query->where('userId', '=', Auth::user()->id);
        })->get();
        return view('dashBoard.requests.myRequest',compact('requests'));
    }

    public function approveRequest(RequestModel $requestId, $status){

        $stepId = Step::where('userId', Auth::user()->id)->first()->id;
        $checkIsChangeStatus = RequestStatus::where('requestId',$requestId->id)->where('userId',Auth::user()->id)->get()->count();
        if($checkIsChangeStatus == 1) {
            return abort(404);
        }else if($status == 1 || $status == 2) {
            $requestId->update(array('stepId' => $stepId+1));
            RequestStatus::create([
                'requestId' => $requestId->id,
                'status' => $status,
                'userId' => Auth::user()->id,
                'stepId' => $stepId,
            ]);
            $statusName =  '';
            $status == 1 ? $statusName ='Approved': $statusName ='Rejected';
            return redirect()->back()->with('message', 'success '. $statusName .' Request !');
        } else {
            return abort(404);
        }
    }
}
