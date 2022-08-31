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

    <section id="add-popup" class="hidden fixed w-screen h-screen z-[100] flex justify-center items-center">
        <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
        <div class="bg-white rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="asset/close.png" alt="close"  id="add-close" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" />
            <div>
                <h1 class="text-purple tablet:text-4xl text-2xl font-semibold">Add Participant</h1>
            </div>
            <form id="add-form" class="flex flex-col gap-8 w-full" action="{{route('createPeople')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-6">
                    <!-- Full Name -->
                    <div class="flex flex-col gap-1">
                        <label for="addName"  class="text-purple tablet:text-xl text-base font-semibold">Full Name</label>
                        <input id="add-name" name="addName" type="text" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                        <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="add-name-error">Name is required</p>
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="flex flex-col gap-1">
                        <label for="addDob"  class="text-purple tablet:text-xl text-base font-semibold">Date of Birth</label>
                        <input id="add-dob" name="addDob" type="date" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                        <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="add-dob-error">Date of birth is required</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label for="addEmail"  class="text-purple tablet:text-xl text-base font-semibold">Email</label>
                        <input id="add-email" name="addEmail" type="email" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your email here..."/>

                        <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="add-email-error">Email must be valid</p>
                        </div>
                    </div>

                    <!-- Contest Category -->
                    <div class="flex flex-col gap-1">
                        <label for="addCategory"  class="text-purple tablet:text-xl text-base font-semibold">Contest Category</label>
                        <select id="add-category" name="addCategory" type="text" class="border-b-2 text-black tablet:text-xl text-base outline-none"/>
                            <option value="" disabled selected>Choose Category...</option>
                            <option value="art">Art</option>
                            <option value="dance">Dance</option>
                            <option value="song">Song</option>
                        </select>

                        <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                            <img src="asset/error.png" alt="error" class="h-5" />
                            <p id="add-category-error">Contest category is required</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="addImage"  class="text-purple tablet:text-xl text-base font-semibold">Media</label>
                        <label for="addImage">
                            <input type="file" accept="image/*, audio/*, video/*" id="add-file" name="addImage" class="w-full tablet:text-lg text-sm text-black
                            file:mr-5 file:py-2 tablet:file:px-6 file:px-2
                            file:rounded-lg file:border-none
                            file:tablet:text-base file:text-xs file:font-semibold
                            file:bg-purple-600 file:text-white
                            hover:file:cursor-pointer hover:file:opacity-60"/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="asset/error.png" alt="error" class="h-5" />
                                <p id="add-file-error">File is required</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Add New</button>
                </div>
            </form>
        </div>
    </section>


    <!-- Content Wrapper -->
    <section class="flex justify-center items-center content-center tablet:mx-16 mx-8 h-full">
        <div class="flex flex-col tablet:gap-8 gap-4 justify-center items-center bg-white laptop:h-[75vh] h-[85vh] laptop:w-fit w-full rounded-3xl tablet:px-12 px-6 py-8 tablet:my-16 my-8">
            <div>
                <h1 class="text-purple tablet:text-4xl text-2xl font-semibold">Participant</h1>
            </div>
                <!-- Search -->
                <form action="{{route('search1')}}" method="GET" class="input-group row">
                    <div class="bg-slate-200 w-full tablet:py-2 py-1 tablet:px-8 px-4 rounded-full flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tablet:w-6 tablet:h-6 h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <input type="text" name="cari" placeholder="Search..." class="bg-slate-200 text-black outline-none tablet:text-lg text-md">
                    </div>
                </form>

            <table class="flex flex-col border-collapse font-poppins laptop:w-full tablet:w-[44rem] w-full h-full mx-6 tablet:overflow-x-hidden overflow-x-scroll overflow-y-scroll">
                <thead class="w-fit whitespace-nowrap">
                    <tr class="text-purple tablet:text-sm text-xs font-semibold flex items-center gap-4 py-2 tablet:px-8 px-0">
                        <th scope="col" class="tablet:w-8 w-6">No</th>
                        <th scope="col" class="tablet:w-24 w-12">Action</th>
                        <th scope="col" class="tablet:w-24 w-20">Nama Lengkap</th>
                        <th scope="col" class="tablet:w-64 w-32">Email</th>
                        <th scope="col" class="tablet:w-24 w-20">Tanggal Lahir</th>
                        <th scope="col" class="tablet:w-32 w-16">Category</th>
                    </tr>
                </thead>
                <tbody class="w-fit">
                    @if(isset($peoples))
                    @foreach ($peoples as $people)
                    <tr class="flex items-center text-center gap-4 py-2 tablet:px-8 px-0">
                        <td class="tablet:text-sm text-xs font-medium tablet:w-8 w-6">{{ $people->id }}</td>
                        <td class="flex justify-center content-center laptop:gap-3 tablet:gap-2 gap-1 tablet:w-24 w-12">
                            <a href="{{route('getPeopleById', ['id'=>$people->id])}}">
                                <button id="edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="tablet:w-7 w-5 bg-purple stroke-white tablet:p-1 p-[2px] rounded-md hover:bg-white border-[#8f46d9] border-2 hover:stroke-[#8f46d9] transition duration-200 ease-in-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                            </a>
                            <form action="{{route('delete', ['id' => $people->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button id="delete-btn" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="tablet:w-7 w-5 bg-blue stroke-white tablet:p-1 p-[2px] rounded-md hover:bg-white border-[#5753ff] border-2 hover:stroke-[#5753ff] transition duration-200 ease-in-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>

                        </td>
                        <td class="tablet:text-sm text-xs font-medium tablet:w-24 w-20">{{ $people->addName }}</td>
                        <td class="tablet:text-sm text-xs font-medium tablet:w-64 w-32 laptop:overflow-hidden overflow-x-scroll">{{ $people->addEmail }}</td>
                        <td class="tablet:text-sm text-xs font-medium tablet:w-24 w-20">{{ $people->addDob }}</td>
                        <td class="tablet:text-sm text-xs font-medium tablet:w-32 w-16">{{ $people->addCategory }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

            <div class="flex justify-center">
                <button id="add-btn" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Add Participant</button>
            </div>
        </div>

<<<<<<< HEAD
        <table class="flex flex-col border-collapse font-poppins laptop:w-full tablet:w-[44rem] w-full h-full mx-6 tablet:overflow-x-hidden overflow-x-scroll overflow-y-scroll">
            <thead class="w-fit whitespace-nowrap">
                <tr class="text-purple tablet:text-sm text-xs font-semibold flex items-center gap-4 py-2 tablet:px-8 px-0">
                    <th scope="col" class="tablet:w-8 w-6">No</th>
                    <th scope="col" class="tablet:w-24 w-12">Action</th>
                    <th scope="col" class="tablet:w-24 w-20">Nama Lengkap</th>
                    <th scope="col" class="tablet:w-64 w-32">Email</th>
                    <th scope="col" class="tablet:w-24 w-20">Tanggal Lahir</th>
                    <th scope="col" class="tablet:w-32 w-16">Category</th>
                </tr>
            </thead>
            <tbody class="w-fit">
                @if(isset($peoples))
                @foreach ($peoples as $people)
                <tr class="flex items-center text-center gap-4 py-2 tablet:px-8 px-0">
                    <td class="tablet:text-sm text-xs font-medium tablet:w-8 w-6">{{ $people->id }}</td>
                    <td class="flex justify-center content-center laptop:gap-3 tablet:gap-2 gap-1 tablet:w-24 w-12">
                        <a href="{{route('getPeopleById', ['id'=>$people->id])}}">
                            <button id="edit-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="tablet:w-7 w-5 bg-purple stroke-white tablet:p-1 p-[2px] rounded-md hover:bg-white border-[#8f46d9] border-2 hover:stroke-[#8f46d9] transition duration-200 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                        </a>
                        <form action="{{route('delete', ['id' => $people->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button id="delete-btn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="tablet:w-7 w-5 bg-blue stroke-white tablet:p-1 p-[2px] rounded-md hover:bg-white border-[#5753ff] border-2 hover:stroke-[#5753ff] transition duration-200 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>

                    </td>
                    <td class="tablet:text-sm text-xs font-medium tablet:w-24 w-20">{{ $people->addName }}</td>
                    <td class="tablet:text-sm text-xs font-medium tablet:w-64 w-32 laptop:overflow-hidden overflow-x-scroll">{{ $people->addEmail }}</td>
                    <td class="tablet:text-sm text-xs font-medium tablet:w-24 w-20">{{ $people->addDob }}</td>
                    <td class="tablet:text-sm text-xs font-medium tablet:w-32 w-16">{{ $people->addCategory }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <div class="flex justify-center">
            <button id="add-btn" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Add Participant</button>
=======
    </section>

    <!-- Footer -->
    <div class="flex flex-col items-center justify-center gap-4 bg-[#1E1E1E] w-full text-white text-center tablet:py-10 py-6 px-12">
        <img src="asset/logo-white.png" alt="Digitize" class="tablet:h-12 h-8">
        <div class="tablet:text-lg text-sm flex gap-4">
            <a href="home">Home</a>
            <a href="vote-art">Art</a>
            <a href="vote-song">Song</a>
            <a href="vote-dance">Dance</a>
>>>>>>> 4f575d07420d646f33ba6fb394c521611e8ec9cc
        </div>
        <p class="tablet:text-sm text-xs opacity-50">Copyright © 2022 Digitize.com. All Rights Reserved</p>
    </div>

    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

</body>
</html>
