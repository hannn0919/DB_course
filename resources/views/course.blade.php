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
			<!--button class="btn btn-secondary footer" type="submit"><i class="fa fa-plus"></i></button-->
			<button class="btn btn-secondary" type="submit">撰寫心得<i class="fa fa-plus"></i></button>
		</form>
	</div>
    @include('layouts.sidebar')
        <div class = "col-md-8 col-lg-8 col-sm-8 col-xs-12">
            <br>
                <div class="border border-dark bg-white text-center rounded-top">
                  <h3>{{$array_data['Course'][0]->CourseNo}}      {{$array_data['Course'][0]->CourseTitle}}</h3>
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
						<div id="tab01" class="tab-contents" style = "height:76vh;" >
								@foreach($array_data['exps'] as $key => $d)
									<div class ="card"style="width: 100%;height: 20vh;">
										<div class="card-body">
											<h3>{{$d->Account}}</h3>
											<p class=" overflow-hidden text-black">{{$d->Additional}}</p>
											<a class="float-right"href="{{route('exp.show', $d->ExpNo)}}">查看更多</a>
										</div>
									</div>
								@endforeach

						</div>  
						
						<div id="tab02" class="tab-contents" style = "height:76vh;" >                  
								@foreach($array_data['comments'] as $key => $d)
									<div class = "card" style="width: 100%;height: auto;">
										<div class = "card-body">
                                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">{{$d->Comment}}</p>
                                            <p style="color: black; text-decoration:none;float:right">{{$d->Account}}
                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{$d->CommentNo}}" aria-expanded="false" aria-controls="{{$d->CommentNo}}">
                                                    reply
                                                </button>
                                            </p>
                                            <div class="collapse" id="{{$d->CommentNo}}">
                                            <br>
                                            @foreach($reply_array[$d->CommentNo] as $r)
                                                <p> {{$r->Content}}{{$r->Account}}</p>
                                            @endforeach
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
