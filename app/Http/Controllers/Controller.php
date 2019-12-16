<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function personal()
    {
        $exp = DB::select('select exp.expNo,course.CourseTitle from exp join course on exp.Account="'. Auth::user()->email.'"');
        $comment = DB::select('select comment.CommentNo,course.CourseTitle from comment join course on comment.Account="'. Auth::user()->email.'"');
        $data = array('exp' => $exp,
                      'comment' => $comment
                );
        return view('personal', ['array_data' => $data]);
    }
    
}