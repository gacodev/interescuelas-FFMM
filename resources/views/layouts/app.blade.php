<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INTERESCUELAS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/axios.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div>
                <a class="navbar-brand mr-4" href="{{ url('/participants') }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Escudo_Fuerza_Aerea_Colombiana.svg/800px-Escudo_Fuerza_Aerea_Colombiana.svg.png" alt="" width="50px" height="50px">
                </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ml-4 mb-2 mb-lg-0 mx-auto">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/participantes">Participantes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/equipos">Equipos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/participantes/editar">Editar Participantes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/staff">Registrar equipos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/participantes/registro">Registrar Participantes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/resultados">Resultados</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/roles">Roles</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active b" aria-current="page" href="/medalleria">Medalleria</a>
                      </li>
                    </ul>
                </div>

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
            @yield('content')
        </main>
    </div>
    <footer class="mt-4  text-center text-lg-start footer">
        <div class="text-center p-2 bg-primary" >

          <p style="line-height: 0.1;">Fuerza Aerea Colombiana <p>
          <p style="line-height: 0.1;">© 2022 Copyright<p>
          
        </div>
      </footer>
</body>
</script>
</html>
