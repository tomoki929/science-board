@extends('layouts.app')

@section('content')

    <form method="get" action="{{url('/categories/search_result')}}" class="search-form">
        <?php if(!isset($keyword)){$keyword = "";} ?>
        <input id="search_input" type="text" name="keyword" value="{{$keyword}}" placeholder="検索したいキーワードを入力">
        <div id="search_submit" class="submit">
            <div class="icon-search"></div>
            <p>検索</p>
            <input type="submit">
        </div>
    </form><br><br>

    <div class="search-body">
        <p class="categories-title" style="padding:20px 0 20px 10px;">カテゴリー</p>
        <ul class="categories flc">
            <li class="categories-item"><a href="/categories/1"><i class="fas fa-flask"></i><span>化学</span></a></li>
            <li class="categories-item"><a href="/categories/2"><i class="fas fa-bowling-ball"></i><span>物理</span></a></li>
            <li class="categories-item"><a href="/categories/3"><i class="fas fa-globe-asia"></i><span>宇宙</span></a></li>
            <li class="categories-item"><a href="/categories/4"><i class="fas fa-laptop"></i><span>コンピュータ</span></a></li>
            <li class="categories-item"><a href="/categories/5"><i class="fas fa-cat"></i><span>生物</span></a></li>
        </ul>
    </div>

    <style>
    .fas {
        padding-right: 10px;
    }
    </style>

@endsection