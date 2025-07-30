<?php

namespace App\Http\Controllers;

use App\Models\Config\AppConfig;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Check if the session has app config data; if not set the config
        if (!Session::get('app_config')) {
            Session::put('app_config', AppConfig::pluck('value', 'config_name')->toArray());
        }

        //Check if the user is on phone, and put into session
        if (!Session::get('is_phone')) {
            Session::put('is_phone', Agent::isPhone());
        }

        //Session::forget('is_phone');
        return view('home');
    }

    public function goodBye()
    {
        return view('goodBye');
    }
}
