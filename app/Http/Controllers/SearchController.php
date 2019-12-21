<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    //
    public function __invoke(Request $request){
        $result=$request->all();
        $search = $request->search;
        $way = $request->way ;
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
}
