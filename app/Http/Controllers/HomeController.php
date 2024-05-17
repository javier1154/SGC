<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_day;

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
        return view('home',compact('days'));
    }
}
