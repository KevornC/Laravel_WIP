@extends("layouts.admin")

@section("page_title")
    Laravel Wip-Admin Page
@endsection

@section('content')

    <div class="justify-center p-8 border-green-400 border-2 h-full w-full">
        <h1 class="text-blue-600 text-2xl mb-6">DASHBOARD</h1>
    <div class="flex justify-between card_container mb-6">
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total students</h2>
            <h2>{{$user}}</h2>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Acceptance</h2>
            <h2>{{$acceptance}}</h2>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Courses</h2>
            <h2>{{$courses}}</h2>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Categories</h2>
            <h2>{{$types}}</h2>
        </div>

    </div>
        <div class="big_card bg-white h-7/12">
            <h1>Most Recent Course Selection</h1>
            <ol>
            @foreach($recents as $info)
                <li>{{$info->Courses->course_name}}</li>
            @endforeach
            </ol>
        </div>
    </div>

@endsection
