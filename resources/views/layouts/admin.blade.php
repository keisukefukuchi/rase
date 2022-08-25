<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header>
        <div class="header-guest">
            <nav class="nav" id="nav">
                <ul>
                    <li><a class="drawer_link" href="/">HOME</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="drawer_link drawer_button">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <div class="menu" id="menu">
                <span class="menu__line--top"></span>
                <span class="menu__line--middle"></span>
                <span class="menu__line--bottom"></span>
            </div>
            <h1 class="header-title">Rese</h1>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
