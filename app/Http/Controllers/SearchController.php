<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    //
    public function index(Request $request){
        $result=$request->all();
        $search = $request->search;
        $way = $request->way ;
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
    public function one(){
        $search = "資訊";
        $way = "Department";
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
    public function two(){
        $search = "3";
        $way = "Type";
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
    public function three(){
        $search = "4";
        $way = "Type";
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
    
    public function four(){
        $search = "5";
        $way = "Type";
         $courses=DB::table('course')->select('*')->where($way,'LIKE','%'.$search.'%')->get();
         if(count($courses) > 0)
             return view('search')->withDetails($courses)->withQuery ( $search );
         else return view ('search')->withMessage('No Details found. Try to search again !');    
    }
}
