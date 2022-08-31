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
                <li><a href="home">Home</a></li>
                <li><a href="vote-art">Art</a></li>
                <li><a href="vote-song">Song</a></li>
                <li><a href="vote-dance">Dance</a></li>
                @if (Auth::user()->role == 'admin')
                <li><a href="{{ route('getPeople')}}">Participant</a></li>
                @endif
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
