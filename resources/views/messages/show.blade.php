@extends('layouts.app')

@section('content')
                        
<div class="wrap flc">
    <div class="main">
        <div class="topic-list">
            <div class="topic-head">
                <a href="" class="article-box" style="background-color: white;">
                    <h3 class="title">{{ $message->content }}</h3>
                    <div class="count">
                        <span class="comment">{{ $message->count_comments }}コメント</span>
                        <span class="count_views">{{ $message->count_views }}閲覧</span>
                    </div>
                    <img class="image" src="{{ asset('storage/img/' .  $message->image_name) }}" width="60px" height="60px" alt="no image">
                </a>
            </div>
            <div class="topic-item flc" id="comment2" style="border-bottom: 1px solid #fff;">
                <ul>
                    @if (count($comments) > 0)
                        @foreach ($comments as $comment)
                        <li class="comment-item">
                            <p class="topic-item-info">{{ $comment->name }}<a href="" rel="nofollow">{{ $comment->created_at }}</a>
                            </p>
                            <?php if( $comment->image_name !== '' ) { ?>
                                <img class="img-fluid" src="{{ asset('storage/img/' .  $comment->image_name) }}" width="200px" height="200px" alt="no image">
                            <?php } ?>
                            <div class="topic-item-body lv1">
                                <p>{{ $comment->comment }}</p>         
                            </div>
                        </li>
                        @endforeach
                    @endif
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="topic-list">
            <div class="form-wrap form form-comment">
                {!! Form::open(['route' => 'comments.store',  'method' => 'post', 'files' => true]) !!}
                    <?php $message_id = $message->id; ?>
                    {!! Form::hidden('message_id', $message_id) !!}
                    <div class="form-head flc" 　id="topics_comment">
                        <p>コメントを投稿する</p>
                    </div>
                    <div class="form-main">
                        <textarea id="textarea" name="comment" placeholder="コメントを書く"></textarea>
                        </div>
                        <div class="form-images flc">
                            <div class="add-image"><i class="fas fa-camera"></i>
                                <p>画像を選択</p>
                                <p>選びなおす</p>
                                <input type="file" name="file">
                            </div>
                        </div>
                    <input id="submit" type="submit" value="コメントを投稿する" class="btn btn-positive">
                {!! Form::close() !!}
            </div>
        </div>
        <style>
            input[type='text'], textarea {
                width: 100%;
            }
            .comment-item {
                border-bottom: 1px solid #E3E3E3;
                padding: 5px 0 0;
                list-style-type: none;
                position: relative;
            }
        </style>
    </div>
</div>

@endsection