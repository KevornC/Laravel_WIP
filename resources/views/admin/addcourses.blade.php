@extends('layouts.admin')

@section('page_title')

Add Courses

@endsection


@section('content')

<h1 class="text-6xl text-blue-400 text-center">Courses</h1>

<div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Add Course</h1>
            <h3 class="text-md text-center mb-2">Use the form below to add a course</h3>


        @if (session()->has('add_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('add_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Courses')}}">
                @csrf
                <div class="mb-4 ">

                    <label class="sr-only" for="coursename"> Course Name </label>
                    <input type="text" placeholder="Course Name" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursename') border-red-700 @enderror" name="coursename">
                    @error("coursename")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="coursetype"> Course Type </label>
                    <select name="coursetype" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursetype') border-red-700 @enderror">
                        <option value="">Select Course Type</option>
                        @foreach($coursetype as $info)
                            <option value="{{$info->id}}">{{$info->course_type}}</option>
                        @endforeach
                    </select>
                    @error("coursetype")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white p-4 w-full rounded-md shadow-2xl">Add Course</button>
                </div>

            </form>

        </div>

    </div>



@endsection