<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200&family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="/css/style.css">
    <!-- <link href="{{asset('css/style.css')}}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="/css/app.css"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200;500;700&family=Roboto:ital,wght@0,100;1,900&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white shadow-sm" style="background-color:#ffe000" ;>
            <div class="container">
                <a class="navbar-brand font-sans" href="{{ url('/') }}">
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

                    <div class="container mx-auto px-2 py-1">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="py-2.5 px-8 bg-yellow-300 border-b border-gray-200">
                                <h2 class="font-sans text-2xl text-gray-800">レシピ一覧</h2>

                            </div>

                            <div class="grid grid-cols-1 gap-4 px-4 py-4 md:grid-cols-2 lg:grid-cols-3">
                                @foreach($memos as $memo)
                                <div class=recipe-card>
                                    <a href="/detail/{{ $memo['id'] }}" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                        @if($memo['image'])
                                        <!-- <img src="{{ Storage::disk('s3')->url($memo['image']) }}" alt="{{ '料理の画像' }}" class="object-cover w-full h-48 rounded-t-lg"> -->
                                        <img src="{{ Storage::url($memo['image']) }}" alt="料理の画像" class="object-cover w-full h-48 rounded-t-lg">

                                        @else
                                        <img src="{{ Storage::disk('s3')->url('images/ciid.png') }}" alt="{{ 'ダミー画像' }}" class="object-cover w-full h-48 rounded-t-lg">
                                        @endif
                                    </a>


                                    <div class="py-2 px-2">
                                        <h3 class="font-sans text-lg font-bold mb-2" style="color: #000000;">{{ $memo['name'] }}</h3>
                                        <p class="font-sans text-gray-700">{{ \Carbon\Carbon::parse($memo['created_at'])->format('Y/m/d') }}</p>

                                    </div>
                                    </a>
                                </div>

                                @endforeach
                            </div>
                            <!-- Laravel Paginator -->
                            <div class="pagination-wrapper relative">
                                {{ $memos->render('pagination::simple-bootstrap-4') }}


                                <p class="pagination-message">{{ $memos->firstItem() }}〜{{ $memos->lastItem() }} / {{ $memos->total() }}件</p>
                            </div>


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