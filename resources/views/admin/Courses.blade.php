@extends("layouts.admin")


@section("page_title")

Courses

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Courses</h1>

<div class="flex justify-center items-center w-full mt-32">
    <div class="">
        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td class="p-3 text-left">Course ID</td>
                    <td class="p-3 text-left">Course Name</td>
                    <td class="p-3 text-left">Course type</td>
                    <td class="p-3 text-left">Date Added</td>                    
                    <td class="p-3 text-left">Course Status</td>                    
                    <td class="p-3 text-left">Actions</td>                    
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($courses as $info)
                <tr>
                    <td class="p-3">{{$info->id}}</td>
                    <td class="p-3 uppercase">{{$info->course_name}}</td>
                    <td class="p-3 uppercase">{{$info->TypesOfCourses->course_type}}</td>
                    <td class="p-3">{{$info->created_at}}</td>
                    <td class="p-3">{{$info->Active}}</td>
                    <td class="p-3"><a class="hover:bg-blue-300" href="{{url('/Course/Update/'.$info->id)}}">Update</a>
                    <a class="hover:bg-red-300" href="{{url('/Course/Delete/'.$info->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection