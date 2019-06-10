@extends('layouts.app')

@section('content')

    <div class="btn-wrap"><a href=<?php echo url("/messages/create") ?> class="btn btn-positive">部屋を作成する</a></div>

    <div class="wrap flc">
        <div class="main">
            <div class="topic-list">
                <div class="topic-header">
                    <div class="main">
                        <h1 style="line-height: 30px;">人気トピック</h1>
                    </div>
                </div>
                <ul class="topic-items" style="margin-bottom: 0;">
                    @if (count($messages) > 0)
                        @foreach ($messages as $key=>$message)
                            <a href="/messages/{{$message->id}}" class="article-box" style="background-color: white;">
                                <span class="order_badge"></span>
                                <span class="order order_value">{{ $key + 1 }}<span class="order_unit">位</span></span>
                                <h3 class="title">{{ $message->content }}</h3>
                                <div class="count">
                                    <span class="comment">{{ $message->count_comments }}コメント</span>
                                    <span class="count_views">{{ $message->count_views }}閲覧</span>
                                </div>
                                <img class="image" src="{{ asset('storage/img/' .  $message->image_name) }}" width="60px" height="60px" alt="no image">
                            </a>
                        @endforeach
                    @endif
                    <div class="clearfix" style="clear: both;"></div>
                </ul>
            </div>
        </div>
    </div>
    <style>
    .pagination {
        display: inline-block;
        margin: 0 0 20px 0;
    }
    </style>

@endsection