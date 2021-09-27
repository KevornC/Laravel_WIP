@extends("layouts.admin")

@section("page_title")
    Laravel Wip - Update Courses
@endsection

@section("content")


<h1 class="text-6xl text-blue-400 text-center">Update Course </h1>
    <div class="flex justify-center">


        <div class="w-4/12 bg-gray-200 mt-20 rounded-lg shadow-2xl">

            <h1 class="text-4xl font-bold text-center">Update Course</h1>
            <h3 class="text-md text-center mb-2">Use the form below to edit course</h3>


        @if (session()->has('update_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('update_status')}}
                </div>
            @endif

            <form method="post" action="{{route('On-Update-Courses')}}">
                @csrf

                
                <div class="mb-4">
                    <label class="sr-only" for="coursename"> Course  Name </label>
                    <input type="text" value="{{$course->course_name}}" class="bg-white-300 p-4 w-full rounded-md border-2 border-gray-400 @error('coursename') border-red-700 @enderror" name="coursename">
                    @error("coursename")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="coursestatus"> Course Status</label>
                    <select name="coursestatus"  class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursestatus') border-red-700 @enderror">
                        <option value="{{$course->Active}}">Old/New Value= {{$course->Active}}</option>
                        <option value="Active">Active</option>
                        <option value="Not Active">Not Active</option>
                    </select>
                    <input type="hidden" value="{{$course->id}}" name="id">
                    <!-- <input type="hidden" value="{{$course->course_type_id}}" name="coursetype"> -->
                    @error("coursestatus")
                    <div class="text-red-700 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="sr-only" for="coursetype"> Course Type</label>
                    <select name="coursetype"  class="bg-white p-4 w-full rounded-md border-2 border-gray-400 @error('coursetype') border-red-700 @enderror">
                        <option value="{{$course->course_type_id}}">Old/New Value = {{$course->TypesOfCourses->course_type}}</option>
                        @foreach($types as $info)
                            <option value="{{$info->id}}">{{$info->course_type}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{$course->id}}" name="id">
                    <!-- <input type="hidden" value="{{$course->course_type_id}}" name="coursetype"> -->
                    @error("coursetype")
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
