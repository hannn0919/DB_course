<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
    public function index()
    {
        $departments = DB::table('course')->select('Department')->distinct()->get();
        $exps = DB::table('exp')->get();
        $data = array('departments' => $departments,
                    'exps' => $exps);
        return view('home', ['array_data' => $data]);
    }
}
