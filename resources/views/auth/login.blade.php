@extends('layouts.app')

@section('content')

    <div class="board-heading">
        <h2 class="board-title">ログイン</h2>
    </div>
    <div class="board-body">
        <div class='row'>
            <div class='col-md-6 col-md-offset-3'>

                {!! Form::open(['route' => 'login.post']) !!}
                    <div class='form-group'>
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}

                <p>{!! link_to_route('login', '新規登録はこちら') !!}</p>
            </div>
        </div>
        <div class="clearfix" style='margin-bottom: 20px'></div>
    </div>

@endsection