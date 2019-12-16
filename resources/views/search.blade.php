@extends('layouts.app')

@section('title')
搜尋頁
@endsection
@section('header')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/CSS">
.tabs {
  max-width: 100%;
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
  padding: .5em 2em 1em;
  border: 1px solid #ddd;
}

.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 20px;
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
        <div class="col-md-2 col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <br>
            <div>
                <ul class="list-group">
                <span style ="color:white;">系所</span>
                <li><a href = "#" style= "overflow: hidden;">
                    資工系
                        </a></li>
                <!--
                    @foreach($array_data['departments'] as $key => $data)
                        <li><a href = "#" style= "overflow: hidden;">
                            @foreach($data as $k => $v)
                            {{$v}}
                            @endforeach
                        </a></li>
                    @endforeach
                    -->
                </ul>
                <ul class="list-group"><a href="#" style ="color:white;">通識</a>
                </ul>
                <ul class="list-group"><a href="#" style ="color:white;">體育</a>
                </ul>
            </div>
        </div>
        <div class = "col-md-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <br>
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

                    <div id="tab01" class="tab-contents" style = "max-height:552px;overflow:scroll;" >
                                <div class = "card" style="width: 100%;height: auto;">
                                    <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                                    <div class = "card-body" >
                                        <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                                        <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                                    </div>
                                </div>
                    
                            @foreach($array_data['exps'] as $key => $d)
                                <div class = "card" style="width: 100%;height: auto;">
                                    <div class="card-header"><a href="#"><h3>{{$d->CourseNo}}</h3></a><br></div> 
                                    <div class = "card-body">
                                        <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">{{$d->Additional}}</p>
                                        <p style="color: black; text-decoration:none;float:right">{{$d->Account}}</p>
                                    </div>
                                </div>
                            @endforeach

                    </div>  
                    <div id="tab02" class="tab-contents" style = "max-height:552px;overflow:scroll;">
                            <div class = "card" style="width: 100%;height: auto;">
                                <div class="card-header"><a href="#"><h3>00001 B570132V </h3></a><br></div> 
                                <div class = "card-body" >
                                    <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">為什麼我這麼帥</p>
                                    <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                                </div>
                            </div>
                    
                            @foreach($array_data['comments'] as $key => $d)
                                <div class = "card" style="width: 100%;height: auto;">
                                    <div class="card-header"><a href="#"><h3>{{$d->CommentNo}}  {{$d->CourseNo}}</h3></a><br></div> 
                                    <div class = "card-body">
                                        <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">{{$d->Comment}}</p>
                                        <p style="color: black; text-decoration:none;float:right">{{$d->Account}}</p>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
