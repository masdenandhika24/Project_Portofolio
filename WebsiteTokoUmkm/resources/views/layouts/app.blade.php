<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #333; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; }
    #app { background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); width: 100%; max-width: 420px; box-sizing: border-box; }
    .Laravel { font-size: 28px; font-weight: 800; color: #764ba2; text-align: center; margin-bottom: 25px; display: block; letter-spacing: 1px; }
    ul { list-style: none; padding: 0; display: flex; justify-content: center; gap: 25px; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 12px; }
    ul a { text-decoration: none; color: #aaa; font-weight: 600; font-size: 16px; transition: color 0.3s; }
    ul a:hover { color: #764ba2; }
    label { font-size: 14px; font-weight: 600; color: #666; display: block; margin-bottom: 5px; }
    input[type="email"], input[type="password"], input[type="text"] { width: 100%; padding: 12px 15px; margin-bottom: 20px; border: 1px solid #e0e0e0; border-radius: 6px; box-sizing: border-box; font-size: 14px; background-color: #f9f9f9; transition: all 0.3s; }
    input[type="email"]:focus, input[type="password"]:focus { border-color: #764ba2; background-color: #fff; outline: none; box-shadow: 0 0 5px rgba(118, 75, 162, 0.2); }
    .form-check { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; font-size: 14px; color: #666; }
    button, input[type="submit"] { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px; border: none; border-radius: 6px; cursor: pointer; width: 100%; font-size: 16px; font-weight: 600; letter-spacing: 0.5px; transition: opacity 0.3s; box-shadow: 0 4px 12px rgba(118, 75, 162, 0.3); }
    button:hover { opacity: 0.9; }
    a[href*="password"] { display: block; text-align: center; margin-top: 15px; font-size: 13px; color: #888; text-decoration: none; }
    a[href*="password"]:hover { color: #764ba2; text-decoration: underline; }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
