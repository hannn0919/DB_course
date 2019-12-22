<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>推課海大 - @yield('title')</title>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/b88fff3b41.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <style type = "text/css">
            body {
                padding-top: 0px;
                background-color: #00324e;
                height: 100vh;
                font-family: 'Noto Sans TC', sans-serif;
            }

            #header {
                min-height: 10%;
                background-color:#006aa6;
            }

            #content {
                max-height: 90%;
            }

            

        </style>

        @yield('header')

    </head>
    <body>
        <nav id="header" class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand text-white font-weight-bold" href="{{url('/')}}">推課海大</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav" aria-controls="Nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id='Nav'>
                    <form class="form-inline required input-group ml-md-3" style="width:50%;" action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group-prepend">
                        <select class="form-control" name="way">
                            <option class="font-weight-bold" value="CourseTitle">課名</option>
                            <option class="font-weight-bold" value="CourseNo">課號</option>
                            <option class="font-weight-bold" value="Department">開課單位</option>
                            <option class="font-weight-bold" value="Instructor">授課老師</option>
                        </select>
                        </div>
                        <input class="form-control" placeholder="請輸入關鍵字" name="search" type="search">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </form> 

                    <ul class="navbar-nav ml-auto">
                        @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a> 
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('personal.show',@Auth::user()->name)}}">個人設定</a>
                                <a class="dropdown-item" href="{{route('logout')}}">登出</a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('login')}}">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('register')}}">註冊</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
            
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>