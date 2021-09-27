@extends('layouts.admin')

@section('page_title')

Add Course Type

@endsection


@section('content')

<h1 class="text-6xl text-blue-400 text-center">Courses Type</h1>

<div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Add Course Type</h1>
            <h3 class="text-md text-center mb-2">Use the form below to add a course type</h3>


        @if (session()->has('add_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('add_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Courses-Type')}}">
                @csrf
                <div class="mb-4 ">

                    <label class="sr-only" for="coursename"> Course Type </label>
                    <input type="text" placeholder="Course Type" value="{{old('coursetype')}}" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursetype') border-red-700 @enderror" name="coursetype">
                    @error("coursetype")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4 ">

                    <label class="sr-only" for="desc"> Course Type Description </label>
                    <input type="text" placeholder="Description" value="{{old('desc')}}" class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('desc') border-red-700 @enderror" name="desc">
                    @error("desc")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white p-4 w-full rounded-md shadow-2xl">Add Course Type</button>
                </div>

            </form>

        </div>

    </div>



@endsection