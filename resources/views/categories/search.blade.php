@extends('layouts.app')

@section('content')
                        
    <div class="board-heading">
        <h2 class="board-title">カテゴリ検索</h2>
        {!! link_to_route('messages.create', '＋作成', null, ['class' => 'btn board-heading-btn']) !!}
    </div>
    <div class="board-body">
        @if (count($categories) > 0)
        <ul>
            @foreach ($categories as $category)
                <a href=<?php echo url("/categories/{$category->id}") ?>>
                    <li style="font-size:20px;">{{ $category->name }}</li>
                </a>
            @endforeach
        </ul>
        @endif
        <div class="clearfix"></div>
    </div>

@endsection