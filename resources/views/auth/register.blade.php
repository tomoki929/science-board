@extends('layouts.app')

@section('content')

    <div class="topic-list">
        <div class="form-wrap form form-comment">
            {!! Form::open(['route' => 'signup.post']) !!}
                {!! csrf_field() !!}
                <div class="form-head flc" 　id="topics_comment">
                    <p>新規登録</p>
                </div>
                <div class="">
                    <p>名前</p>
                    <input type="text" name="name" placeholder="">
                    <p>メールアドレス</p>
                    <input type="text" name="email" placeholder="">
                    <p>パスワード</p>
                    <input type="text" name="password" placeholder="">
                    <p>パスワード確認</p>
                    <input type="text" name="password_confirmation" placeholder="">
                </div>
                <input id="submit" type="submit" value="登録" class="btn btn-positive">
            {!! Form::close() !!}

            <p>{!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
        </div>
    </div>

@endsection