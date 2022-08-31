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

    <section id="edit-popup" class=" fixed w-screen h-screen z-[100] flex justify-center items-center">
        <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
        <div class="bg-white rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <a href="{{route('getPeople')}}"><img src="{{asset('asset/close.png')}}" alt="close" id="edit-close" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" /></a>
            <div>
                <h1 class="text-purple tablet:text-4xl text-2xl font-semibold">Edit Participant</h1>
            </div>
            <form id="edit-form" action="{{route('updatePeople', ['id' => $people->id])}}" class="flex flex-col gap-8 w-full" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="flex flex-col gap-6">
                    <!-- Full Name -->
                    <div class="flex flex-col gap-1">
                        <label for="addName"  class="text-purple tablet:text-xl text-base font-semibold">Full Name</label>
                        <input id="edit-name" name="addName" value="{{$people->addName}}" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                        @error('addName')
                        <div class="text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="flex flex-col gap-1">
                        <label for="addDob"  class="text-purple tablet:text-xl text-base font-semibold">Date of Birth</label>
                        <input id="edit-dob" name="addDob" value="{{$people->addDob}}" type="date" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                        {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="edit-dob-error">Date of birth is required</p>
                        </div> --}}
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label for="addEmail"  class="text-purple tablet:text-xl text-base font-semibold">Email</label>
                        <input id="edit-email" name="addEmail" value="{{$people->addEmail}}" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your email here..."/>

                        {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="edit-email-error">Email must be valid</p>
                        </div> --}}
                    </div>

                    <!-- Contest Category -->
                    <div class="flex flex-col gap-1">
                        <label for="addCategory"  class="text-purple tablet:text-xl text-base font-semibold">Contest Category</label>
                        <select id="edit-category" name="addCategory" value="{{$people->addCategory}}" type="text" class="border-b-2 text-black tablet:text-xl text-base outline-none"/>
                            <option value="" disabled selected>Choose...</option>
                            <option value="art">Art</option>
                            <option value="dance">Dance</option>
                            <option value="song">Song</option>
                        </select>

                        {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="edit-category-error">Contest category is required</p>
                        </div> --}}
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="addImage"  class="text-purple tablet:text-xl text-base font-semibold">Media</label>
                    <label for="addImage">
                        <input value="{{$people->addImage}}"  type="file" accept="image/*, audio/*, video/*" id="add-file" name="addImage" class="w-full tablet:text-lg text-sm text-black
                        file:mr-5 file:py-2 tablet:file:px-6 file:px-2
                        file:rounded-lg file:border-none
                        file:tablet:text-base file:text-xs file:font-semibold
                        file:bg-purple-600 file:text-white
                        hover:file:cursor-pointer hover:file:opacity-60"/>

                        {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="add-file-error">File is required</p>
                        </div> --}}
                    </label>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </section>



    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

</body>
</html>
