@extends('layouts.app')

@section('content')
                        
    <div class="board-heading">
        <h2 class="board-title">部屋一覧</h2>
        {!! link_to_route('messages.create', '＋作成', null, ['class' => 'btn board-heading-btn']) !!}
    </div>
    <div class="board-body">
        @if (count($messages) > 0)
            @foreach ($messages as $message)
                <a href='/messages/{{$message->id}}' class="article-box" style="background-color: white;">
                    <h3 class="title">{{ $message->content }}</h3>
                    <time class="date" datetime="" style="">コメント数・最終投稿<span></span></time>
                    <img class="image" src="/img/science.jpg" width="100px" height="100px" alt="コーディング画面">
                </a>
            @endforeach
        @endif
        <div class="clearfix"></div>
    </div>

@endsection