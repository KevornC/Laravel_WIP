@extends("layouts.admin")


@section("page_title")

Update Course Type

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Students</h1>

<div class="flex justify-center items-center w-full mt-32">
    <div class="">
        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td class="p-3 text-left">Course Type</td>
                    <td class="p-3 text-left">Course Description</td>
                    <td class="p-3 text-left">Action</td>
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($coursetypes as $info)
                <tr>
                    <td class="p-3 uppercase">{{$info->course_type}}</td>
                    <td class="p-3">{{$info->desc}}</td>
                    <td class="p-3"><a class="hover:bg-blue-300" href="{{url('/CourseType/Update/'.$info->id)}}">Update</a>
                    <a class="hover:bg-red-300" href="{{url('/TypeOfCourse/Delete/'.$info->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection