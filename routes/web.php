<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Jurnal;
use App\Models\Student;
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
    return view('index');
})->name('login');

Route::post('/', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// pdf export
Route::get('/student/export', [StudentController::class, 'exportPDF']);
Route::get('/teacher/export', [TeacherController::class, 'exportPDF']);
Route::get('/jadwal/export', [JadwalController::class, 'exportPDF']);
Route::get('/mapel/export', [MapelController::class, 'exportPDF']);
Route::get('/rombel/export', [RombelController::class, 'exportPDF']);


Route::resource('/dashboard/student', StudentController::class);
Route::resource('/dashboard/teacher', TeacherController::class);
Route::resource('/dashboard/jadwal', JadwalController::class);
Route::resource('/dashboard/mapel', MapelController::class);
Route::resource('/dashboard/rombel', RombelController::class);
Route::resource('/dashboard/absen', AbsenController::class);
Route::resource('/dashboard/jurnal', JurnalController::class);
Route::resource('/dashboard/user', UserController::class);

// absen
// Route::get('/dashboard/absen/edit', [AbsenController::class, 'edit']);

// Route::get('/pdf', function () {
//     return view('pdf.students', [
//         'students' => Student::all()
//     ]);
// });
