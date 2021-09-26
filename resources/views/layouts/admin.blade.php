<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{mix("css/app.css")}}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("page_title")</title>
</head>
<body>

<div class="container w-screen h-screen flex">

    <div class=" bg-white p-4 h-full w-2/12">
    <h1 class="text-3xl font-extrabold text-center text-blue-600 mb-6">Admin</h1>
        <ul>
            <li class="py-2 px-2 bg-yellow-400 text-white cursor-pointer mb-6 hover:bg-green-600 duration-300 mt-3" ><a href="{{route('AdminProfile')}}" class="p-2">{{Auth::user()->name}}</a></li>
            <li class="py-3 px-2 bg-blue-600 text-white cursor-pointer" ><a href="{{route('Admin')}}" class="p-2">Dashboard</a></li>
            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('Students')}}" class="p-2">Students</a></li>

            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('AddCoursesType')}}" class="p-2">Add Course Type</a></li>
            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('CourseType')}}" class="p-2">Course Type</a></li>  
            
            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('AddCourses')}}" class="p-2">Add Course</a></li>
            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('Courses')}}" class="p-2">View Courses</a></li>

            <li class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"><a href="{{route('selection')}}" class="p-2">Student Selections</a></li>
                      
            <li class="mt-28">
                <form action="{{route('Logout')}}" method="post">
                    @csrf
                <button class="p-2 bg-blue-700 px-4 text-white rounded hover:bg-red-700 duration-300">Logout</button>

                </form>
            </li>
        </ul>
    </div>
    <div class="w-10/12 h-full flex justify-center items-center bg-gray-300">

        <div class="h-full w-full">
            @yield("content")
        </div>

    </div>

</div>



</body>
</html>
