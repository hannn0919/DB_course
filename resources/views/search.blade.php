@extends('layouts.app')

@section('title')
搜尋頁
@endsection
@section('header')

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
            <div class="card" >
                <div class="card-header bg-white font-weight-bold" style="height: auto;">心得
                </div>
                <div class="card-body" style = "max-height:552px;overflow:scroll;" >
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body" >
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
                            <p style="overflow: hidden; white-space:nowrap; color: black; text-decoration:none;">這是一堂很複雜的課，測試測試測試測試測試測試測試測試。</p>
                            <p style=" color: black; text-decoration:none;float:right">王瑋</p>
                        </div>
                    </div>
                    <div class = "card" style="width: 100%;height: auto;">
                        <div class="card-header"><a href="#"><h3>B570132V 程式設計(二)實習</h3></a><br></div> 
                        <div class = "card-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
