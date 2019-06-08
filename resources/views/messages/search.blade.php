@extends('layouts.app')

@section('content')

    <div class="p-home_menu pt-1">
        <a class="btn p-home_menuItem p-1 pl-2 mb-1 p-home_menuItem-active" style='text-align:center;' href=<?php echo url("/messages/search") ?>>
            <span class="fa fa-fw fa-list-ul mr-1of2"></span>タイムライン
        </a>
        <a class="btn p-home_menuItem p-1 pl-2 mb-1" href=<?php echo url("/") ?>>
            <span class="fa fa-fw fa-list-ul mr-1of2"></span>コメント順
        </a>
        <a class="btn p-home_menuItem p-1 pl-2 mb-1" href=<?php echo url("/categories") ?>>
            <span class="fa fa-fw fa-tags mr-1of2"></span>カテゴリ
        </a>
    </div>
                        
    <div class="board-heading">
        <h2 class="board-title">部屋一覧（タイムライン）</h2>
        {!! link_to_route('messages.create', '＋作成', null, ['class' => 'btn board-heading-btn']) !!}
    </div>
    <div class="board-body">
        @if (count($messages) > 0)
            @foreach ($messages as $message)
                <a href=<?php echo url("/messages/{$message->id}") ?> class="article-box" style="background-color: white;">
                    <h3 class="title">{{ $message->content }}</h3>
                    <time class="date" datetime="" style="">
                        <div style='padding-left:10px;text-align:left'>コメント数：<span style='color:white;font-weight:bold;'>{{ $message->count_comments }}</span></div>
                        <div style='padding-left:10px;text-align:left'>閲覧数：<span style='color:white;font-weight:bold;'>{{ $message->count_views }}</span></div>
                    </time>
                    <?php if( $message->image_name=='' ) { $message->image_name = 'science.jpg'; } ?>
                    <img class="image" src="{{ asset('storage/img/' .  $message->image_name) }}" width="100px" height="100px" alt="no image">
                </a>
            @endforeach
        @endif
        <div class="clearfix"></div>
        <div style="text-align:center;font-size:10px">{{ $messages->links() }}</div>
    </div>

@endsection