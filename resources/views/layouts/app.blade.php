<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jquery-ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-inverse shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('add_student') }}">Create Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('add_score') }}">Add Score</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
