<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_day;
use App\User_Fuel_day;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Fuel_day::orderBy('day')->get();
        $user_fuel_day = User_Fuel_day::orderBy('id')->get();
        return view('home',compact('days', 'user_fuel_day'));
    }
}
