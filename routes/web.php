<?php

use App\Http\Livewire\Admin\CourseCombination;
use App\Http\Livewire\Admin\CreateFacDeptProgCourse;
use App\Http\Livewire\Admin\CreateUser;
use App\Http\Livewire\Admin\EditUser;
use App\Http\Livewire\Admin\Fee;
use App\Http\Livewire\Admin\GenerateStudentPassword;
use App\Http\Livewire\Admin\ImportCourse;
use App\Http\Livewire\Admin\ImportDepartment;
use App\Http\Livewire\Admin\ImportProgram;
use App\Http\Livewire\Admin\ImportStudents;
use App\Http\Livewire\Admin\UploadResult;
use App\Http\Livewire\Dean\DeanDashboard;
use App\Http\Livewire\DepartmentCordinator\CordinatorStudentDashboard;
use App\Http\Livewire\DepartmentCordinator\CordinatorWelcome;
use App\Http\Livewire\DepartmentCordinator\CreateSubsidiary;
use App\Http\Livewire\DepartmentCordinator\ImportStudentStatus;
use App\Http\Livewire\DepartmentCordinator\ViewCourse;
use App\Http\Livewire\Hod\HodCreateUser;
use App\Http\Livewire\Hod\HodFee;
use App\Http\Livewire\Hod\PrintCourse;
use App\Http\Livewire\Student\Registration;
use App\Http\Livewire\Student\StudentCourseRegistration;
use App\Http\Livewire\Student\StudentFees;
use App\Http\Livewire\Vc\VcDashboard;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Chief Admin Route
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','auth.isSuperAdmin'])->group(function(){
    Route::get('/create-fee', Fee::class)->name('fee');
    Route::resource('/users', User::class);
    Route::get('/create-user', CreateUser::class)->name('createUser');
    Route::get('/edit-student', EditUser::class)->name('editUser');
    Route::get('/import-student', ImportStudents::class)->name('importStudents');
    Route::get('/import-department', ImportDepartment::class)->name('importDepartments');
    Route::get('/import-programme', ImportProgram::class)->name('importProgrammes');
    Route::get('/import-course', ImportCourse::class)->name('importCourses');

});

//VC Route
Route::prefix('vc')->name('vc.')->middleware(['auth:sanctum', 'verified','auth.isViceChancellor'])->group(function(){
    Route::get('/vc-dashboard', VcDashboard::class)->name('vc-dashboard');

});

// Technical Staff Admin
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','auth.isAdmin'])->group(function(){

    Route::get('/course_combination', CourseCombination::class)->name('course_combination');
    // Route::get('/fac_dept_prog_course', CreateFacDeptProgCourse::class)->name('fac_dept_prog_course');
    // Route::get('/upload-result', UploadResult::class)->name('result');
});

// Dean
Route::prefix('dean')->name('dean.')->middleware(['auth:sanctum', 'verified','auth.isDean'])->group(function(){
    Route::get('/dean', DeanDashboard::class)->name('dean');

});

// Technical Staff Admin
Route::prefix('hod')->name('hod.')->middleware(['auth:sanctum', 'verified','auth.isHeadofDepartment'])->group(function(){

    Route::get('/fac_dept_prog_course', CreateFacDeptProgCourse::class)->name('fac_dept_prog_course');
    Route::get('/hod_user', HodCreateUser::class)->name('hod_create_user');
    Route::get('/hod_fee', HodFee::class)->name('hod_fee');
    Route::get('/print_course', PrintCourse::class)->name('Print_Course');
    Route::get('/upload-result', UploadResult::class)->name('result');

});

// Staff
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','auth.isStaff'])->group(function(){
    Route::get('/upload-result', UploadResult::class)->name('result');
});

// Department Cordinator
Route::prefix('department-cordinator')->name('department-cordinator.')->middleware(['auth:sanctum', 'verified','auth.isDepartmentCoordinator'])->group(function(){

    Route::get('/cordinator-welcome', CordinatorWelcome::class)->name('welcomeCordinator');

    Route::get('/cordinator-student', CordinatorStudentDashboard::class)->name('cordinate_student_operation');

    Route::get('/fac_dept_prog_course', ViewCourse::class)->name('view_courses');

    Route::get('/student-status', ImportStudentStatus::class)->name('student_status');
});

//Student
Route::prefix('student')->name('student.')->middleware(['auth:sanctum', 'verified','auth.isStudent'])->group(function(){
    Route::get('/student-fees', StudentFees::class)->name('studentFee');
    Route::get('/student', Registration::class)->name('regStudent');
    Route::get('/course-registration', StudentCourseRegistration::class)->name('registerCourse');
});


