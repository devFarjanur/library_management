<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');



    // admin category

    // Route::get('/admin/product-categories', [AdminController::class, 'AdminProductCategories'])->name('admin.product.categories');
    // Route::get('/admin/create-product-categories', [AdminController::class, 'AdminCreateProductCategories'])->name('admin.create.product.categories');
    // Route::get('/admin/product-categories-store', [AdminController::class, 'AdminProductCategoriesStore'])->name('admin.product.categories.store');


    // admin product

    Route::get('/admin/book', [AdminController::class, 'AdminBook'])->name('admin.book');
    Route::get('/admin/add/book', [AdminController::class, 'AdminAddBook'])->name('admin.add.book');
    Route::post('/admin/book/store', [AdminController::class, 'AdminBookStore'])->name('admin.book.store');
    
    Route::get('/admin/book/view', [AdminController::class, 'AdminBookView'])->name('admin.Book.view');
    // Route::get('/admin/product/{id}', [AdminController::class, 'AdminProductSingleview'])->name('admin.product.singleview');
    // Route::get('/admin/product/{id}/edit', [AdminController::class, 'AdminEditProduct'])->name('admin.edit.product');
    Route::put('/admin/book/update/{id}', [AdminController::class, 'AdminUpdateBook'])->name('admin.update.book');

    

});  // End Admin group middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');



Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/book', [StudentController::class, 'StudentBook'])->name('student.book');
    Route::get('/student/logout', [StudentController::class, 'StudentLogout'])->name('student.logout');
    Route::get('/student/Profile', [StudentController::class, 'StudentProfile'])->name('student.profile');
    Route::post('/student/Profile/store', [StudentController::class, 'StudentProfileStore'])->name('student.profile.store');
    Route::get('/student/change/password', [StudentController::class, 'StudentChangePassword'])->name('student.change.password');
    Route::post('/student/update/password', [StudentController::class, 'StudentUpdatePassword'])->name('student.update.password');





    // student book

    Route::get('/student/book', [StudentController::class, 'StudentBook'])->name('student.book');

});  // End student group middleware



Route::get('/student/login', [StudentController::class, 'StudentLogin'])->name('student.login');