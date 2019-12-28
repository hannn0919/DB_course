@extends('layouts.app')

@section('title') 課程 @endsection

@section('header')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style type="text/CSS">
  .tabs {
    max-width: 100%;
    max-height:100%;
    margin: 0 auto;
    padding: 0 5px;
  }
  #tab-button {
    display: table;
    table-layout: fixed;
    width: 100%;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  #tab-button li {
    display: table-cell;
    width: 20%;
  }
  #tab-button li a {
    display: block;
    padding: .5em;
    background: #eee;
    border: 1px solid #ddd;
    text-align: center;
    color: #000;
    text-decoration: none;
  }
  #tab-button li:not(:first-child) a {
    border-left: none;
  }
  #tab-button li a:hover,
  #tab-button .is-active a {
    border-bottom-color: transparent;
    background: #fff;
  }
  .tab-contents {
    padding: none;
    border: 1px solid #ddd;
    max-height:;
    overflow:scroll;
  }

  .tab-button-outer {
    display: none;
  }
  .tab-contents {
    margin-top: none;
  }
  @media screen and (min-width: 768px) {
    .tab-button-outer {
      position: relative;
      z-index: 2;
      display: block;
    }
    .tab-select-outer {
      display: none;
    }
    .tab-contents {
      position: relative;
      top: -1px;
      margin-top: 0;
    }
  }
  .footer{
		z-index: 1;
      position: absolute;
      left: 300px;
      bottom: 50px;
      background-color:none;
  }
  .footer button {
		height: 100%;
		width: 100%;
	}
</style>

<script>
    $(function() {
      var $tabButtonItem = $('#tab-button li'),
          $tabSelect = $('#tab-select'),
          $tabContents = $('.tab-contents'),
          activeClass = 'is-active';

      $tabButtonItem.first().addClass(activeClass);
      $tabContents.not(':first').hide();

      $tabButtonItem.find('a').on('click', function(e) {
          var target = $(this).attr('href');

          $tabButtonItem.removeClass(activeClass);
          $(this).parent().addClass(activeClass);
          $tabSelect.val(target);
          $tabContents.hide();
          $(target).show();
          e.preventDefault();
      });

      $tabSelect.on('change', function() {
          var target = $(this).val(),
              targetSelectNum = $(this).prop('selectedIndex');

          $tabButtonItem.removeClass(activeClass);
          $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
          $tabContents.hide();
          $(target).show();
      });
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
	<div class ="footer">
		<form method="get" action="{{route('exp.index')}}">
			<input name="courseNo" type="hidden" value = "{{$array_data['Course'][0]->CourseNo}}">	
			<button class="btn btn-secondary" type="submit">撰寫心得<i class="fa fa-plus"></i></button>
		</form>
	</div>
    @include('layouts.sidebar')
        <div class = "col-md-8 col-lg-8 col-sm-8 col-xs-12">
            <br>
                <div class="border border-dark bg-white text-center rounded-top">
                  <div class="row justify-content-center align-items-center" style="height: 7vh;">
                    <h3 class="col-3 font-weight-bolder text-truncate">{{$array_data['Course'][0]->CourseNo}}</h3>
                    <h3 class="col-7 font-weight-bolder text-truncate">{{$array_data['Course'][0]->CourseTitle}}</h3>
                    <button type="button" class="h-50 col-auto btn btn-outline-dark"  data-toggle="modal" data-target="#commentModal">提問</button>

                      <!-- Modal -->
                      <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
						  	<form method='post' action="{{route('comment.store')}}">
							  	{{ csrf_field() }}
								<div class="modal-header bg-info text-white">
								<h5 class="modal-title " id="commentModalLabel">課程提問</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body text-left">
								<div>課號：{{$array_data['Course'][0]->CourseNo}}</div>
								<input type = "hidden" value = "{{$array_data['Course'][0]->CourseNo}}" name = "CourseNo">
								<br>
								<div>課程名稱：{{$array_data['Course'][0]->CourseTitle}}</div>
								<br>
								<div class="form-group">
									<label for="message-text" class="col-form-label">問題描述:</label>
									<textarea class="form-control" rows="5" id="message-text" name = "Comment"></textarea>
								</div>
								
								<button type="submit" class="btn btn-outline-info btn-block">送出提問</button>
								</div>
							</form>	
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="border border-dark bg-white rounded-top">
                  	<div class="tabs">
						<div class="tab-button-outer">
							<ul id="tab-button">
								<li><a href="#tab01">心得</a></li>
								<li><a href="#tab02">問題</a></li>
							</ul>
						</div>
						<div class="tab-select-outer">
							<select id="tab-select">
								<option value="#tab01">心得</option>
								<option value="#tab02">問題</option>
							</select>
						</div>
						<div id="tab01" class="tab-contents" style = "height:75vh;" >
							<br>
								@foreach($array_data['exps'] as $key => $d)
									<div class ="card">
										<div class="card-body">
											<h2 class="d-inline text-black"><i class="fas fa-star" style="color:#FFD306;"></i> x {{$d->Score}}</h2>
											<h5 class="d-inline float-right text-truncate">{{$user_array[$d->Account]}}</h5>
											<hr>
											<p class="text-black text-truncate">{{$d->Additional}}</p>
										</div>
										<div class="card-footer">
											<a class="float-right"href="{{route('exp.show', $d->ExpNo)}}">查看更多</a>
										</div>
									</div>
									<br>
								@endforeach
						</div>  
						<div id="tab02" class="tab-contents" style = "height:76vh;" >                  
							@foreach($array_data['comments'] as $key => $d)
								<div class = "card">
									<div class = "card-body justify-content-center align-items-center">
										<div class="row">
											<p class="d-inline col-3">{{$user_array[$d->Account]}} : </p>
											<h5 class="d-inline col text-truncate">{{$d->Comment}}</h5>
											<div class="row-2 d-flex flex-column">
											<button class="h-50 btn btn-outline-secondary float-right" type="button" data-toggle="modal" data-target="#modal{{$d->CommentNo}}">回答問題</button>
											<button class="h-50 btn btn-secondary float-right" type="button" data-toggle="collapse" data-target="#{{$d->CommentNo}}" aria-expanded="false" aria-controls="{{$d->CommentNo}}">查看回覆</button>
											</div>
										</div>
										<div class="collapse" id="{{$d->CommentNo}}">
											<br>
											<hr>
											@foreach($reply_array[$d->CommentNo] as $r)
											<p class="text-light bg-dark"> {{$user_array[$r->Account]}} : {{$r->Content}}</p>
											@endforeach
										</div>
										<!-- Modal -->
										<div class="modal fade" id="modal{{$d->CommentNo}}" tabindex="-1" role="dialog" aria-labelledby="{{$d->CommentNo}}Label" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header bg-info text-white">
													<h5 class="modal-title " id="replyModalLabel">問題回覆</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method='post' action="{{route('reply.store')}}">
												{{ csrf_field() }}
													<div class="modal-body text-left">
														<div>{{$user_array[$d->Account]}} 問：</div>
														<br>
														<div>{{$d->Comment}}</div>
														<input type = "hidden" value = "{{$d->CommentNo}}" name = "CommentNo">
														<br>
														<div class="form-group">
															<label for="reply-text" class="col-form-label">您的回覆:</label>
															<textarea class="form-control" rows="5" id="reply-text" name = "Content" ></textarea>
														</div>
														<button type="submit" class="btn btn-outline-info btn-block">送出回答</button>
													</div>
												</form>
											</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
                </div>
        </div>
    </div>
</div>
@endsection
