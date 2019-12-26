<?php

namespace App\Http\Controllers;
use App\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new comment;
        $post->CommentNo=comment::max('CommentNo')+1;
        $post->CourseNo=$request->CourseNo;
        $post->Account=Auth::user()->email;
        $post->Comment=$request->Comment;
        $post->save();
        return redirect()->action('Controller@personal',@Auth::user()->name);
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
        $post=comment::find($id);
        $post->CourseNo=$request->CourseNo;
        $post->Account=Auth::user()->email;
        $post->Comment=$request->Comment;
        $post->save();
        return redirect()->action('Controller@course',$request->CourseNo);
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
