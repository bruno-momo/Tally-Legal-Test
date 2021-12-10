<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

   <style>
        header .active {
            color: blue;
            font-weight: bold;
        }
        h1 {
            color: darkblue;
            font-size: 24px;
            font-weight: bold;
        }
        h2 {
            color: darkslategray;
            font-size: 28px;
            font-weight: bold;
        }
        h3 {
            color: darkslategray;
            font-size: 22px;
            font-weight: bold;
        }
        header {
            background-color: #e5f8ff;
            height: 100px;
        }
        header nav ul {
            display: inline-flex;
        }
        header nav li {
            height: 35px;
            width: 105px;
        }
        header nav {
            margin-left: 20px;
        }
        header h1 {
            padding: 10px;
            margin-left: 20px;
        }
        img.logo {
            height: 100px;
            object-fit: scale-down;
        }
        .messagevalidation {
            color: red;
        }
        .container h1 {
            margin-top: 5px;
            margin-bottom: 15px;
        }
        .container h2 {
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .container h3 {
            margin-top: 15px;
            margin-bottom: 5px;
        }
        .container a {
            color:blue;
        }
   </style>

</head>
<body>
    <header>
        <h1>Tally - Registro de empresas</h1>
        @if (Route::has('login'))
        <div style="display: flex;width: 100%;justify-content: space-between;">
            @guest
                <nav style="display: flex;justify-content: flex-end;width: 100%;">
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </nav>
            @else
                <nav>
                    <ul>
                        <li>
                            <a class="btn btn-outline-primary" href="{{ route('companies') }}" class="{{ request()->routeIs('companies') ? 'active' : '' }}">
                                Empresas
                            </a>
                        </li>

                    </ul>
                </nav>
                <nav>
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
                </nav>
            @endguest
        </div>
    @endif
    </header>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
