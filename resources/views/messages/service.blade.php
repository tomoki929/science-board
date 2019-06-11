@extends('layouts.app')

@section('content')

    <div class="container">
        <section class="disclaimer">
            <br>
            <h2 class="pt-md-3">このサイトについて</h2>
            <hr>
            <p class="pt-md-2">このサイトは話題（趣味など）についてコメントし合うサイトです。</p><br><br>
            
            <h2 class="pt-md-3">使い方</h2>
            <hr>
            <p class="pt-md-2">ログインページよりアカウントを作成しログインしてから話題を投稿して下さい。</p><br><br>

            <h2 class="pt-md-3">投稿するときのポイント</h2>
            <hr>
            <p class="pt-md-2">・分かりやすいタイトル</p>
            <p class="pt-md-2">・話題に沿った画像</p>
        </section>
    </div>

    <style>
    .fas {
        padding-right: 10px;
    }
    .pt-md-2 {
        margin-bottom: 5px;
    }
    </style>

@endsection