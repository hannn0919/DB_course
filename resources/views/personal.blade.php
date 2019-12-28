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
							<button type="submit" class="btn btn-dark">確認變更</button>
						</div>
					</form>
				</div>
			</div>

            <br>

			<div class="card" style="border-color:#00324e;">
				<div class="card-header text-center text-white" style="background-color:#00324e;">心得列表</div>
				<div class="card-body overflow-auto" style="background-color:#dddddd; height:40vh;">
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
								<th scope="row">
									<a href="{{route('course', $d->CourseNo)}}">{{$d->CourseTitle}}</a>
								</th>
								<td>{{$d->expNo}}</td>
								<td>
								 	<form action="{{ route('exp.destroy', $d->expNo) }}" method="POST">
										@csrf
										@method('DELETE')
										<a href="{{route('editExp',$d->expNo)}}" class="btn btn-link">編輯</a> 
										<button type="submit" class="btn btn-link">刪除</button>
									</form>
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
				<div class="card-body overflow-auto" style="background-color:#dddddd; height:40vh;">
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
								<th scope="row">
									<a href="{{route('course', $d->CourseNo)}}">{{$d->CourseTitle}}</a>
								</th>
								<td>{{$d->CommentNo}}</td>
								<td>
									<form action="{{ route('comment.destroy', $d->CommentNo) }}" method="POST">
										@csrf
										@method('DELETE')
										<a href="#" class="btn btn-link">編輯</a> 
										<button type="submit" class="btn btn-link">刪除</button>
									</form>
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
		let msg = '{{Session::get('alert')}}';
		let exist = '{{Session::has('alert')}}';
		if(exist){
			let type = 0;
			if(msg === '密碼已變更!') type = 1
			if(type){
				Swal.fire({
					title: msg,
					icon: 'success',
					showConfirmButton: false,
					timer: 1500
				})
			}
			else{
				Swal.fire({
					title: msg,
					icon: 'error',
					showConfirmButton: false,
					timer: 1500
				})
			}
		};
  	</script>
@endsection
