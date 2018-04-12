<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
        toastr.success("{{ Session::get('info') }}");
        @endif
    </script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            <div class="container">
                <div class="row">
                    @if(Auth::check())
                        <div class="col-lg-4">
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <a href="{{ route('home') }}"><strong>=></strong>Home</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('category.index') }}"><strong>=></strong>Category</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('category.create') }}">New category</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('post.index') }}"><strong>=></strong>Posts</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('post.create') }}">New post</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('post.trashed') }}">Trashed posts</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('tag.index') }}"><strong>=></strong>Tags</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('tag.create') }}">New Tag</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('user.index') }}"><strong>=></strong>Users</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">New user</a>
                                </li>


                            </ul>
                        </div>
                     @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Msg Error -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif
    <!-- End Msg Error -->


    {!! Toastr::message() !!}
</body>
</html>
