@extends('layouts.app')

@section('content')

    <div class="board-heading">
        <h2>部屋を作る</h2>
    </div>
    <div class="board-body">
        {!! Form::open(['route' => 'messages.store', 'method' => 'post', 'files' => true]) !!}        
            <h5>部屋名：</h5>
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