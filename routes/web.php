<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\SchoolController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageCategoryController;
use App\Http\Controllers\Frontend\PageContactController;
use App\Http\Controllers\Frontend\PageCourseController;

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

// Admin
Route::middleware(['auth:sanctum', 'verified'])->get('admin', [AdminController::class, 'dashboard'])->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Category
Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('show');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('status/{id}', [CategoryController::class, 'updateStatus'])->name('status');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
});

// School
Route::prefix('admin/schools')->name('admin.schools.')->group(function () {
    Route::get('/', [SchoolController::class, 'index'])->name('show');
    Route::post('store', [SchoolController::class, 'store'])->name('store');
    Route::get('edit/{id}', [SchoolController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [SchoolController::class, 'update'])->name('update');
    Route::get('delete/{id}', [SchoolController::class, 'destroy'])->name('delete');
});

// Teacher
Route::prefix('admin/teachers')->name('admin.teachers.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('show');
    Route::post('store', [TeacherController::class, 'store'])->name('store');
    Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [TeacherController::class, 'update'])->name('update');
    Route::get('delete/{id}', [TeacherController::class, 'destroy'])->name('delete');
});

// Course
Route::prefix('admin/courses')->name('admin.courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('show');
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::post('store', [CourseController::class, 'store'])->name('store');
    Route::get('status/{id}', [CourseController::class, 'updateStatus'])->name('status');
    Route::get('edit/{id}', [CourseController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CourseController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CourseController::class, 'destroy'])->name('delete');
});

// Form
Route::prefix('admin/registration-form')->name('admin.forms.')->group(function () {
    Route::get('/', [FormController::class, 'index'])->name('show');
    Route::get('delete/{id}', [FormController::class, 'destroy'])->name('delete');
});

// Contact
Route::prefix('admin/contacts')->name('admin.contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('show');
    Route::get('delete/{id}', [ContactController::class, 'destroy'])->name('delete');
});

// Pages
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
// Category
Route::get('/categories/{id}', [PageCategoryController::class, 'index'])->name('categories');

// Course
Route::get('/courses', [PageCourseController::class, 'index'])->name('courses');
Route::get('/courses/{id}/detail', [PageCourseController::class, 'detail'])->name('courses.detail');
Route::get('/courses/{id}/registration-form', [PageCourseController::class, 'register'])->name('courses.register');
Route::post('/courses/store', [PageCourseController::class, 'storeRegister'])->name('courses.store_register');

// Contact
Route::get('/contact', [PageContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [PageContactController::class, 'store'])->name('contact.store');
