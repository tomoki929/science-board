<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3a6b9c;line-height:20px;display: block;margin-bottom:0px;border-radius:0;">
    <div class="header-left">
        <a href=<?php echo url("/") ?>>科学ちゃんねる</a>
    </div>
    @if (Auth::check())
        <div class="header-right">
            {!! link_to_route('logout.get', 'ログアウト') !!}
        </div>
        <div class="header-right">
            {!! link_to_route('users.index', 'マイページ') !!}
        </div>
    @else
        <div class="header-right">
            {!! link_to_route('signup.get', '新規登録') !!}
        </div>
        <div class="header-right">
            {!! link_to_route('login', 'ログイン') !!}
        </div>
    @endif
</nav>

<style>
.header-left {
  float: left;
}

.header-left a {
  color: #fff !important;
}

.header-right {
  float: right;
}

.header-right a {
  color: #fff !important;
  padding-right: 10px;
  display: block;
}
</style>