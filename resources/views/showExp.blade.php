@extends('layouts.app')

@section('title') 發表心得 @endsection

@section('content')
	<br>
	<div class="card">
		<div class="card-header text-center font-weight-bold bg-white" style="border-color:#00324e;">
			<div class="row">
				<button onclick="history.back()" class="btn"><i class="fas fa-angle-double-left"></i></button>
				<h3 class="col-10">心得</h3>
			</div>
		</div>
		<div class="card-body" style="height: 79vh; overflow:auto">
			<small class="float-right">作者: {{$exp[0]->Account}}</small>
			<div>
				<h3>課號：{{$exp[0]->CourseNo}}</h3><br>
				<h3>課名：{{$course[0]->CourseTitle}}</h3><br>
				<h3>開課系所：{{$course[0]->Department}}</h3><br>
				<h3>授課老師：{{$course[0]->Instructor}}</h3><br>
				<h3>開課年度：{{$exp[0]->Semester}}</h3><br>
				<h3>推薦指數：<i class="fas fa-star" style="color:#FFD306;"></i> x {{$exp[0]->Score}}</h3><br>
			</div>
			<hr>
			<div class="row">
				<h3 class="col-auto">評分方式：</h3>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Evaluation}}</textarea>
			</div>
			<br><hr>
			<div class="row">
				<h3 class="col-auto">考試與作業：</h3>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Outline}}</textarea>
			</div>
			<br><hr>
			<div class="row">
				<h3 class="col-auto">其他：</h3>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Additional}}</textarea>
			</div>

		</div>
	</div>
@endsection
