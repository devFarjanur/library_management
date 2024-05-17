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



Route::middleware('auth')->group(function () {



    Route::get('/dashboard', [ProfileController::class, 'StudentDashboard'])->name('dashboard');
    Route::get('/student/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/student/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/student/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Define the search book route
    Route::get('/student/search-book', [ProfileController::class, 'StudentSearchBook'])->name('student.search.book');

    Route::post('/student/borrow/{book}', [ProfileController::class, 'StudentBookBorrow'])->name('student.borrow.book');
    Route::get('/student/borrow-list', [ProfileController::class, 'StudentBookBorrowList'])->name('student.borrow.book.list');

    Route::get('/student/return-book-list', [ProfileController::class, 'StudentReturnBookList'])->name('student.return.book.list');
    Route::post('/student/return-book/{borrowApproval}', [ProfileController::class, 'ReturnBook'])->name('student.return.book');



});


require __DIR__.'/auth.php';




Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // admin boook

    Route::get('/admin/book', [AdminController::class, 'AdminBook'])->name('admin.book');
    Route::get('/admin/add/book', [AdminController::class, 'AdminAddBook'])->name('admin.add.book');
    Route::post('/admin/book/store', [AdminController::class, 'AdminBookStore'])->name('admin.book.store');
    
    Route::get('/admin/book/view', [AdminController::class, 'AdminBookView'])->name('admin.Book.view');

    Route::put('/admin/book/update/{id}', [AdminController::class, 'AdminUpdateBook'])->name('admin.update.book');
    Route::get('/admin/book/borrow-request', [AdminController::class, 'AdminBorrowRequest'])->name('admin.borrow.request');

    Route::post('/admin/approve-borrow-request/{borrowRequest}', [AdminController::class, 'AdminApproveBorrowRequest'])->name('admin.approve.borrow.request');
    Route::post('/admin/reject-borrow-request/{borrowRequest}', [AdminController::class, 'AdminRejectBorrowRequest'])->name('admin.reject.borrow.request');

    Route::get('/admin/returned-books', [AdminController::class, 'AdminReturnedBook'])->name('admin.returned.book');





});  // End Admin group middleware



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


