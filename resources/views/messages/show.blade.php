@extends('layouts.app')

@section('content')
                        
    <div class="board-heading">
        <h2 class="board-title">{{ $message->content }}</h2>
        <a href="/" class="btn board-heading-btn"> ↩ 戻る</a>
    </div>
    <div class="board-body">
        
        <div class="image">
            <?php if( $message->image_name == '' ) { $message->image_name = 'science.jpg'; } ?>
            <img class="image" src="{{ asset('storage/img/' .  $message->image_name) }}" width="300px" height="300px" alt="部屋のイメージ">
        </div>
        <p>{{ $message->content }}</p>
        
        <div class="panel panel-info clearfix">
            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="panel-heading">
                      名前：<span class="text-muted">{{ $comment->name }}</span><span class="pull-right">投稿日時：{{ $comment->created_at }}</span>
                    </div>
                    <div class="panel-body">
                        <?php if( $comment->image_name == '' ) { $comment->image_name = ''; } ?>
                        <img class="image" src="{{ asset('storage/img/' .  $comment->image_name) }}" width="200px" height="200px" alt="画像無し">
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    
        <h3>コメント投稿</h3>
        {!! Form::open(['route' => 'comments.store',  'method' => 'post', 'files' => true]) !!}             
            <?php $message_id = $message->id; ?>
            {!! Form::hidden('message_id', $message_id) !!}
            {!! Form::label('name', '名前:') !!}<br>
            {!! Form::text('name') !!}<br>
            {!! Form::label('comment', 'コメント欄:') !!}
            {!! Form::textarea('comment') !!}<br>
            {!! Form::label('comment', '画像:') !!}
            {!! Form::file('file') !!}<br>
            {!! Form::submit('投稿') !!}
        {!! Form::close() !!}
        
        <div class="clearfix"></div>
    </div>
    <style>
        input[type='text'], textarea {
            width: 100%;
        }
    </style>
@endsection