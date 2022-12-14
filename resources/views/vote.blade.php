<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Document</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    </head>
    <body>
        <!-- Logout Popup -->
        <section id="logout-popup" class="hidden fixed w-screen h-screen z-[100] flex justify-center items-center font-poppins">
            <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
            <div class="bg-white rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="tablet:w-32 w-16 body-gradient stroke-white tablet:p-8 p-3 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                <h1 class="tablet:text-2xl text-base font-poppins font-semibold text-center">Are you sure you want to logout?</h1>
                <div class="flex justify-center tablet:gap-8 gap-4">
                    <a href="{{url('/logout')}}" class="bg-gradient text-white font-semibold tablet:text-xl text-sm tablet:w-40 w-28 py-2 rounded-xl text-center">logout</a>
                    <button class="bg-gradient-alt text-gradient font-semibold tablet:text-xl text-sm tablet:w-40 w-28 py-2" id="logout-cancel">Cancel</button>
                </div>
            </div>
        </section>

        <!-- Navbar -->
        <nav class="shadow-sm tablet:px-24 tablet:py-2 px-8 py-2 bg-white">
            <!-- Desktop Navbar -->
                @if (Auth::check())
                <!-- Udah Sign In -->
                <div class="laptop:flex hidden justify-between items-center">
                    <div>
                        <a href="home.html">
                            <img src="asset/logo.png" alt="Digitize" class="h-10"/>
                        </a>
                    </div>
                    <ul class="text-purple font-semibold flex items-center gap-8 text-base">
                        <li><a href="home">Home</a></li>
                        <li><a href="vote-art">Art</a></li>
                        <li><a href="vote-song">Song</a></li>
                        <li><a href="vote-dance">Dance</a></li>
                        @if (Auth::user()->role == 'admin')
                        <li><a href="{{ route('getPeople')}}">Participant</a></li>
                        @endif
                        <div id="navbar-profile-wrapper" class="text-white bg-purple py-1 px-4 rounded-lg ml-4">
                            <button onclick="navbarProfile()">{{ Auth::user()->name }}</button>
                            <div id="navbar-menu" class="hidden flex flex-col gap-4 bg-white text-purple shadow-[0px 2px 8px rgba(0, 0, 0, 0.25)] absolute z-0 rounded-lg right-24 mt-2 px-8 py-4">
                                <div class="flex flex-col">
                                    <h4 class="text-lg">{{ Auth::user()->name }}</h4>
                                    <p class="font-medium opacity-70 -mt-1">{{ Auth::user()->email }}</p>
                                </div>

                                <div id="logout-btn" class="flex gap-3 items-center cursor-pointer">
                                    <img src="asset/logout.png" alt="">
                                    <p>Logout</p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                @else
                <!-- Belum Sign In -->
                <div class="laptop:flex hidden justify-between items-center">
                    <div>
                        <a href="home">
                            <img src="asset/logo.png" alt="Digitize" class="h-10"/>
                        </a>
                    </div>
                    <ul class="text-purple font-semibold flex items-center gap-8 text-base">
                        <li><a href="home">Home</a></li>
                        <li><a href="vote-art">Art</a></li>
                        <li><a href="vote-song">Song</a></li>
                        <li><a href="vote-dance">Dance</a></li>
                        @if (!empty(Auth::user()) && Auth::user()->role == 'admin' )
                        <li><a href="{{ route('getPeople')}}">Participant</a></li>
                        @endif
                        <li class="text-white bg-purple py-1 px-4 rounded-lg ml-4">
                            <a href="login"> Sign In</a>
                        </li>
                    </ul>
                </div>
                @endif

            <!-- Sidebar (Tablet/Mobile) -->
            <div class="laptop:hidden flex justify-between items-center">
                <div>
                    <a href="home">
                        <img src="asset/logo.png" alt="Digitize" class="tablet:h-10 h-6"/>
                    </a>
                </div>
                <div id="sidebar-wrapper" class="inline-block">
                    <button onclick="sidebarMenuWrapper()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tablet:w-10 tablet:h-10 w-6 h-6 text-purple">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>

                    <div id="sidebar-menu" class="fixed flex-col hidden bg-white z-10">
                        <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
                        <div class="fixed flex-col bg-white z-0 h-screen top-0 right-0 tablet:w-2/6 w-2/5 tablet:px-12 tablet:py-16 px-4 py-6">
                            <img src="asset/close.png" alt="close" id="close-sidebar" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4 cursor-pointer" />
                            <ul class="w-full h-full flex flex-col justify-between pt-16">
                                <div class="w-full flex flex-col gap-8 tablet:text-xl text-sm text-right font-semibold">
                                    <li><a href="home">Home</a></li>
                                    <li><a href="vote-art">Art</a></li>
                                    <li><a href="vote-song">Song</a></li>
                                    <li><a href="vote-dance">Dance</a></li>
                                </div>
                                @if (Auth::check())
                                <!-- Sudah Sign In -->
                                <div class=" mb-10 font-semibold w-full flex flex-col tablet:gap-6 gap-4">
                                    <div class="flex flex-col">
                                        <h4 class="tablet:text-xl text-sm text-right">{{ Auth::user()->name }}</h4>
                                        <p class="tablet:text-base text-[10px] text-right font-medium opacity-70 -mt-1">{{ Auth::user()->email }}</p>
                                    </div>

                                    <li id="logout-sidebar-btn" class="text-white text-center w-full tablet:text-xl text-sm bg-purple font-semibold py-1 px-4 rounded-lg ml-4">
                                        <a href="">Logout</a>
                                    </li>
                                </div>
                                @else
                                <!-- Belum Sign In -->
                                <div class=" mb-10 font-semibold w-full">
                                    <li class="text-white text-center w-full tablet:text-xl text-sm bg-purple font-semibold py-1 px-4 rounded-lg ml-4">
                                        <a href="login">Sign In</a>
                                    </li>
                                </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Vote Section -->
        @if(isset($artParticipant))
                <!-- Hero Section -->
                <div id="Art" class="w-full h-screen bg-cover bg-center flex justify-between flex-col items-center pt-60 tablet:pt-72" style="background-image: url({{asset('asset/hero_section/Hero-Art.png')}})">
                    <div class="text-white text-center flex justify-center items-center text-base max-w-xs px-6 tablet:text-xl tablet:max-w-2xl tablet:px-24">
                        <h1>Digitize held a drawing competition with the freedom of the tools used for each participant. You can vote for the work that you think is the best.</h1>
                    </div>
                    <div class="flex justify-center items-center flex-row text-base px-6 pb-24 space-x-8 tablet:space-x-32 tablet:text-2xl tablet:pb-28 tablet:px-24">
                        <a href="#" class="text-white font-medium bg-gradient py-2 px-6 rounded-xl tablet:py-4 tablet:px-8 tablet:rounded-xl">Participate</a>
                        <a href="#voteArt" class="text-gradient font-medium py-1.5 px-6 rounded-xl border-2 br-gradient tablet:py-3 tablet:px-8 tablet:border-4 tablet:rounded-xl tablet:br-gradient">Vote Now</a>
                    </div>
                </div>

            <section id="voteArt">
                <div class="flex flex-col">
                    <div class="flex flex-row justify-center items-center font-bold text-purple text-center text-xl py-6 tablet:text-4xl tablet:py-12 laptop:text-5xl laptop:py-28">
                        <p>
                            See
                            <span class="text-blue">THE WORK</span>
                            of Our Participant
                        </p>
                    </div>
                    <div class="flex flex-wrap justify-center">
                        @foreach($artParticipant as $participant)
                            <div class="flex flex-col justify-center items-center border-2 rounded-xl p-6 space-y-3 shadow-lg br-gradient mx-6 mb-6 tablet:w-80 tablet:mx-12 tablet:mb-12 tablet:shadow-2xl">
                                <img src="{{asset('asset/hero_section/Hero-Art.png')}}" class="object-contain object-center rounded-md w-72 h-60" alt="">
                                <div class="flex flex-col justify-center items-center">
                                    <h1 class="text-black text-center text-xl pb-1 tablet:text-3xl tablet:pb-2 laptop:text-4xl laptop:pb-3">{{$participant->addName}}</h1>
                                    <h3 class="text-trans-black text-center text-base tablet:text-lg laptop:text-xl">Vote {{$participant->vote}}</h3>
                                </div>
                                <a class="w-full"  href="{{route('vote',['id' => $participant->id])}}">
                                    <button {{(Auth::user()->voted) ? 'disabled' : ''}} onclick="votingPopup()" class="w-full text-white text-base font-semibold bg-gradient py-1.5 rounded-md tablet:text-lg tablet:py-2 tablet:rounded-lg laptop:text-xl laptop:py-3 laptop:rounded-xl" type="button">
                                        Vote
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Voting Popup -->
        <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center" id="vote-popup">
            <div class="bg-white rounded-3xl shadow-xl text-gray-800 py-12 px-16 space-y-12">
                <div class="flex justify-end items-center">
                    <img src="{{asset('asset/close.png')}}" onclick="closePopup()" class="h-6 w-6 object-contain" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('asset/popup/register.png')}}" class="h-28 w-28 object-contain" alt="">
                </div>
                <div class="text-2xl justify-center items-center space-y-6">
                    <p>Are you sure want to vote?</p>
                    <div class="flex justify-center space-x-6">
                        <button id="vote-btn" class="px-6 py-2.5 rounded-xl text-xl text-white font-medium bg-gradient">Vote</button>
                        <button onclick="closePopup()" class="px-6 py-2.5 text-gradient br-gradient border-2 font-medium text-xl rounded-xl">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Voting Successfull Popup -->
        <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center" id="vote-success-popup">
            <div class="bg-white rounded-3xl shadow-xl text-gray-800 py-12 px-16 space-y-12">
                <div class="flex justify-end items-center">
                    <img src="{{asset('asset/close.png')}}" onclick="closePopup()" class="h-6 w-6 object-contain" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('asset/popup/ceklis.png')}}" class="h-28 w-28 object-contain" alt="">
                </div>
                <div class="text-2xl justify-center items-center space-y-6">
                    <p>You have successfully voted!</p>
                    <div class="mt-3 flex justify-center space-x-6">
                        <button onclick="closePopup()" class="px-6 py-2.5 text-gradient br-gradient border-2 font-medium text-xl rounded-xl">Back</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Must Login Popup -->
        <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center" id="must-login-popup">
            <div class="bg-white rounded-3xl shadow-xl text-gray-800 py-12 px-16 space-y-12">
                <div class="flex justify-end items-center">
                    <img src="{{asset('asset/close.png')}}" onclick="closePopup()" class="h-6 w-6 object-contain" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('asset/popup/caution.png')}}" class="h-28 w-28 object-contain" alt="">
                </div>
                <div class="text-2xl justify-center items-center space-y-6">
                    <p>You haven't logged in yet!</p>
                    <div class="mt-3 flex justify-center space-x-6">
                        <a href="login.html" class="px-6 py-2.5 text-gradient br-gradient border-2 font-medium text-xl rounded-xl">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Already Voted Popup -->
        <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center" id="already-voted-popup">
            <div class="bg-white rounded-3xl shadow-xl text-gray-800 py-12 px-16 space-y-12">
                <div class="flex justify-end items-center">
                    <img src="{{asset('asset/close.png')}}" onclick="closePopup()" class="h-6 w-6 object-contain" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('asset/popup/ceklis.png')}}" class="h-28 w-28 object-contain" alt="">
                </div>
                <div class="text-2xl justify-center items-center space-y-6">
                    <p>You have already voted</p>
                    <div class="mt-3 flex justify-center space-x-6">
                        <button onclick="closePopup()" class="px-6 py-2.5 text-gradient br-gradient border-2 font-medium text-xl rounded-xl">Back</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Popup -->
        <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center" id="logout-popup">
            <div class="bg-white rounded-3xl shadow-xl text-gray-800 py-12 px-16 space-y-12">
                <div class="flex justify-end items-center">
                    <img src="{{asset('asset/close.png')}}" onclick="closePopup()" class="h-6 w-6 object-contain" alt="">
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('asset/popup/logout.png')}}" class="h-28 w-28 object-contain" alt="">
                </div>
                <div class="text-2xl justify-center items-center space-y-6">
                    <p>Are you sure want to logout?</p>
                    <div class="flex justify-center space-x-6">
                        <button onclick="closePopup()" class="px-6 py-2.5 text-gradient br-gradient border-2 font-medium text-xl rounded-xl">Cancel</button>
                        <button class="px-6 py-2.5 rounded-xl text-xl text-white font-medium bg-gradient">Logout</button>
                    </div>
                </div>
            </div>
        </div>







        <!-- Vote Section -->

        @if(isset($songParticipant))

        <!-- Hero Section -->
        <div id="Song" class=" w-full h-screen bg-cover bg-center flex justify-between flex-col items-center pt-60 tablet:pt-72" style="background-image: url({{asset('asset/hero_section/Hero-Song.png')}})">
            <div class="text-white text-center flex justify-center items-center text-base max-w-xs px-6 tablet:text-xl tablet:max-w-2xl tablet:px-24">
                <h1>Digitalize is holding a singing competition. The songs that are sung are up to the participants. You can vote for the work that you think is the best.</h1>
            </div>
            <div class="flex justify-center items-center flex-row text-base px-6 pb-24 space-x-8 tablet:space-x-32 tablet:text-2xl tablet:pb-28 tablet:px-24">
                <a href="#" class="text-white font-medium bg-gradient py-2 px-6 rounded-xl tablet:py-4 tablet:px-8 tablet:rounded-xl">Participate</a>
                <a href="#voteSong" class="text-gradient font-medium py-1.5 px-6 rounded-xl border-2 br-gradient tablet:py-3 tablet:px-8 tablet:border-4 tablet:rounded-xl tablet:br-gradient">Vote Now</a>
            </div>
        </div>

            <section id="voteSong">
                <div class="flex flex-col">
                    <div class="flex flex-row justify-center items-center font-bold text-purple text-center text-xl py-6 tablet:text-4xl tablet:py-12 laptop:text-5xl laptop:py-28">
                        <p>
                            See
                            <span class="text-blue">THE WORK</span>
                            of Our Participant
                        </p>
                    </div>
                    <div class="flex flex-wrap justify-center">
                        @foreach ($songParticipant as $participant)
                            <div class="w-full flex flex-col justify-center items-center border-2 rounded-xl p-6 space-y-3 shadow-lg br-gradient mx-6 mb-6 tablet:w-80 tablet:mx-12 tablet:mb-12 tablet:shadow-2xl">
                                <img src="" class="object-contain object-center rounded-md w-72 h-60" alt="">
                                <div class="flex flex-col justify-center items-center">
                                    <h1 class="text-black text-center text-xl pb-1 tablet:text-3xl tablet:pb-2 laptop:text-4xl laptop:pb-3">{{$participant->addName}}</h1>
                                    <h3 class="text-trans-black text-center text-base tablet:text-lg laptop:text-xl">Vote {{$participant->vote}}</h3>
                                </div>
                                <a class="w-full" href="{{route('vote',['id' => $participant->id])}}">
                                    <button {{Auth::user()->voted ? 'disabled' : ''}} onclick="votingPopup()" class="w-full text-white text-base font-semibold bg-gradient py-1.5 rounded-md tablet:text-lg tablet:py-2 tablet:rounded-lg laptop:text-xl laptop:py-3 laptop:rounded-xl" type="button">
                                        Vote
                                    </button>
                                </a>
                            </div>
                        @endforeach

                    </div>
            </section>
        @endif







        <!-- Vote Section -->
        @if(isset($danceParticipant))

        <!-- Hero Section -->
        <div id="Dance" class="w-full h-screen bg-cover bg-center flex justify-between flex-col items-center pt-60 tablet:pt-72" style="background-image: url({{asset('asset/hero_section/Hero-Dance.png')}})">
            <div class="text-white text-center flex justify-center items-center text-base max-w-xs px-6 tablet:text-xl tablet:max-w-2xl tablet:px-24">
                <h1>Digitize held a dance competition and the choice of songs was up to the participants. You can vote for the work that you think is the best.</h1>
            </div>
            <div class="flex justify-center items-center flex-row text-base px-6 pb-24 space-x-8 tablet:space-x-32 tablet:text-2xl tablet:pb-28 tablet:px-24">
                <a href="#" class="text-white font-medium bg-gradient py-2 px-6 rounded-xl tablet:py-4 tablet:px-8 tablet:rounded-xl">Participate</a>
                <a href="#voteDance" class="text-gradient font-medium py-1.5 px-6 rounded-xl border-2 br-gradient tablet:py-3 tablet:px-8 tablet:border-4 tablet:rounded-xl tablet:br-gradient">Vote Now</a>
            </div>
        </div>

        <section id="voteDance">
            <div class="flex flex-col">
                <div class="flex flex-row justify-center items-center font-bold text-purple text-center text-xl py-6 tablet:text-4xl tablet:py-12 laptop:text-5xl laptop:py-28">
                    <p>
                        See
                        <span class="text-blue">THE WORK</span>
                        of Our Participant
                    </p>
                </div>
                <div class="flex flex-wrap justify-center">
                    @foreach($danceParticipant as $participant)
                        <div class="flex flex-col justify-center items-center border-2 rounded-xl p-6 space-y-3 shadow-lg br-gradient mx-6 mb-6 tablet:w-80 tablet:mx-12 tablet:mb-12 tablet:shadow-2xl">
                            <img src="{{asset('asset/hero_section/Hero-Art.png')}}" class="object-contain object-center rounded-md w-72 h-60" alt="">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-black text-center text-xl pb-1 tablet:text-3xl tablet:pb-2 laptop:text-4xl laptop:pb-3">{{$participant->addName}}</h1>
                                <h3 class="text-trans-black text-center text-base tablet:text-lg laptop:text-xl">Vote {{$participant->vote}}</h3>
                            </div>
                            <a class="w-full" href="{{route('vote',['id' => $participant->id])}}">
                                <button {{Auth::user()->voted ? 'disabled' : ''}} onclick="votingPopup()" class="w-full text-white text-base font-semibold bg-gradient py-1.5 rounded-md tablet:text-lg tablet:py-2 tablet:rounded-lg laptop:text-xl laptop:py-3 laptop:rounded-xl" type="button">
                                    Vote
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
        </section>
        @endif

        <!-- Footer -->
        <div class="flex flex-col items-center justify-center gap-4 bg-[#1E1E1E] w-full text-white text-center tablet:py-10 py-6 px-12">
            <img src="asset/logo-white.png" alt="Digitize" class="tablet:h-12 h-8">
            <div class="tablet:text-lg text-sm flex gap-4">
                <a href="home">Home</a>
                <a href="vote-art">Art</a>
                <a href="vote-song">Song</a>
                <a href="vote-dance">Dance</a>
            </div>
            <p class="tablet:text-sm text-xs opacity-50">Copyright ?? 2022 Digitize.com. All Rights Reserved</p>
        </div>


        <script src="{{asset('js/navbar.js')}}"></script>
        <script src="{{asset('js/popup.js')}}"></script>
    </body>
</html>

<!-- npx tailwindcss -i ./resources/css/vote_style.css -o ./public/css/style.css --watch -->
