@extends("layouts.admin")

@section("page_title")
    Laravel Wip - Update Student
@endsection

@section("content")


<h1 class="text-6xl text-blue-400 text-center">Update Course Type</h1>
    <div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Update Course Type</h1>
            <h3 class="text-md text-center mb-2">Use the form below to edit course type</h3>


        @if (session()->has('update_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('update_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Type-Update')}}">
                @csrf
                <div class="mb-4 ">

                    <label class="sr-only" for="coursetype"> Course Type </label>
                    <input type="text" value="{{$ctype->course_type}}" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursetype') border-red-700 @enderror" name="coursetype">
                    <input type="hidden" value="{{$ctype->id}}" name="id">
                    @error("coursetype")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="desc"> Description </label>
                    <input type="text" value="{{$ctype->desc}}" class="bg-white-300 p-4 w-full rounded-md border-2 border-gray-400 @error('desc') border-red-700 @enderror" name="desc">
                    @error("desc")
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
