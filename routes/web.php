<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilymembersController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SavingsummaryController;
use App\Http\Controllers\EldersgiftexchangeController;
use App\Http\Controllers\StudentsgiftexchangeController;
use App\Http\Controllers\WorkingclassgiftexchangeController;
use App\Http\Controllers\NoneWorkingclassgiftexchangeController;
use App\Http\Controllers\InlawsController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserpermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicecategoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\ExistingpatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\PharmacyController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/myprofile', [DashboardController::class, 'myprofile'])->name('myprofile')
->middleware('auth');
Route::get('/registeruser', [DashboardController::class, 'user'])->name('registeruser')
->middleware('auth');
Route::post('/registeruser', [DashboardController::class, 'createuser'])->name('registeruser')
->middleware('auth');

//Family
Route::resource('familymembers', FamilymembersController::class)->middleware('auth');

Route::post('enroll/{id}', [FamilymembersController::class, 'enroll'])->name('enroll')->middleware('auth');
Route::get('exportfamilymember/', [FamilymembersController::class, 'export'])->name('exportfamilymember')->middleware('auth');


//Savings
Route::resource('savings', SavingController::class)->middleware('auth');
Route::get('exportsaving/', [SavingController::class, 'export'])->name('exportsaving')->middleware('auth');

//Eldersgift Exchange
Route::resource('elders', EldersgiftexchangeController::class)->middleware('auth');
Route::get('exportelders/', [EldersgiftexchangeController::class, 'export'])->name('exportelders')->middleware('auth');


//Studentsgift Exchange
Route::resource('students', StudentsgiftexchangeController::class)->middleware('auth');
Route::get('exportstudents/', [StudentsgiftexchangeController::class, 'export'])->name('exportstudents')->middleware('auth');


//Workingclasssgift Exchange
Route::resource('workingclass', WorkingclassgiftexchangeController::class)->middleware('auth');
Route::get('exportworkingclass/', [WorkingclassgiftexchangeController::class, 'export'])->name('exportworkingclass')->middleware('auth');

//NonWorkingclasssgift Exchange
Route::resource('noneworkingclass', NoneWorkingclassgiftexchangeController::class)->middleware('auth');
Route::get('exportnoneworkingclass/', [NoneWorkingclassgiftexchangeController::class, 'export'])->name('exportnoneworkingclass')->middleware('auth');

//InlawsExchange
Route::resource('inlaws', InlawsController::class)->middleware('auth');
Route::get('exportinlaw/', [InlawsController::class, 'export'])->name('exportinlaw')->middleware('auth');


//Savingsummary
Route::resource('savingsummary', SavingsummaryController::class)->middleware('auth');
Route::get('exportsavingsummary/', [SavingsummaryController::class, 'export'])->name('exportsavingsummary')->middleware('auth');

//Loans
Route::resource('loans', LoansController::class)->middleware('auth');
Route::get('exportloan/', [LoansController::class, 'export'])->name('exportloan')->middleware('auth');

//Userpermissions
Route::resource('userpermission', UserpermissionController::class)->middleware('auth');
Route::post('validateuserpermission', [UserpermissionController::class, 'validateuserpermission'])->middleware('auth');


Route::get('/file-import',[InlawsController::class,'importView'])->name('import-view');
Route::post('/import',[InlawsController::class,'import'])->name('import');

// Route::get('/',  [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
// Route::get('/dashboard',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

//Service category
// Route::resource('servicecategory', ServicecategoryController::class)->middleware('auth');
// Route::post('validateservicecategory', [ServicecategoryController::class, 'validateservicecategory'])->middleware('auth');


//Patients
// Route::resource('patient', PatientController::class)->middleware('auth');
// Route::post('validateservicecategory', [PatientController::class, 'validateservicecategory'])->middleware('auth');
// Route::get('viewpatients', [PatientController::class, 'view'])->name('viewpatients')->middleware('auth');

// Route::post('enroll/{id}', [PatientController::class, 'enroll'])->name('enroll')->middleware('auth');



// Route::resource('staff', StaffController::class)->middleware('auth');
// Route::post('/search', [StaffController::class, 'search'])->name('search')
// ->middleware('auth');
// Route::get('exportstaff/', [StaffController::class, 'export'])->name('exportstaff')->middleware('auth');
// Route::post('enroll/{id}', [StaffController::class, 'enroll'])->name('enroll')->middleware('auth');

// Route::resource('student', StudentController::class)->middleware('auth');
// Route::post('student', [StudentController::class, 'save'])->middleware('auth');

//Speciality
// Route::resource('speciality', SpecialityController::class)->middleware('auth');

// Route::resource('users', UserController::class)->middleware('auth');

//Appointment
// Route::post('enroll/{id}', [AppointmentController::class, 'enroll'])->name('enroll')->middleware('auth');


//Doctor
// Route::resource('doctor', DoctorController::class)->middleware('auth');

//Lab
// Route::resource('laboratory', LaboratoryController::class)->middleware('auth');



//Pharmacy
// Route::resource('pharmacy', PharmacyController::class)->middleware('auth');

//Appointments
// Route::resource('appointment', AppointmentController::class)->middleware('auth');

require __DIR__.'/auth.php';
