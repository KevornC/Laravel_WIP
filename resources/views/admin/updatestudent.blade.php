@extends("layouts.admin")

@section("page_title")
    Laravel Wip - Update Student
@endsection

@section("content")


<h1 class="text-6xl text-blue-400 text-center">Update Student</h1>
    <div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Update Student Information</h1>
            <h3 class="text-md text-center mb-2">Use the form below to edit student information</h3>


        @if (session()->has('update_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('update_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Student-Update')}}">
                @csrf
                <div class="mb-4 ">

                    <label class="sr-only" for="name"> Name </label>
                    <input type="text" value="{{$student->name}}" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('name') border-red-700 @enderror" name="name">
                    <input type="hidden" value="{{$student->id}}" name="id">
                    @error("name")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="name"> Email </label>
                    <input type="email" value="{{$student->email}}" class="bg-white-300 p-4 w-full rounded-md border-2 border-gray-400 @error('email') border-red-700 @enderror" name="email">
                    @error("email")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="tele"> Telephone Number </label>
                    <input type="tel" value="{{$student->tele}}" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('tele') border-red-700 @enderror" name="tele">
                    @error("tele")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>




                <div>
                    <button type="submit" class="bg-blue-500 text-white p-4 w-full rounded-md shadow-2xl">Update</button>
                </div>

            </form>

        </div>

    </div>
@endsection
