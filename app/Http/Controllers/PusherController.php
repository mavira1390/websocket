<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
    {

        broadcast(new PusherBroadcast($request->username ,$request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message') ,'username' => $request->username ]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message') ,'username' => $request->username ]);
    }
}
