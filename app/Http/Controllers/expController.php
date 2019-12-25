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
        // $id=$post->ExpNo;
        //$exp=exp::where('ExpNo','=',$post->ExpNo)->get();
        //$course=DB::select('select course.* from course where course.CourseNo="'.$exp[0]->CourseNo.'"');
        //return view('showExp',['exp'=>$exp,'course'=>$course]);
        $name =Auth::user()->name;
        $exp = DB::select('select exp.expNo,course.CourseTitle from exp join course on exp.Account="'. Auth::user()->email.'" and exp.CourseNo=course.CourseNo');
        $comment = DB::select('select comment.CommentNo,course.CourseTitle from comment join course on comment.Account="'. Auth::user()->email.'" and comment.CourseNo=course.CourseNo');
        $data = array('exp' => $exp,
                      'comment' => $comment,
                );
        return view('personal', ['name'=>$name,'array_data' => $data]);
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
        $name =Auth::user()->name;
        $exp = DB::select('select exp.expNo,course.CourseTitle from exp join course on exp.Account="'. Auth::user()->email.'" and exp.CourseNo=course.CourseNo');
        $comment = DB::select('select comment.CommentNo,course.CourseTitle from comment join course on comment.Account="'. Auth::user()->email.'" and comment.CourseNo=course.CourseNo');
        $data = array('exp' => $exp,
                      'comment' => $comment,
                );
        return view('personal', ['name'=>$name,'array_data' => $data]);
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
