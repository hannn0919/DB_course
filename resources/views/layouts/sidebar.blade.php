
    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
        <br>
        <br>
            <div>
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
    </style>
