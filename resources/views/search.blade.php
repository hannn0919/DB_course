@extends('layouts.app')

@section('title') 搜尋 @endsection

@section('content')
<div class="row justify-content-center">
    @include('layouts.sidebar')
        <div class = "col-md-8 col-lg-8 col-sm-8 col-xs-12">
            <br>
            <div class="card" style="height:85vh;">
                <div class="card-header bg-white font-weight-bold text-center" style="height: auto;">搜尋結果</div>
                <div class="card-body overflow-auto" >

                        <table class="table table-condensed table-hover text-center">
                                <thead>
                                <tr class="thead-dark">
                                    <th scope="col" style="vertical-align: middle;">課號</th>
                                    <th scope="col" style="vertical-align: middle;">課名</th>
                                    <th scope="col" style="vertical-align: middle;">授課老師</th>
                                    <th scope="col" style="vertical-align: middle;">開課單位</th>
                                    <th scope="col" style="vertical-align: middle;">課程類型</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach($details as $d)
                                    <tr onclick="window.location='/course/{{$d->CourseNo}}'">
                                        <th scope="row">{{$d->CourseNo}}</th>
                                        <td>{{$d->CourseTitle}}</td>
                                        <td>{{$d->Instructor}}</td>
                                        <td>{{$d->Department}}</td>
                                        <td>@switch($d->Type)
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
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                </div>
            </div>
        </div>
</div>
@endsection