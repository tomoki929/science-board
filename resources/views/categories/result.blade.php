@extends('layouts.app')

@section('content')
                        
    <div class="board-heading">
        <h2 class="board-title">{{ $category->name }}系 の部屋</h2>
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
    </div>

@endsection