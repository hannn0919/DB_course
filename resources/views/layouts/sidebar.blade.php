
    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
        <br>
        <button class="btu btn-sm btn-block btn-light dontshow" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="true" aria-controls="sidebar">
            分類
        </button>
        <br>
            <div class="collapse show" id="sidebar">
                <ul class="list-group"><a href = "{{route('分類',['資訊工程學系','Department'])}}" class="cato">資工系</a></ul>
                <br>
                <ul class="list-group"><a href="{{route('分類',['3','Type'])}}" class="cato">通識</a></ul>
                <br>
                <ul class="list-group"><a href="{{route('分類',['4','Type'])}}" class="cato">體育</a></ul>
                <br>
                <ul class="list-group"><a href="{{route('分類',['5','Type'])}}" class="cato">語文</a></ul>
                <br>
                <ul class="list-group"><a href="{{route('分類',['6','Type'])}}" class="cato">其他</a></ul>
            </div>
            @if(Route::currentRouteName() == 'course')
                <div class = "dontshowblock">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <div>
                    <form method="get" action="{{route('exp.index')}}">
                        <input name="courseNo" type="hidden" value = "{{$array_data['Course'][0]->CourseNo}}">	
                        <button class="btu btn-sm btn-block btn-light" type="submit">撰寫心得<i class="fa fa-plus"></i></button>
                    </form>
                </div>
            @endif
    </div>
    

    <style type="text/CSS">
        .cato {
            color:white;
            text-align: center;
            height: 50px;
            line-height: 50px;
            border-radius:10px;
        }
        .cato:hover{
            color: white;
            background:hsla(0,0%,100%,.3);
            text-decoration:none;
        }
        .dontshow{
            display:none;
        }
        .collapse.show{
            display:inline;
            aria-expanded:true;
        }
        @media (max-width: 575.98px){
            .dontshow{
                display:inline;
            }
            .dontshowblock{
                display:none;
            }
        }
        @media (min-width: 575.98px){
            .collapse.show{
                display:inline;
                aria-expanded:true;
            }
        }
       
    </style>
