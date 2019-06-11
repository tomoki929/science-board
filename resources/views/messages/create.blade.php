@extends('layouts.app')

@section('content')
                        
<div class="wrap flc">
    <div class="main">
        <div class="topic-list">
            <div class="form-wrap form form-comment">
                {!! Form::open(['route' => 'messages.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-head flc" 　id="topics_comment">
                        <p style="display:block;">カテゴリ</p><br><br><br>
                        <select name="category_id" style="display:block;text-align:left;">
                            <option value="1">化学</option>
                            <option value="2">物理</option>
                            <option value="3">宇宙</option>
                            <option value="4">コンピュータ</option>
                            <option value="5">生物</option>
                        </select>
                    </div><br>
                    <div class="form-head flc" 　id="topics_comment">
                        <p>部屋名</p>
                    </div>
                    <div class="form-main">
                        <textarea id="textarea" maxlength="34" name="content" placeholder="部屋名や話したい話題を書きましょう"></textarea>
                        </div>
                        <div class="form-images flc">
                            <div class="add-image"><i class="fas fa-camera"></i>
                                <p>画像を選択</p>
                                <p>選びなおす</p>
                                <input type="file" name="image">
                            </div>
                        </div>
                    <input id="submit" type="submit" value="部屋を作成する" class="btn btn-positive">
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