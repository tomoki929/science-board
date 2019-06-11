<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>テスト環境</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>

    <body>
        <div id="wrapper">
            @include('commons.navbar')
            @include('commons.main_item')
            @include('commons.error_messages')
            @yield('content')
            @include('commons.footer')
        </div>
    </body>
</html>

<style>
    body,
    #wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    }
</style>