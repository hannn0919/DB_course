<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
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
        $ExpNo=$post->ExpNo;
        return view('showExp',['ExpNo'=>$ExpNo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$courseNo)
    {
        $exp=exp::where('ExpNo','=',$id)->get();
        $course=DB::select('select course.* from course where course.CourseNo="'.$ExpNo->CourseNo.'"');
        return view('showExp',['exp'=>$exp,'course'=>$course]);
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
        $post = exp::find($id);
        $post->Score=$request->Score;
        $post->Evaluation=$request->Evaluation;
        $post->Outline=$request->Outline;
        $post->Additional=$request->Additional;
        $post->save();
        $ExpNo=$post->ExpNo;
        return view('showExp',['ExpNo'=>$ExpNo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = exp::find($id);
        $post->delete();
    }
}
