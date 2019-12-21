@extends('layouts.app')
@section('title')
首頁
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
        <div class = "col-md-8 col-lg-8 col-md-8 col-sm-8 col-xs-12 h-100" >
            <br>
            <div class="card" style ="height:100%;" >
                <div class="card-header bg-white font-weight-bold" style="height: auto;">課程
                </div>
                <div class="card-body overflow-scroll" >
                    
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>

                    @foreach($array_data['course'] as $key => $d)
                        <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header">
                            <a href="#"><h3>
                                <div style = "display:inline;">{{$d->CourseNo}}</div>
                                <div style = "display:inline;float:right;">{{$d->CourseTitle}}<div>
                            </h3></a>
                        </div>
                            <div class = "card-body">
                                <div id = "CourseType" class = "col-md-4"style="display:inline;color: black; text-decoration:none;">
                                @switch($d->Type)
                                    @case ("1")
                                        必修
                                        @break;
                                    @case ("2")
                                        選修
                                        @break;
                                    @case ("3")
                                        通識
                                        @break;
                                    @case ("4")
                                        體育
                                        @break;
                                    @case ("5")
                                        語文
                                        @break;
                                    @case ("6")
                                        其他
                                        @break;
                                    @default
                                        something got wrong
                                @endswitch
                                </div>
                                <div class = "col-md-4"style="display:inline;color: black; text-decoration:none;">{{$d->Instructor}}</div>
                                <div class = "col-md-4"style="display:inline;color: black; text-decoration:none;">{{$d->Department}}</div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
