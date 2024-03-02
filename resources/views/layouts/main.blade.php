<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
</head>
<body>

    <main>
        @yield('content')
    </main>

</body>
</html>