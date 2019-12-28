@extends('layouts.app')

@section('title') 心得 @endsection

@section('content')
	<br>
	<div class="card">
		<div class="card-header text-center font-weight-bold bg-white" style="border-color:#00324e;">
			<div class="row">
				<button onclick="history.back()" class="btn"><i class="fas fa-angle-double-left"></i></button>
				<div class="col-10">心得</div>
			</div>
		</div>
		<div class="card-body" style="height: 79vh; overflow:auto">
			<small class="float-right">作者: {{$user_array[$exp[0]->Account]}}</small><br>
			<div>
			  <div class="form-group row">
				<label class="col-sm-2 col-form-label">* 課號</label>
				<div class="col-sm-10">{{$exp[0]->CourseNo}}</div>
			  </div>
			  <div class="form-group row">
				<label  class="col-sm-2 col-form-label">* 課名</label>
				<div class="col-sm-10">{{$course[0]->CourseTitle}}</div>
			  </div>
			  <div class="form-group row">
				<label  class="col-sm-2 col-form-label">* 開課系所</label>
				<div class="col-sm-10">{{$course[0]->Department}}</div>
			  </div>
			  <div class="form-group row">
				<label  class="col-sm-2 col-form-label">* 授課老師</label>
				<div class="col-sm-10">{{$course[0]->Instructor}}</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-2 col-form-label">* 開課年度</label>
				<div class="col-sm-10">{{$exp[0]->Semester}}</div>
			  </div>
			  <div class="form-group row">
				<label  class="col-sm-2 col-form-label">* 推薦指數</label>
				<div class="col-sm-10">{{$exp[0]->Score}}</div>
			  </div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-2 col-form-label">評分方式：</div>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Evaluation}}</textarea>
			</div>
			<br><hr>
			<div class="row">
				<div class="col-sm-2 col-form-label">考試與作業：</div>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Outline}}</textarea>
			</div>
			<br><hr>
			<div class="row">
				<div class="col-sm-2 col-form-label">心得：</div>
				<textarea rows="4" readonly class="col" style="outline: none; font-size: 20px; border: none;">{{$exp[0]->Additional}}</textarea>
			</div>

		</div>
	</div>
@endsection
