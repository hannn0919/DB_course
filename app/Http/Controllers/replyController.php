<?php

namespace App\Http\Controllers;
use App\reply;
use Illuminate\Http\Request;

class replyController extends Controller
{
    public function store(Request $request)
    {
        $post= new reply;
        $post->CommentNo=reply::max('ReplyNo')+1;
        $post->CourseNo=$request->CourseNo;
        $post->Account=Auth::user()->email;
        $post->Comment=$request->Comment;
        $post->save();
        return redirect()->action('Controller@personal',@Auth::user()->name);
    }

    public function update(Request $request, $id)
    {
        $post=reply::find($id);
        $post->CourseNo=$request->CourseNo;
        $post->Account=Auth::user()->email;
        $post->Comment=$request->Comment;
        $post->save();
        return redirect()->action('Controller@course',$request->CourseNo);
    }
    
    public function destroy($id)
    {
        $post=reply::where('ReplyNo','=',$id);
        $post->delete();
        return redirect()->action('Controller@personal',@Auth::user()->name);
    }
}
