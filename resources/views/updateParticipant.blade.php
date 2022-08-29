@extends('layout.layout')
@section('content')

<section id="edit-popup" class=" fixed w-screen h-screen z-[100] flex justify-center items-center">
    <div id="sidebar-blank" class="fixed flex-col bg-black z-1 opacity-20 blur-xl h-screen w-screen top-0 left-0"></div>
    <div class="bg-white rounded-3xl tablet:px-12 px-6 py-8 tablet:w-[32rem] w-[20rem] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
        <img src="asset/close.png" alt="close" id="edit-close" class="tablet:h-8 h-5 absolute tablet:top-8 tablet:right-8 top-4 right-4" />
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

                    {{-- <div class="hidden text-red tablet:text-sm text-xs mt-2 flex items-center gap-2">
                        <img src="asset/error.png" alt="error" class="h-5" />
                        <p id="edit-name-error">Name is required</p>
                    </div> --}}
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
                        <option value="{{$people->addCategory}}" disabled selected>{{$people->addCategory}}</option>
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
            <div class="flex justify-center">
                <button type="submit" class="bg-gradient text-center tablet:text-xl text-base text-white font-semibold py-1 px-16 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</section>

@endsection
