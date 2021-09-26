@extends("layouts.admin")


@section("page_title")

Selections

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Student Selections</h1>
<div class="flex justify-center items-center w-full mt-32">
    <div class="">
        
    @if (session()->has('update_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('update_status')}}
                </div>
            @endif

        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td text-3xl font-extrabold text-center text-blue-600 mb-6>Selection ID</td>
                    <td class="p-3 text-left">Student Name</td>
                    <td class="p-3 text-left">Student Course Name</td>
                    <td class="p-3 text-left">Action</td>
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($selections as $info)
                <tr>
                    <td class="p-3">{{$info->id}}</td>
                    <td class="p-3 uppercase">{{$info->Users->name}}</td>
                    <td class="p-3">{{$info->Courses->course_name}}</td>
                    @if($info->is_approved == 1)
                        <td class="p-3">Approved</a></td>
                    @else
                        <td class="p-3"><a class="hover:bg-blue-300" href="{{url('/selection/Update/'.$info->id)}}">Approved</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection