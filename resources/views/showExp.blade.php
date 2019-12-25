@extends('layouts.app')

@section('title') 發表心得 @endsection

@section('content')
	<br>
	<div class="card">
		<div class="card-header text-center font-weight-bold bg-white" style="border-color:#00324e;">心得</div>
		<div class="card-body" style="overflow: scroll;">
            <h3 class = "card-title"><span class="label label-default">課號</span>{{$exp[0]->CourseNo}}</h3><br>
			<h3 class = "card-title"><span class="label label-default">課名</span>{{$course[0]->CourseTitle}}</h3><br>
			<h3 class = "card-title"><span class="label label-default">開課系所</span>{{$course[0]->Department}}</h3><br>
			<h3 class = "card-title"><span class="label label-default">授課老師</span>{{$course[0]->Instructor}}</h3><br>
			<h3 class = "card-title"><span class="label label-default">開課年度</span>{{$exp[0]->Semester}}</h3><br>
			<h3 class = "card-title"><span class="label label-default">推薦指數</span>{{$exp[0]->Score}}</h3><br>

			<p class = "card-text"><span class="label label-default">評分方式</span>{{$exp[0]->Evaluation}}</p><br>

			<p class = "card-text"><span class="label label-default">考試與作業</span>{{$exp[0]->Outline}}</p><br>
			<p class = "card-text"><span class="label label-default">其他</span>{{$exp[0]->Additional}}</p><br>
		</div>
	</div>
@endsection
