@extends('layouts.user')

@section('page_title')

Course Selection

@endsection

@section('content')

<h1 class="text-6xl text-blue-400 text-center">Course Selections</h1>

<div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Select Course</h1>
            <h3 class="text-md text-center mb-2">Use the form below to select course</h3>


        @if (session()->has('add_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('add_status')}}
                </div>
            @endif
            @if (session()->has('max_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('max_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Select-Courses')}}">
                @csrf
                <div class="mb-4">
                    <label class="sr-only" for="coursename"> Course Name </label>
                    <select name="coursename" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursename') border-red-700 @enderror">
                        <option value="">Select Course Name</option>
                        @foreach($courses as $info)
                        <!-- if($info->cours) -->
                            <option value="{{$info->id}}">{{$info->course_name}}</option>
                        @endforeach
                    </select>
                    @error("coursename")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white p-4 w-full rounded-md shadow-2xl">Select Course</button>
                </div>

            </form>

        </div>

    </div>



@endsection