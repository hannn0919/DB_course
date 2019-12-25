@extends('layouts.app')

@section('title') 發表心得 @endsection

@section('content')
	<br>
	<div class="card">
		<div class="card-header text-center font-weight-bold bg-white" style="border-color:#00324e;">發表心得</div>
		<div class="card-body" style="overflow: scroll;">

			<small class="text-danger">*必填欄位</small>
			<form method='post' action="{{route('exp.store')}}" class="text-right">
				{{ csrf_field() }}
				<div class="form-group row">
					<label for="courseNo" class="col-sm-2 col-form-label">* 課號</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="CourseNo" value = "{{$Course[0]->CourseNo}}" >
					</div>
				</div>
				<div class="form-group row">
					<label for="courseTitle" class="col-sm-2 col-form-label">* 課程名稱</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CourseTitle" value = "{{$Course[0]->CourseTitle}}" >
					</div>
				</div>
				<div class="form-group row">
					<label for="department" class="col-sm-2 col-form-label">* 開課系所</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Department" value = "{{$Course[0]->Department}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="instructor" class="col-sm-2 col-form-label">* 授課老師</label>
					<div class="col-sm-10">
						<input type="text" class="form-control"name="Instructor" value = "{{$Course[0]->Instructor}}" >
					</div>
				</div>
				<div class="form-group row">
					<label for="semester" class="col-sm-2 col-form-label">* 開課年度</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Semester" value = "1072" >
					</div>
				</div>
				<div class="form-group row">
					<label for="score" class="col-sm-2 col-form-label">* 推薦指數</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Score" required>
					</div>
				</div>

				<hr>

				<small class="text-danger text-left">選填欄位</small>
				<div class="form-group row">
					<label for="evaluation" class="col-sm-2 col-form-label">評分方式</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="Evaluation"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="outline" class="col-sm-2 col-form-label">考試與作業</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="Outline"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="additional" class="col-sm-2 col-form-label">其他</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="Additional" rows="5"></textarea>
					</div>
				</div>

				<button class="btn btn-outline-info btn-block" type="submit">送出心得</button>
			</form>

		</div>
	</div>
@endsection
