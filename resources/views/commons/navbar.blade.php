<header>
    <nav class='navbar navbar-inverse navbar-static-top'>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-nabvar-collapse-1' aria-expanded='false'>
                    <span class='se-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='/'>科学ちゃんねる</a>
            </div>
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav navbar-right'>
                    <li>{!! link_to_route('signup.get', '新規登録') !!}</li>
                    <li><a href='#'>ログイン</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>