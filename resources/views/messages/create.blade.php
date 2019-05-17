@extends('layouts.app')

@section('content')

    <div class="board-heading">
        <h2>部屋を作る</h2>
    </div>
    <div class="board-body">
        {!! Form::open(['route' => 'messages.store', 'method' => 'post', 'files' => true]) !!}
            <h5>カテゴリ：</h5>
            <select name="category_id">
                <option value="1">化学</option>
                <option value="2">物理</option>
                <option value="3">宇宙</option>
                <option value="4">コンピュータ</option>
                <option value="5">生物</option>
            </select>
            <h5>部屋名：</h5>
            {!! Form::textarea('content', null) !!}
            <h5>画像：</h5>
            {!! Form::file('file') !!}<br>
            {!! Form::submit('作成', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>

    <style>
        textarea {
            width: 100%;
        }
    </style>
              
@endsection