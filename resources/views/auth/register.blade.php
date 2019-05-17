@extends('layouts.app')

@section('content')

    <div class="board-heading">
        <h2 class="board-title">新規登録</h2>
    </div>
    <div class="board-body">
        <div class='row'>
            <div class='col-md-6 col-md-offset-3'>

                {!! Form::open(['route' => 'signup.post']) !!}
                    {!! csrf_field() !!}
                    <div class='form-group'>
                        {!! Form::label('name', '名前') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('password_confirmation', 'パスワード確認') !!}
                        {!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
        <div class="clearfix" style='margin-bottom: 20px'></div>
    </div>

@endsection