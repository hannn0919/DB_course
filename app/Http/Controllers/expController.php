<?php

namespace App\Http\Controllers;
use App\exp;
use Auth;
use Illuminate\Http\Request;
use DB;
class expController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseNo = $request->courseNo;
        $Course = DB::select('select course.* from course where course.CourseNo="'.$courseNo.'"');
        return view('addExp', ['Course' => $Course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new exp;
        $post->CourseNo=$request->CourseNo;
        $post->Account=Auth::user()->email;
        $post->Score=$request->Score;
        $post->Semester=$request->Semester;
        $post->Evaluation=$request->Evaluation;
        $post->Outline=$request->Outline;
        $post->Additional=$request->Additional;
        $post->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp=exp::where('ExpNo','=',$id)->get();
        $course=DB::select('select course.* from course where course.CourseNo="'.$exp[0]->CourseNo.'"');
        $users = DB::select('select distinct users.* from users');
        $user_array = array();
        foreach($users as $k=>$c){
            $user_array[$c->email] = $c->name;
        }
        return view('showExp',['exp'=>$exp,'course'=>$course, 'user_array' => $user_array]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=exp::find($id);
        $post->Score=$request->Score;
        $post->Evaluation=$request->Evaluation;
        $post->Outline=$request->Outline;
        $post->Additional=$request->Additional;
        $post->save();
        $exp=exp::where('ExpNo','=',$post->ExpNo)->get();
        $course=DB::select('select course.* from course where course.CourseNo="'.$exp[0]->CourseNo.'"');
        $users = DB::select('select distinct users.* from users');
        $user_array = array();
        foreach($users as $k=>$c){
            $user_array[$c->email] = $c->name;
        }
        return view('showExp',['exp'=>$exp,'course'=>$course, 'user_array' => $user_array]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=exp::where('ExpNo','=',$id);
        $post->delete();
        return redirect()->action('Controller@personal',@Auth::user()->name);
    }
}