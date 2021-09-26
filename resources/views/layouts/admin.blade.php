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
    <h1 class="text-3xl font-extrabold text-center text-blue-600 mb-2">Admin</h1>
        <ul>
            <a href="{{route('AdminProfile')}}" class="p-2"><li class=" px-2 bg-yellow-400 text-white cursor-pointer mb-6 hover:bg-green-600 duration-300 mt-3" >{{Auth::user()->name}}</li></a>
            <a href="{{route('Admin')}}" class="p-2"><li class=" px-2 bg-blue-600 text-white cursor-pointer" >Dashboard</li></a>
            <a href="{{route('Students')}}" class="p-2"><li class=" px-2 hover:bg-blue-600 duration-300   hover:text-white cursor-pointer">Students</li></a>

            <a href="{{route('AddCoursesType')}}" class="p-2"><li class="py-1 px-2 hover:bg-blue-600 duration-300 hover:text-white cursor-pointer">Add Course Type</li></a>
            <a href="{{route('CourseType')}}" class="p-2"><li class=" px-2 hover:bg-blue-600 duration-300 hover:text-white cursor-pointer">Course Type</li> </a> 
            
            <a href="{{route('AddCourses')}}" class="p-2"><li class=" px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer">Add Course</li></a>
            <a href="{{route('Courses')}}" class="p-2"><li class=" px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer">View Courses</li></a>

            <a href="{{route('selection')}}" class="p-2"><li class=" px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer">Student Selections</li></a>
                      
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
