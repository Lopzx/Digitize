<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vote_style.css') }}" rel="stylesheet">
    <body style="background: linear-gradient(90deg, #8f46d9 0%, #5753ff 100%)">
    <title>Document</title>
</head>
<body>
    <nav class="shadow-sm tablet:px-24 tablet:py-2 px-8 py-2 bg-white">
        <!-- Desktop Navbar -->
        <div class="laptop:flex hidden justify-between items-center">
            <div>
                <a href="#">
                    <img src="{{asset('asset/logo.png')}}" alt="Digitize" class="h-10"/>
                </a>
            </div>
            <ul class="text-purple flex items-center gap-8 text-base">
                <li><a href="#">Home</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Song</a></li>
                <li><a href="#">Dance</a></li>
                <li><a href="{{ route('getPeople')}}">Participant</a></li>
                <li class="text-white bg-purple py-1 px-4 rounded-lg ml-4">
                    <a href="#"> Sign In</a>
                </li>
            </ul>
        </div>

        <!-- Sidebar (Tablet/Mobile) -->
        <div class="laptop:hidden flex justify-between items-center">
            <div>
                <a href="#">
                    <img src="asset/logo.png" alt="Digitize" class="tablet:h-10 h-6"/>
                </a>
            </div>
            <div id="sidebar-wrapper" class="inline-block">
                <button onclick="sidebarMenuWrapper()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tablet:w-10 tablet:h-10 w-6 h-6 text-purple">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
                <div id="sidebar-menu" class="fixed flex-col hidden">
                    <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
                    <div class="fixed flex-col bg-white z-0 h-screen top-0 right-0 tablet:w-2/6 w-2/5 tablet:px-12 tablet:py-16 px-4 py-6">
                        <img src="asset/close.png" alt="close" id="close-sidebar" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" />
                        <ul class="w-full h-full flex flex-col justify-between pt-16">
                            <div class="w-full flex flex-col gap-8 tablet:text-xl text-sm text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Song</a></li>
                                <li><a href="#">Dance</a></li>
                                <li><a href="#">Participant</a></li>
                            </div>
                            <div class="mb-10">
                                <li class="text-white text-center tablet:text-xl text-sm bg-purple font-semibold py-1 px-4 rounded-lg ml-4">
                                    <a href="#">Sign In</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html>

<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>




