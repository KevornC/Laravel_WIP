@extends("layouts.admin")


@section("page_title")

Students

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Students</h1>

<div class="flex justify-center items-center w-full mt-32">
    <div class="">
        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td text-3xl font-extrabold text-center text-blue-600 mb-6>Student ID</td>
                    <td class="p-3 text-left">Student Name</td>
                    <td class="p-3 text-left">Student Telephone</td>
                    <td class="p-3 text-left">Date Registered</td>
                    <td class="p-3 text-left">Status</td>
                    <td class="p-3 text-left">Action</td>
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($students as $info)
                <tr>
                    <td class="p-3">{{$info->id}}</td>
                    <td class="p-3 uppercase">{{$info->name}}</td>
                    <td class="p-3">{{$info->tele}}</td>
                    <td class="p-3">{{$info->created_at}}</td>
                    <td class="p-3">{{$info->Active}}</td>
                    <td class="p-3"><a class="hover:bg-blue-300" href="{{url('/student/Update/'.$info->id)}}">Update</a>
                    <a class="hover:bg-red-300" href="{{url('/Student/Delete/'.$info->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection