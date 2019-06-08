<header>
    <nav class='navbar navbar-inverse navbar-static-top' style="background-color: #f9f9f9 !important;border-bottom: 1px solid #e5e5e5;">
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-nabvar-collapse-1' aria-expanded='false'>
                    <span class='se-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href=<?php echo url("/") ?>>科学ちゃんねる</a>
                <!--↓↓ 検索フォーム ↓↓-->
                <?php if(!isset($keyword)){$keyword = "";} ?>
                <form action="{{url('/')}}" style='display:inline-block;width:60%;margin-top:13px'>
                    <input type="text" name="keyword" value="{{$keyword}}" style="width: 80%" placeholder="部屋名を検索してください" >
                    <input type="submit" value="🔍" class="" style="width:15%;">
                </form>
                <!--↑↑ 検索フォーム ↑↑-->
            </div>
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1' style='display:inline-block;'>
                <ul class='nav navbar-nav navbar-right'>
                    @if (Auth::check())
                        <li><a hred='#'>Users</a></li>
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>{{ Auth::user()->name }}<span class='caret'></span></a>
                            <ul class='dropdown-menu'>
                                <li>{!! link_to_route('users.index', 'マイページ') !!}</li>
                                <li role='separator' class='divider'></li>
                                <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('signup.get', '新規登録') !!}</li>
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>