@extends('layouts.app')

@section('title') 個人設定 @endsection

@section('content')
    <br>

	<div class="card">
		<div class="card-header text-center font-weight-bold bg-white" style="border-color:#00324e;">個人設定</div>
		<div class="card-body">

			<div class="card" style="border-color:#00324e;">
				<div class="card-header text-center text-white" style="background-color:#00324e;">密碼設定</div>
				<div class="card-body" style="background-color:#dddddd;">
					<form action="{{ route('resetPassword', @Auth::user()->name) }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="oldPassword" class="col-sm-2 col-form-label">輸入舊密碼</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="oldPassword"  required>
							</div>
						</div>
						<div class="form-group row">
							<label for="newPassword" class="col-sm-2 col-form-label">輸入新密碼</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="newPassword"  required>
							</div>
						</div>
						<div class="form-group row">
							<label for="confirmPassword" class="col-sm-2 col-form-label">確認新密碼</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="confirmPassword"  required>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn mb-2 bg-white" style="border-color:#00324e; color:#00324e;">確認變更</button>
						</div>
					</form>
				</div>
			</div>

            <br>

			<div class="card" style="border-color:#00324e;">
				<div class="card-header text-center text-white" style="background-color:#00324e;">心得列表</div>
				<div class="card-body" style="background-color:#dddddd;">
					<table class="table table-condensed table-hover text-center">
						<thead>
						<tr class="bg-info">
							<th scope="col">課程名稱</th>
							<th scope="col">心得列表</th>
							<th scope="col">操作</th>
						</tr>
						</thead>
						<tbody class="bg-white">
                            @foreach($array_data['exp'] as $key=>$d)
                            <tr>
								<th scope="row">{{$d->CourseTitle}}</th>
								<td>{{$d->expNo}}</td>
								<td>
                                  <a href="">編輯</a> / 
                                  <a href="{{route('exp.destroy',$d->expNo)}}">刪除</a>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>

            <br>

			<div class="card" style="border-color:#00324e;">
				<div class="card-header text-center text-white" style="background-color:#00324e;">問題列表</div>
				<div class="card-body" style="background-color:#dddddd;">
                    <table class="table table-condensed table-hover text-center">
						<thead>
						<tr class="bg-info">
							<th scope="col">課程名稱</th>
							<th scope="col">問題列表</th>
							<th scope="col">操作</th>
						</tr>
						</thead>
						<tbody class="bg-white">
							<tr>
                            @foreach($array_data['comment'] as $key=>$d)
                            <tr>
								<th scope="row">{{$d->CourseTitle}}</th>
								<td>{{$d->CommentNo}}</td>
								<td>
                                  <a>編輯</a> /
                                  <a href="{{route('exp.destroy',$d->CommentNo)}}">刪除</a>
                                </td>
							</tr>
                            @endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

	<script>
		var msg = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if(exist) alert(msg);
  	</script>
@endsection
