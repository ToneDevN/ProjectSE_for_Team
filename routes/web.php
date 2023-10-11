<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsContorller;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TasContorller;
use App\Http\Controllers\TeachersContorller;
use App\Http\Middleware\UserAccess;
use App\Models\subjects;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Auth/Login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
// Student
Route::middleware(['auth', 'UserAccess:student'])->group(function () {
    Route::get('student/home', [StudentsContorller::class, 'index'])->name('students.home');
    Route::get('student/subject/{id}', [StudentsContorller::class, 'subject'])->name('students.subject');
    Route::get('student/score/{id}', [StudentsContorller::class, 'score'])->name('students.score');
    Route::get('student/attendance/{id}', [StudentsContorller::class, 'attendance'])->name('students.attendance');
});
//TA
Route::middleware(['auth', 'UserAccess:ta'])->group(function () {
    Route::get('ta/home', [TasContorller::class, 'index'])->name('ta.home');
});
//StudentAndTa
Route::middleware(['auth', 'UserAccess:student', 'UserAccess:ta'])->group(function() {

});

Route::middleware(['auth', 'UserAccess:teacher'])->group(function () {   
    Route::get('teacher/home', [TeachersContorller::class, 'index'])->name('teacher.home');
    Route::get('teacher/subject/{id}', [SubjectsController::class, 'subjectTeacher'])->name('teacher.subject');
    Route::get('teacher/scorerollcall/{id}', [SubjectsController::class, 'rollcall'])->name('teacher.rollcall');
    Route::get('teacher/scorelab/{id}', [SubjectsController::class, 'lab'])->name('teacher.lab');
    Route::get('teacher/studentmanage/{id}', [SubjectsController::class, 'manage'])->name('teacher.manage');
    Route::get('teacher/export/{id}', [SubjectsController::class, 'export'])->name('teacher.export');
    Route::post('teacher/addsubject', [SubjectsController::class, 'store'])->name('teacher.addsubject');
    Route::post('teacher/addstudetn', [TeachersContorller::class, 'storeStudent'])->name('teacher.addStudent');
    Route::post('teacher/addattendancsession', [SubjectsController::class, 'rollcallSessionStore'])->name('teacher.addAtSes');
    Route::post('teacher/importStudent', [TeachersContorller::class, 'importStudent'])->name('teacher.importStudent');


});

require __DIR__.'/auth.php';
