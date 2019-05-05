@extends('layouts.app')

@section('content')

    <div class="board-heading">
        <h1>部屋を作る</h1>
    </div>
    <div class="board-body">
        {!! Form::model($message, ['route' => 'messages.store']) !!}
            <h3>部屋名：</h3>
            {!! Form::textarea('content', null) !!}
            {!! Form::submit('作成', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>

    <style>
        textarea {
            width: 100%;
        }
    </style>
              
@endsection