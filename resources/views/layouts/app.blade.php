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

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/flower-lotus-duotone-svgrepo-com.svg">
    <style>
        .bg-light-pink{
            background-color: #f4ceef;
        }
        body{
            background-color: #f8e6f6;
            font-family: monospace;
        }
        .text-pink{
            color: #78306e;
        }
        .text-dark-pink{
        color: #bf52b1;
        }
    .text-dark-pink:hover{
        color: #8d3882;
    }
    .min-width{
        min-width:40vh;
    }
    .btn-pink{
        background-color: #c05cb2;
        border: none;
        padding: 0.3rem;
        border-radius: 0.6rem;
        color: whitesmoke;
    }
    .btn-pink:hover{
        color: whitesmoke;
        background-color: #ba51ac;
        transform: scale(1.05);
        transition: transform 0.3s;
    }
    .hover-effect {
        transition: transform 0.3s; /* Transform özelliğindeki geçiş süresi */
    }
    .hover-effect:hover {
        transform: scale(1.05);
    }
    .border-pink{
        border: #8d3882 2px solid;
    }
    input[type=file] {
        display: none;    
    }
    .image-input{
        font-family: monospace;
        cursor: pointer; 
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm bg-light-pink rounded rounded-5 mt-2 mx-2 p-3">
            <div class="container">
                <a class="navbar-brand text-pink hover-effect" href="{{ url('home')}}" id="hometitle">
                <svg fill="#cf68c1" width="2rem" height="2rem" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg" stroke="#cf68c1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M128,200c-16,0-42.45605-.18018-72.88965-17.75146-30.43652-17.57227-40.28418-39.58643-43.43457-50.8545a7.95692,7.95692,0,0,1,5.68018-9.832c7.38183-1.8916,20.12793-3.60156,36.52588.2876-6.65186-22.24609-3.2544-39.50781-.415-48.248a8.01264,8.01264,0,0,1,9.3042-5.33984A77.46013,77.46013,0,0,1,94.09277,83.38916h-.001A107.00223,107.00223,0,0,0,88,120C88,178.18164,128,200,128,200Zm110.644-78.438c-7.38134-1.8916-20.12793-3.60156-36.52588.2876,6.65235-22.24609,3.2544-39.50781.415-48.248a8.01264,8.01264,0,0,0-9.3042-5.33984,77.46013,77.46013,0,0,0-31.32177,15.12744h.001A107.00223,107.00223,0,0,1,168,120c0,58.18164-40,80-40,80,16,0,42.45605-.18018,72.88965-17.75146,30.43652-17.57227,40.28418-39.58643,43.43457-50.8545A7.95654,7.95654,0,0,0,238.644,121.562Z" opacity="0.2"></path> <path d="M250.47559,121.28906a15.82032,15.82032,0,0,0-9.84375-7.47558,80.056,80.056,0,0,0-27.957-1.85254,85.73919,85.73919,0,0,0-2.53125-40.8252,15.96151,15.96151,0,0,0-18.54394-10.706,82.54925,82.54925,0,0,0-26.15772,10.74463,94.04874,94.04874,0,0,0-27.84326-34.36963,15.9407,15.9407,0,0,0-19.19726,0A94.05373,94.05373,0,0,0,90.55762,71.17432,82.556,82.556,0,0,0,64.40234,60.42969a15.96653,15.96653,0,0,0-18.54589,10.707A85.73054,85.73054,0,0,0,43.3252,111.96a80.01629,80.01629,0,0,0-27.957,1.85352,15.957,15.957,0,0,0-11.3955,19.73828c3.53808,12.65332,14.36767,36.70508,47.13769,55.626C83.67676,207.979,112.45654,208,127.94629,208c.01562,0,.03027.00195.0459.00195L128,208.00146l.00781.00049c.01563,0,.03028-.00195.0459-.00195,15.48975,0,44.26953-.021,76.83594-18.82324,32.77-18.91992,43.59961-42.97168,47.13769-55.625A15.81809,15.81809,0,0,0,250.47559,121.28906ZM194.92578,76.07812c2.73926,8.43409,5.41943,23.521-.30029,42.96338a7.93219,7.93219,0,0,0-.29834,1.01612,104.57446,104.57446,0,0,1-9.54248,21.58886,119.23026,119.23026,0,0,1-17.38526,23.00538C172.46582,152.71582,176,137.96094,176,120a117.25342,117.25342,0,0,0-4.6875-33.57227A67.40026,67.40026,0,0,1,194.92578,76.07812ZM128.02832,49.627C137.64111,56.80176,160,78.02344,160,120c0,42.542-22.69238,63.5918-32,70.43652C118.69238,183.5918,96,162.542,96,120,96,78.02344,118.35889,56.80176,128.02832,49.627ZM61.07324,76.08008A67.35665,67.35665,0,0,1,84.6875,86.42773,117.256,117.256,0,0,0,80,120c0,17.96094,3.53418,32.71582,8.60059,44.65186a119.23026,119.23026,0,0,1-17.38526-23.00538,104.56282,104.56282,0,0,1-9.5498-21.61474,7.98057,7.98057,0,0,0-.27393-.93213C55.64941,99.62939,58.332,84.52148,61.07324,76.08008ZM19.3418,129.31152a66.43858,66.43858,0,0,1,28.34814-.57763,123.02667,123.02667,0,0,0,9.669,20.91259,138.33271,138.33271,0,0,0,33.27295,38.52344,121.79948,121.79948,0,0,1-31.52149-12.84863C31.25732,159.23926,22.26367,139.54883,19.3418,129.31152Zm177.54785,46.00879a121.79928,121.79928,0,0,1-31.521,12.84912,138.33687,138.33687,0,0,0,33.27246-38.523,123.02667,123.02667,0,0,0,9.66895-20.91259,67.45364,67.45364,0,0,1,28.30908.50927C233.73633,139.54883,224.74268,159.23926,196.88965,175.32031Z"></path> </g></svg>
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
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div  class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <p class="dropdown-item">
                                        {{ auth()->user()->email }} <!-- Kullanıcının e-posta adresini burada ekliyoruz -->
                                    </p>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" id="logout">
                                        {{ __('messages.logout') }}

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        @role('admin')
                        <li class="nav-item mx-1">
                            <a href="{{url('us')}}">
                                <svg  class="hover-effect" width="2rem" height="2rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" stroke="#78306e" stroke-width="1.5"></circle> <path opacity="0.5" d="M18 9C19.6569 9 21 7.88071 21 6.5C21 5.11929 19.6569 4 18 4" stroke="#78306e" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M6 9C4.34315 9 3 7.88071 3 6.5C3 5.11929 4.34315 4 6 4" stroke="#78306e" stroke-width="1.5" stroke-linecap="round"></path> <ellipse cx="12" cy="17" rx="6" ry="4" stroke="#78306e" stroke-width="1.5"></ellipse> <path opacity="0.5" d="M20 19C21.7542 18.6153 23 17.6411 23 16.5C23 15.3589 21.7542 14.3847 20 14" stroke="#78306e" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M4 19C2.24575 18.6153 1 17.6411 1 16.5C1 15.3589 2.24575 14.3847 4 14" stroke="#78306e" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                            </a>
                        </li>
                        @endrole

                        <!--<div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ app()->getLocale() == 'tr'? 'Turkish':'English' }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ url(app()->getLocale() == 'tr'? 'en':'tr' ) }}"> {{ app()->getLocale() == 'tr'? 'English':'Turkish' }}</a>
                            
                                </div>
                            </div>
                            
                        </div>-->

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
