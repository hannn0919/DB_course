<?php

namespace App\Http\Controllers;
use App\reply;
use Auth;
use Illuminate\Http\Request;

class replyController extends Controller
{
    public function store(Request $request)
    {
        $post= new reply;
        $post->ReplyNo=reply::max('ReplyNo')+1;
        $post->CommentNo=$request->CommentNo;
        $post->Account=Auth::user()->email;
        $post->Content=$request->Content;
        $post->save();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $post=reply::find($id);
        $post->CommentNo=$request->CommentNo;
        $post->Account=Auth::user()->email;
        $post->Content=$request->Content;
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
