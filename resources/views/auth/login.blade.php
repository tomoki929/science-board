@extends('layouts.app')

@section('content')

<div class="topic-list">
    <div class="form-wrap form form-comment">
        {!! Form::open(['route' => 'login.post']) !!}
            <div class="form-head flc" 　id="topics_comment">
                <p>ログイン</p>
            </div>
            <div class="">
                <p>メールアドレス</p>
                <input type="text" name="email" placeholder="">
                <p>パスワード</p>
                <input type="text" name="password" placeholder="">
            </div>
            <input id="submit" type="submit" value="ログイン" class="btn btn-positive">
        {!! Form::close() !!}

        <p>{!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
    </div>
</div>

@endsection