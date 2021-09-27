@extends("layouts.user")


@section("page_title")

Students

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Student Selection</h1>

<div class="flex justify-center items-center w-full mt-32">
    <div class="">
        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td text-3xl font-extrabold text-center text-blue-600 mb-6>Course ID</td>
                    <td class="p-3 text-left">Course Name</td>
                    <td class="p-3 text-left">Applied Date</td>
                    <td class="p-3 text-left">Status</td>
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($selections as $info)
                <tr>
                    <td class="p-3">{{$info->id}}</td>
                    <td class="p-3 uppercase">{{$info->Courses->course_name}}</td>
                    <td class="p-3">{{$info->enroll_dt}}</td>
                    @if($info->is_approved==1)
                        <td class="p-3">Approved</td>
                    @elseif($info->is_approved==2)
                        <td class="p-3">Rejected</td>
                    @else
                        <td class="p-3">Pending</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection