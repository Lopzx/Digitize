@extends('layout.layout')
@section('content')

<!-- Add Participant (belum bisa pop up) -->
<section id="add-popup" class="fixed w-screen h-screen z-[100] flex justify-center items-center">
    <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
    <div class="bg-white rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
        <img src="asset/close.png" alt="close" id="add-close" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" />
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
                    @error('addName')
                    <div class="">
                        {{ $message }}
                    </div>
                    @enderror

                    {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                        <img src="asset/error.png" alt="error" class="h-5" />
                        <p id="add-name-error">Name is required</p>
                    </div> --}}
                </div>

                <!-- Date of Birth -->
                <div class="flex flex-col gap-1">
                    <label for="addDob"  class="text-purple tablet:text-xl text-base font-semibold">Date of Birth</label>
                    <input id="add-dob" name="addDob" type="date" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your full name here..."/>
                    @error('addDob')
                    <div class="">
                        {{ $message }}
                    </div>
                    @enderror

                    {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                        <img src="asset/error.png" alt="error" class="h-5" />
                        <p id="add-dob-error">Date of birth is required</p>
                    </div> --}}
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-1">
                    <label for="addEmail"  class="text-purple tablet:text-xl text-base font-semibold">Email</label>
                    <input id="add-email" name="addEmail" type="email" class="border-b-2 text-black tablet:text-xl text-base outline-none" placeholder="Enter your email here..."/>

                    @error('addEmail')
                    <div class="">
                        {{ $message }}
                    </div>
                    @enderror

                    {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                        <img src="asset/error.png" alt="error" class="h-5" />
                        <p id="add-email-error">Email must be valid</p>
                    </div> --}}
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

                    @error('addCategory')
                    <div class="">
                        {{ $message }}
                    </div>
                    @enderror

                    {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                        <img src="asset/error.png" alt="error" class="h-5" />
                        <p id="add-category-error">Contest category is required</p>
                    </div> --}}
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Add</button>
            </div>
        </form>
    </div>
</section>
{{--
</div>
    <form action="{{route('createPeople')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="name" class="">Full Name</label>
            <input name="name" type="text" class="" id="" placeholder="Input Full Name">
            @error('name')
            <div class="">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="date" class="">Date of Birth</label>
            <input name="date" type="date" class="" id="">
            @error('date')
            <div class="">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="email" class="">Email</label>
            <input name="email" type="email" class="" id="" placeholder="Email@example.com">
            @error('name')
            <div class="">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="category" class="">Contest Category</label>
            <input name="category" type="text" class="" id="" placeholder="Choose Category...">
            @error('category')
            <div class="">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="">Add New</button>
    </form>
</div> --}}


@endsection
