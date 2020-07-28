<?php

namespace App\Http\Controllers;

use App\RequestType;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Request as RequestModel;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getDraft() {

        $draft =  session()->get('draft');
        if($draft) {
//            session()->forget('draft');
                return redirect()->action('HomeController@formRequest')->with('draftToRequest', $draft);
        } else {
            return redirect()->action('HomeController@formRequest')->with('error', 'Sorry, a draft was not found!');
        }
    }
    public function formRequest($draft = []){

        $requestType = RequestType::get();
        return view('formRequest',compact('requestType'));
    }

    public function saveRequest(Request $request) {

        try {

        switch ($request->input('action')) {

            case 'save':
                session(['draft' => $request->all()]);
                return redirect()->action('HomeController@formRequest')->with('message', 'success save request in draft !');
                break;

            case 'submit':

                $request->validate([
                    'name' => ['required'],
                    'requestType' => ['required', 'exists:request_types,id'],
                    'justification' => ['required']
                ]);
                RequestModel::create([
                    'name' => $request->input('name'),
                    'requestType' => $request->input('requestType'),
                    'justification' => $request->input('justification'),
                    'stepId' => 1,
                    'attachment' => ''
                ]);
                session()->forget('draft');
                return redirect()->action('HomeController@formRequest')->with('message', 'Thank you for submit request');
                break;
        }
        } catch(Throwable $e) {
            return redirect()->action('HomeController@formRequest')->with('error', 'Sorry, please try again!');

        }

    }
}
