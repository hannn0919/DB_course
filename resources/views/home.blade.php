@extends('layouts.app')

@section('title') 首頁 @endsection

@section('content')
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class = "col-md-8 col-lg-8 col-sm-8 col-xs-12">
            <br>
            <div class="card" style="height:85vh;">
                <div class="card-header bg-white font-weight-bold" style="height: auto;">課程
                </div>
                <div class="card-body overflow-auto" >

                    @foreach($array_data['course'] as $key => $d)
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                <a href="#">
                                    <div style = "display:inline;">{{$d->CourseNo}}</div>
                                    <div style = "display:inline;float:right;">{{$d->CourseTitle}}</div>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class = "col-md-4"style="display:inline;color: black; text-decoration:none;">
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
@endsection
