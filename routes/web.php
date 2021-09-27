<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminViewsController;
use App\Http\Controllers\AdminSUpdateController;
use App\Http\Controllers\AdminDeleteController;

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get("/login",[LoginController::class,"index"])->name("Login");
Route::post("/log",[LoginController::class,"login"])->name("On-Login");


Route::get("/register",[RegisterController::class,"index"])->name("Register");
Route::post("/register/store",[RegisterController::class,"store"]);


Route::post("/logout",[LogoutController::class,"logout"])->name("Logout");

Route::get("/dashboard",[DashboardController::class,"index"])->name("Dashboard");

Route::get("/user/profile",[ProfileController::class,"index"])->name("Profile");
Route::post("/user/profile/store",[ProfileController::class,"updateProfile"])->name("On-Update");

Route::get("/admin/profile",[AdminController::class,"profile"])->name("AdminProfile");
Route::post("/admin/profile/store",[AdminController::class,"updateProfile"])->name("On-Update");



// Admin

Route::get("/admin/index",[AdminController::class,"index"])->name("Admin");

Route::get("/admin/Students",[AdminViewsController::class,"studentindex"])->name("Students");
Route::get("/student/Update/{id}",[AdminSUpdateController::class,"show"])->name("UpdateStudent");
Route::post("/student/Update",[AdminSUpdateController::class,"store"])->name("On-Student-Update");

//Course Type

Route::get("/admin/AddCourseType",[AdminViewsController::class,"addcoursetypeindex"])->name("AddCoursesType");
Route::post("/admin/AddCourseType",[AdminViewsController::class,"addcoursetypeindexstore"])->name("On-Courses-Type");

Route::get("/CourseType/Update/{id}",[AdminSUpdateController::class,"showtype"])->name("UpdateCourseType");
Route::post("/admin/UpdateCourseType",[AdminSUpdateController::class,"storetype"])->name("On-Type-Update");

Route::get("/admin/CourseType",[AdminSUpdateController::class,"viewtype"])->name("CourseType");

//Courses

Route::get("/admin/AddCourses",[AdminViewsController::class,"addcoursesindex"])->name("AddCourses");
Route::post("/admin/AddCourses",[AdminViewsController::class,"addcoursesindexstore"])->name("On-Courses");

Route::get("/Course/Update/{id?}",[AdminViewsController::class,"updatecoursesindex"])->name("UpdateCourses");
Route::post("/admin/Courses",[AdminViewsController::class,"updatecoursesindexstore"])->name("On-Update-Courses");

Route::get("/admin/Courses",[AdminViewsController::class,"courseindex"])->name("Courses");



//Student Selection

Route::get("/admin/StudentSelection",[AdminSUpdateController::class,"selection"])->name("selection");
Route::get("/Selection/Approve/{id}",[AdminSUpdateController::class,"approved"])->name("ApproveSelection");
Route::get("/Selection/Reject/{id}",[AdminSUpdateController::class,"rejected"])->name("DenySelection");




//Delete
Route::get("/Student/Delete/{id?}",[AdminDeleteController::class,"studentdelete"])->name("DeleteStudent");

Route::get("/TypeOfCourse/Delete/{id?}",[AdminDeleteController::class,"typedelete"])->name("DeleteTypesOfCourses");

Route::get("/Course/Delete/{id?}",[AdminDeleteController::class,"coursedelete"])->name("DeleteCourses");





//Student part now

Route::get('/Course/Selection',[StudentController::Class,'show'])->name('ShowCourses');
Route::post('/Course/Selection',[StudentController::Class,'store'])->name('On-Select-Courses');

Route::get('/Course/View/Selection',[StudentController::Class,'viewselection'])->name('ShowSelections');





