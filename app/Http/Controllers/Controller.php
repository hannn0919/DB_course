<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function personal($name)
    {   
        //$name =Auth::user()->name;
        $exp = DB::select('select exp.expNo,course.CourseTitle,course.CourseNo from exp join course on exp.Account="'. Auth::user()->email.'" and exp.CourseNo=course.CourseNo');
        $comment = DB::select('select comment.CommentNo,course.CourseTitle,course.CourseNo from comment join course on comment.Account="'. Auth::user()->email.'" and comment.CourseNo=course.CourseNo');
        $data = array('exp' => $exp,
                      'comment' => $comment,
                );
        return view('personal', ['name'=>$name,'array_data' => $data]);
    }

    public function adminPersonal()
    {   
        $name =Auth::user()->name;
        $exp = DB::select('select exp.expNo,course.CourseTitle,course.CourseNo from exp join course on exp.CourseNo=course.CourseNo order by expNo');
        $comment = DB::select('select comment.CommentNo,course.CourseTitle,course.CourseNo from comment join course on comment.CourseNo=course.CourseNo order by CommentNo');
        $data = array('exp' => $exp,
                      'comment' => $comment,
                );
        return view('personal', ['name'=>$name,'array_data' => $data]);
    }

    public function resetPassword(Request $request)
    {
        $params = $request -> all();
        $user = Auth::user();
        
        if($params['newPassword'] == $params['confirmPassword']){
            if(Hash::check($params['oldPassword'], $user -> password)){
                $user -> password = Hash::make($params['newPassword']);
                $user -> setRememberToken(Str::random(60));
                $user -> save();
                return redirect()->back()->with('alert', '密碼已變更!');
            }
            else return redirect()->back()->with('alert', '舊密碼錯誤!');
        }
        else return redirect()->back()->with('alert', '新密碼輸入不一致!');
    }

    public function course($courseNo)
    {
        $Course = DB::select('select course.* from course where course.CourseNo="'.$courseNo.'"');
        $exps = DB::select('select distinct exp.* from exp join course on exp.CourseNo="'.$courseNo.'"');
        $comments = DB::select('select distinct comment.* from comment join course on comment.CourseNo="'.$courseNo.'"');
        $reply_array = array();
        foreach($comments as $k=>$c){
            $reply_array[$c->CommentNo] = DB::select('select distinct reply.* from reply where reply.CommentNo="'.$c->CommentNo.'"');
        }
        $users = DB::select('select distinct users.* from users');
        $user_array = array();
        foreach($users as $k=>$c){
            $user_array[$c->email] = $c->name;
        }
        $data = array(
                    'Course' => $Course,
                    'CourseNo' => $courseNo,
                    'exps' => $exps,
                    'comments'=>$comments);
        return view('course', ['array_data' => $data, 'reply_array'=>$reply_array, 'user_array' => $user_array]);
    }

    public function editExp($expNo)
    {
        $exp = DB::select('select distinct exp.* from exp where exp.expNo="'.$expNo.'"');
        $course=DB::select('select course.* from course where course.CourseNo="'.$exp[0]->CourseNo.'"');
        return view('editExp', ['exp' => $exp, 'Course'=>$course]);
    }
  
}