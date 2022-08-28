@extends('layout.layout')
@section('content')

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
</div>


@endsection
