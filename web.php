<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/{students}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{students}/update', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{students}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('students/{student_id}/academic', [StudentController::class, 'addEditAcademic'])->name('students.addeditacademic');
Route::put('students/{student_id}/updateacademic', [StudentController::class, 'storeOrUpdateAcademic'])->name('students.storeorupdateacademic');
Route::delete('/students/{students}/deleteacademic', [StudentController::class, 'deleteAcademic'])->name('students.deleteacademic');

Route::get('students/{student_id}/country', [StudentController::class, 'addEditCountry'])->name('students.addeditcountry');
Route::put('students/{student_id}/updatecountry', [StudentController::class, 'storeOrUpdateCountry'])->name('students.storeorupdatecountry');
Route::delete('/students/{students}/deletecountry', [StudentController::class, 'deleteCountry'])->name('students.deletecountry');
