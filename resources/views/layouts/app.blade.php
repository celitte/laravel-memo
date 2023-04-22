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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    <!-- <link href="{{asset('css/style.css')}}" rel="stylesheet"> -->


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white shadow-sm" style="background-color:#e3f2fd" ;>
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

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <div class="row">
                <div class="col-md-4 offset-md-2">

                    <div class="container mx-auto px-4 py-3">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="py-4 px-8 bg-gray-100 border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-800">レシピ一覧</h2>
                            </div>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                                @foreach($memos as $memo)
                                <a href="/detail/{{ $memo['id'] }}" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                    @if($memo['image'])
                                    <img src="{{ '/storage/' . $memo['image'] }}" alt="{{ '料理の画像'}}" class="object-cover h-28 rounded-t-lg">
                                    @else
                                    <img src="{{ '../images/ciid.png' }}" alt="{{ 'ダミー画像'}}" class="object-cover h-28 rounded-t-lg">
                                    @endif

                                    <div class="py-2 px-2">
                                        <h3 class="text-lg font-bold mb-2">{{ $memo['name'] }}</h3>
                                        <p class="text-gray-700">{{ $memo['created_at'] }}</p>
                                    </div>
                                </a>

                                @endforeach
                            </div>
                            {{ $memos->links() }}

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    @yield('content')
                </div>
            </div>

        </main>
    </div>
</body>

</html>