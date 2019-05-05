@extends('layouts.app')

@section('content')
                        
    <div class="board-heading">
        <h2 class="board-title">部屋一覧</h2>
        <a href="/" class="btn board-heading-btn"> ↩ 戻る</a>
    </div>
    <div class="board-body">
        
        <div class="image">
            <img src="/img/science.jpg" width="50%" height="50%">
        </div>
        <p>{{ $message->content }}</p>
        
        <div class="panel panel-info clearfix">
            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="panel-heading">
                      名前：{{ $comment->name }}<span class="text-muted"></span><span class="pull-right"></span>
                    </div>
                    <div class="panel-body">
                        <img src="" />
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    
        <h3>コメント投稿</h3>
        {!! Form::open(['route' => 'comments.store']) !!}             
            <?php $message_id = $message->id; ?>
            {!! Form::hidden('message_id', $message_id) !!}
            {!! Form::label('name', '名前:') !!}<br>
            {!! Form::text('name') !!}<br>
            {!! Form::label('comment', 'コメント欄:') !!}
            {!! Form::textarea('comment') !!}<br>
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