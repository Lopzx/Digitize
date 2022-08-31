<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Digitize</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
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

        <!-- Content Wrapper -->
        <div class="flex flex-col justify-center items-center content-center h-full laptop:gap-24 tablet:gap-16 gap-12">

            <!-- Landing Page -->
            <div class="h-screen w-full bg-cover bg-center bg-no-repeat flex flex-col justify-center items-center" style="background-image: url(asset/home/bg-landing.png);">
                <div class="flex flex-col gap-4">
                    <h1 class="text-white laptop:text-6xl tablet:text-5xl text-2xl laptop:text-left text-center font-semibold">Show Your Full Potential</h1>
                    <h1 class="text-white laptop:text-6xl tablet:text-5xl text-2xl laptop:text-left text-center font-semibold">By Participating in Our Event!</h1>
                </div>
                <a href="#category" class="absolute top-[80%] bg-gradient text-center tablet:text-2xl text-lg text-white font-semibold py-2 px-16 rounded-lg">Vote Now</a>
            </div>

            <div class="laptop:mx-24 tablet:mx-14 mx-10 flex flex-col laptop:gap-32 tablet:gap-24 gap-12">
                <!-- About Digitize -->
                <div class="flex flex-col tablet:gap-16 gap-8">
                    <h2 class="text-center tablet:text-5xl text-3xl font-semibold text-purple">About <span class="text-blue">Digitize</span></h2>
                    <div class="flex tablet:flex-row flex-col items-center laptop:gap-48 tablet:gap-20 gap-10 laptop:mx-24 tablet:mx-12 mx-0">
                        <img src="asset/home/logo-about.png" alt="Digitize" class="laptop:w-[400px] w-[200px]">
                        <div class="flex flex-col tablet:gap-8 gap-6">
                            <p class="text-black tablet:text-xl text-base tablet:text-left text-center opacity-50">Digitize is a competition event held at University A. Digitize always organizes competitions every year. Digitize held a competition with three categories, which are drawing competition, singing competition, and dancing competition.</p>
                            <p class="text-black tablet:text-xl text-base tablet:text-left text-center opacity-50">Digitize uses the online voting system on the Digitize website to find the winner. Each person can choose maximum 1 participant in each category. The participant with the most votes in each category will be the winner.</p>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div id="category" class="flex flex-col tablet:gap-16 gap-8">
                    <h2 class="text-center tablet:text-5xl text-3xl font-semibold text-purple">What <span class="text-blue">Digitize</span> Do</h2>
                    <div class="flex laptop:flex-row flex-col justify-center items-center laptop:gap-20 tablet:gap-14 gap-10">
                        <div class="flex tablet:flex-row flex-col laptop:gap-20 tablet:gap-14 gap-10">
                            <!-- Art -->
                            <div class="flex flex-col tablet:gap-4 gap-2 items-center justify-center bg-gradient-alt tablet:w-64 tablet:h-60 w-48 h-52">
                                <img src="asset/home/art.png" alt="Art">
                                <p class="text-purple tablet:text-2xl text-xl font-semibold">Art</p>
                                <a href="{{route('getArt')}}" class="z-0 text-white bg-purple py-2 px-6 rounded-lg tablet:text-lg text-base">Learn More</a>
                            </div>

                            <!-- Song -->
                            <div class="flex flex-col tablet:gap-4 gap-2 items-center justify-center bg-gradient-alt tablet:w-64 tablet:h-60 w-48 h-52">
                                <img src="asset/home/song.png" alt="Song">
                                <p class="text-purple tablet:text-2xl text-xl font-semibold">Song</p>
                                <a href="{{route('getSong')}}" class="z-0 text-white bg-purple py-2 px-6 rounded-lg tablet:text-lg text-base">Learn More</a>
                            </div>
                        </div>

                        <!-- Dance -->
                        <div class="flex flex-col tablet:gap-4 gap-2 items-center justify-center bg-gradient-alt tablet:w-64 tablet:h-60 w-48 h-52">
                            <img src="asset/home/dance.png" alt="Dance">
                            <p class="text-purple tablet:text-2xl text-xl font-semibold">Dance</p>
                            <a href="{{route('getDance')}}" class="z-0 text-white bg-purple py-2 px-6 rounded-lg tablet:text-lg text-base">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interested Yet? -->
            <form id="email-form" class="body-gradient w-full flex flex-col items-center justify-center laptop:px-24 tablet:px-14 px-12 tablet:py-14 py-8 gap-8" onsubmit="validateEmail(event)">
                <h2 class="text-center tablet:text-5xl text-3xl font-semibold text-white">Interested Yet?</h2>
                <p class="text-white tablet:text-xl text-base text-center">Get more information and the latest competitions from Digitize, subscribe now!</p>

                <div class="flex flex-col gap-4">
                    <div class="flex">
                        <input type="text" id="email" class="bg-[#1E1E1E4D] tablet:py-4 tablet:px-8 py-2 px-4 text-white tablet:text-lg text-sm tablet:w-80 w-full outline-none rounded-l-xl" placeholder="Your Email">
                        <button type="submit" class="bg-white text-purple tablet:text-lg text-sm font-semibold tablet:px-8 px-4 rounded-r-xl">Subscribe</button>
                    </div>

                    <div id="email-error" class="hidden text-white justify-center tablet:text-sm text-xs flex items-center gap-2 bg-[#ca13134d] rounded-lg py-1">
                        <img src="asset/error-white.png" alt="error" class="h-5" />
                        <p id="email-error-message"></p>
                    </div>
                </div>
            </form>

            <!-- Contact Us -->
            <form id="contact-form" action="" class="laptop:px-48 tablet:px-14 px-12 w-full flex flex-col tablet:gap-16 gap-8 items-center" onsubmit="validateContact(event)">
                <h2 class="text-center tablet:text-5xl text-3xl font-semibold text-purple">Contact <span class="text-blue">Us</span></h2>

                <div class="flex tablet:flex-row flex-col laptop:gap-32 tablet:gap-16 gap-8 w-full">
                    <!-- Left Section -->
                    <div class="flex flex-col gap-6 w-full justify-between">
                        <div>
                            <h4 class="tablet:text-left text-center tablet:text-lg text-sm font-semibold">Have any questions for us? <br> Come and message us your questions!</h4>
                        </div>
                        <div class="flex flex-col gap-6 w-full">
                            <!-- Name -->
                            <div>
                                <input id="contact-name" type="text" placeholder="Name" class="outline-none border-b-2 border-[#1E1E1E4D] w-full tablet:text-lg text-sm">
                                <div id="contact-name-error" class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                    <img src="asset/error.png" alt="error" class="h-5" />
                                    <p>Name is required</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <input id="contact-email" type="text" placeholder="Email" class="outline-none border-b-2 border-[#1E1E1E4D] w-full tablet:text-lg text-sm">
                                <div id="contact-email-error" class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                    <img src="asset/error.png" alt="error" class="h-5" />
                                    <p id="contact-email-error-message"></p>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <input id="contact-message" type="text" placeholder="Message" class="outline-none border-b-2 border-[#1E1E1E4D] w-full tablet:text-lg text-sm">
                                <div id="contact-message-error" class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                    <img src="asset/error.png" alt="error" class="h-5" />
                                    <p>Message is required</p>
                                </div>
                            </div>

                            <button type="submit" class="bg-gradient w-full text-center text-white tablet:text-lg text-sm tablet:py-2 py-1.5 tablet:mt-4 mt-0 font-semibold tablet:rounded-xl rounded-lg">Message</button>
                        </div>
                    </div>

                    <!-- Right Section -->
                    <div class="bg-gradient tablet:w-[700px] w-full text-white flex flex-col gap-6 rounded-xl laptop:px-12 px-2 tablet:py-8 py-6">
                        <h3 class="text-center tablet:text-2xl text-lg font-semibold">Information</h3>
                        <div class="flex flex-col gap-5 px-10">
                            <div class="flex gap-3 items-center tablet:text-lg text-sm">
                                <img src="asset/home/email.png" alt="Email" class="tablet:h-8 h-6">
                                <p>digitize@gmail.com</p>
                            </div>
                            <div class="flex gap-3 items-center tablet:text-lg text-sm">
                                <img src="asset/home/phone.png" alt="Phone" class="tablet:h-8 h-6">
                                <p>+62 812 3456 7890</p>
                            </div>
                            <div class="flex gap-3 items-center tablet:text-lg text-sm">
                                <img src="asset/home/location.png" alt="Location" class="tablet:h-8 h-6">
                                <p>Jl. Raya Kb. Jeruk No.27</p>
                            </div>
                            <div class="flex gap-3 items-center tablet:text-lg text-sm">
                                <img src="asset/home/time.png" alt="Time" class="tablet:h-8 h-6">
                                <p>09.00 - 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Footer -->
            <div class="flex flex-col items-center justify-center gap-4 bg-[#1E1E1E] w-full text-white text-center tablet:py-10 py-6 px-12">
                <img src="asset/logo-white.png" alt="Digitize" class="tablet:h-12 h-8">
                <div class="tablet:text-lg text-sm flex gap-4">
                    <a href="home">Home</a>
                    <a href="vote-art">Art</a>
                    <a href="vote-song">Song</a>
                    <a href="vote-dance">Dance</a>
                </div>
                <p class="tablet:text-sm text-xs opacity-50">Copyright © 2022 Digitize.com. All Rights Reserved</p>
            </div>
        </div>

        <script src="{{asset('js/navbar.js')}}"></script>
        <script src="{{asset('js/home.js')}}"></script>
    </body>
</html>
