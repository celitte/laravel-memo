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
        <nav class="navbar navbar-expand-md navbar-white shadow-sm" style="background-color:#e3f2fd";>
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
            <!-- <div class="row">
                <div class="col-md-4 offset-md-2">
                    
                    <div class="card w-100">
                    <div class="card-header">レシピ詳細</div>
                        <div class="card-body">
                        
                            @foreach($memos as $memo)
                            <a href="/detail/{{ $memo['id']}}" class="card-text d-block">{{ $memo['name'] }}</a>
                            @endforeach
                        </div>
                    </div>

                    
                </div>  -->
                    <!-- <div class="col-md-2">
                        <div class="card w-100" style="margin-bottom: 10px;">
                            <div class="card-header">レシピ詳細</div>
                                <div class="card-body" style="padding-bottom: 20px;">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            
                                </div>
                            
                        </div>


                            

                    </div>


                    <div class="col-md-2">
                        <div class="card w-100" style="margin-bottom: 10px;">
                            <div class="card-header">レシピ詳細</div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            
                                </div>
                            
                        </div>

                        <div class="card w-100" style="margin-bottom: 10px;">
                            <div class="card-header">レシピ詳細</div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            
                                </div>
                            
                        </div>

                        <div class="card w-100" style="margin-bottom: 10px;">
                            <div class="card-header">レシピ詳細</div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            
                                </div>
                            
                        </div>





                    </div> -->

                        <div class="col-md-5">
                            @yield('content')
                        </div>
            </div>

        </main>
    </div>
</body>
</html>
