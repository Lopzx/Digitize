<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Digitize</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    </head>
    <body class="body-gradient">
        <!-- Navbar -->
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
                    <li class="text-white bg-purple py-1 px-4 rounded-lg ml-4">
                        <a href="#"> Sign In</a>
                    </li>
                </ul>
            </div>

            <!-- Sidebar (Tablet/Mobile) -->
            <div class="laptop:hidden flex justify-between items-center">
                <div>
                    <a href="#">
                        <img src="{{asset('asset/logo.png')}}" alt="Digitize" class="tablet:h-10 h-6"/>
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
                            <img src="{{asset('asset/close.png')}}" alt="close" id="close-sidebar" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" />
                            <ul class="w-full h-full flex flex-col justify-between pt-16">
                                <div class="w-full flex flex-col gap-8 tablet:text-xl text-sm text-right">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Song</a></li>
                                    <li><a href="#">Dance</a></li>
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

        <!-- Content Wrapper -->
        <div class="flex justify-center items-center content-center laptop:h-fit h-screen laptop:my-16 tablet:-mt-16 -mt-10">
            <div class="flex flex-col gap-8 justify-center items-center bg-white h-fit rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem]">
                <div>
                    <h1 class="text-purple tablet:text-4xl text-2xl font-semibold">Register</h1>
                </div>
                <form method="POST" id="register-form" action="{{route('register')}}" class="flex flex-col gap-8 w-full">
                    @csrf
                    <div class="flex flex-col gap-6">
                        <!-- Full Name -->
                        <div class="flex flex-col gap-1">
                            <label for="name"  class="text-purple tablet:text-xl text-base font-semibold">Full Name</label>
                            <input id="name" name="name" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="{{asset('asset/error.png')}}" alt="error" class="h-5" />
                                <p id="name-error">Name is required</p>
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="flex flex-col gap-1">
                            <label for="dob"  class="text-purple tablet:text-xl text-base font-semibold">Date of Birth</label>
                            <input id="dob" name="dob" type="date" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="{{asset('asset/error.png')}}" alt="error" class="h-5" />
                                <p id="dob-error">Date of birth is required</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col gap-1">
                            <label for="email"  class="text-purple tablet:text-xl text-base font-semibold">Email</label>
                            <input id="email" name="email" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your email here..."/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="{{asset('asset/error.png')}}" alt="error" class="h-5" />
                                <p id="email-error">Email must be valid</p>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                            <label for="password" class="text-purple tablet:text-xl text-base font-semibold">Password</label>
                            <input name="password" id="password" type="password" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your password here..."/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="{{asset('asset/error.png')}}" alt="error" class="h-5" />
                                <p id="password-error">Password must be valid (Contains uppercase, lowercase, number, special symbol, and at least 8 digits)</p>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="flex flex-col gap-1">
                            <label for="confirm-password" class="text-purple tablet:text-base text-base font-semibold">Confirm Password</label>
                            <input name="password_confirmation" id="confirm-password" type="password" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your password here..."/>

                            <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                                <img src="{{asset('asset/error.png')}}" alt="error" class="h-5" />
                                <p id="confirm-password-error">Confirm password must be equal to password</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex tablet:flex-row flex-col text-center gap-2 tablet:text-sm text-xs justify-center">
                        <p>Have an account already?</p>
                        <a href="login" class="text-purple">Login Now</a>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="{{asset('js/navbar.js')}}"></script>
        <script src="{{asset('js/register.js')}}"></script>
    </body>
</html>
