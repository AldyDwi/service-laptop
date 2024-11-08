<?php

use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\BookingController;
use App\Http\Controllers\user\RiwayatController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\teknisi\ReportController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\admin\ListServiceController;
use App\Http\Controllers\admin\PaymentTypeController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserTeknisiController;
use App\Http\Controllers\admin\AdminBookingController;
use App\Http\Controllers\admin\UserCustomerController;
use App\Http\Controllers\user\TestimonialUserController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\teknisi\TeknisiBookingController;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/about',[UserController::class,'about'])->name('about');
Route::get('/service',[UserController::class,'service'])->name('service');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/teknisi/dashboard', function () {
//     return view('teknisi.dashboard');
// })->middleware(['auth', 'verified'])->name('teknisi.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route khusus untuk User/customer
Route::middleware(['auth', 'userMiddleware:3'])->group(function(){
    // Route::get('/',[UserController::class,'index'])->name('home');
    Route::get('/booking', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/home', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/riwayat/{id}', [AdminBookingController::class, 'show'])->name('user.booking.show');

    // Testimoni
    Route::get('/testimoni/tambah/{booking_id}', [TestimonialUserController::class, 'create'])->name('testimonial.create');
    Route::post('/testimoni/{booking_id}', [TestimonialUserController::class, 'store'])->name('testimonial.store');
    Route::get('/testimoni/edit/{id}/{booking_id}', [TestimonialUserController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimoni/update/{id}/{booking_id}', [TestimonialUserController::class, 'update'])->name('testimonial.update');
});

// Route khusus untuk admin
Route::middleware(['auth', 'userMiddleware:1'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // kategori service
    Route::get('/admin/service-categories', [ServiceCategoryController::class, 'index'])->name('category');
    Route::get('/admin/service-categories/tambah', [ServiceCategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/service-categories', [ServiceCategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/service-categories/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/service-categories/edit/{id}', [ServiceCategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/service-categories/delete/{id}', [ServiceCategoryController::class, 'destroy'])->name('category.destroy');

    // Booking
    Route::get('/admin/booking', [AdminBookingController::class, 'admin'])->name('booking.index');
    Route::put('/admin/booking/tolak/{id}', [AdminBookingController::class, 'tolak'])->name('booking.tolak');
    Route::put('/admin/booking/terima/{id}', [AdminBookingController::class, 'terima'])->name('booking.terima');
    Route::get('/admin/booking/{id}', [AdminBookingController::class, 'show'])->name('booking.show');

    // Tipe Bayar
    Route::get('/admin/tipe-bayar', [PaymentTypeController::class, 'index'])->name('type.index');
    Route::get('/admin/tipe-bayar/tambah', [PaymentTypeController::class, 'create'])->name('type.create');
    Route::post('/admin/tipe-bayar', [PaymentTypeController::class, 'store'])->name('type.store');
    Route::get('/admin/tipe-bayar/edit/{id}', [PaymentTypeController::class, 'edit'])->name('type.edit');
    Route::put('/admin/tipe-bayar/update/{id}', [PaymentTypeController::class, 'update'])->name('type.update');
    Route::delete('/admin/tipe-bayar/delete/{id}', [PaymentTypeController::class, 'destroy'])->name('type.destroy');

    // Pembayaran
    Route::get('/admin/pembayaran', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/admin/pembayaran/tambah/{booking_id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/admin/pembayaran/store/{booking_id}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/admin/pembayaran/edit/{id}/{booking_id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/admin/pembayaran/update/{id}/{booking_id}', [PaymentController::class, 'update'])->name('payment.update');

    // Kelola Admin
    Route::get('/admin/user-admin', [UserAdminController::class, 'index'])->name('user.admin.index');
    Route::get('/admin/user-admin/tambah', [UserAdminController::class, 'create'])->name('user.admin.create');
    Route::post('/admin/user-admin/store', [UserAdminController::class, 'store'])->name('user.admin.store');
    Route::get('/admin/user-admin/edit/{id}', [UserAdminController::class, 'edit'])->name('user.admin.edit');
    Route::put('/admin/user-admin/update/{id}', [UserAdminController::class, 'update'])->name('user.admin.update');
    Route::delete('/admin/user-admin/delete/{id}', [UserAdminController::class, 'destroy'])->name('user.admin.destroy');

    // Kelola Teknisi
    Route::get('/admin/user-customer', [UserCustomerController::class, 'index'])->name('user.customer.index');
    Route::get('/admin/user-customer/tambah', [UserCustomerController::class, 'create'])->name('user.customer.create');
    Route::post('/admin/user-customer/store', [UserCustomerController::class, 'store'])->name('user.customer.store');
    Route::get('/admin/user-customer/edit/{id}', [UserCustomerController::class, 'edit'])->name('user.customer.edit');
    Route::put('/admin/user-customer/update/{id}', [UserCustomerController::class, 'update'])->name('user.customer.update');
    Route::delete('/admin/user-customer/delete/{id}', [UserCustomerController::class, 'destroy'])->name('user.customer.destroy');

    // Kelola Customer
    Route::get('/admin/user-teknisi', [UserTeknisiController::class, 'index'])->name('user.teknisi.index');
    Route::get('/admin/user-teknisi/tambah', [UserTeknisiController::class, 'create'])->name('user.teknisi.create');
    Route::post('/admin/user-teknisi/store', [UserTeknisiController::class, 'store'])->name('user.teknisi.store');
    Route::get('/admin/user-teknisi/edit/{id}', [UserTeknisiController::class, 'edit'])->name('user.teknisi.edit');
    Route::put('/admin/user-teknisi/update/{id}', [UserTeknisiController::class, 'update'])->name('user.teknisi.update');
    Route::delete('/admin/user-teknisi/delete/{id}', [UserTeknisiController::class, 'destroy'])->name('user.teknisi.destroy');

    // Testimoni
    Route::get('/admin/testimoni', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('/admin/testimoni/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::put('/admin/testimoni/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('/admin/testimoni/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

    // List Service
    Route::get('/admin/list-service', [ListServiceController::class, 'index'])->name('admin.list.index');
    Route::get('/admin/list-service/tambah', [ListServiceController::class, 'create'])->name('admin.list.create');
    Route::post('/admin/list-service', [ListServiceController::class, 'store'])->name('admin.list.store');
    Route::get('/admin/list-service/edit/{id}', [ListServiceController::class, 'edit'])->name('admin.list.edit');
    Route::put('/admin/list-service/edit/{id}', [ListServiceController::class, 'update'])->name('admin.list.update');
    Route::delete('/admin/list-service/delete/{id}', [ListServiceController::class, 'destroy'])->name('admin.list.destroy');
});

// Route khusus untuk teknisi
Route::middleware(['auth', 'userMiddleware:2'])->group(function () {
    // Route::get('/teknisi/dashboard', [TeknisiController::class, 'dashboard'])->name('teknisi.dashboard');
    Route::get('/teknisi/dashboard', function () {
        return view('teknisi.dashboard');
    })->name('teknisi.dashboard');

    // Booking
    Route::get('/teknisi/booking', [TeknisiBookingController::class, 'index'])->name('teknisi.booking.index');
    Route::put('/teknisi/booking/selesai/{id}', [TeknisiBookingController::class, 'selesai'])->name('booking.selesai');
    Route::get('/teknisi/booking/{id}', [AdminBookingController::class, 'show'])->name('teknisi.booking.show');

    // Report
    Route::get('/teknisi/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/teknisi/report/proses/{booking_id}', [ReportController::class, 'create'])->name('report.create');
    Route::post('/teknisi/report/store/{booking_id}', [ReportController::class, 'store'])->name('report.store');
    Route::get('/teknisi/report/edit/{id}/{booking_id}', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/teknisi/report/update/{id}/{booking_id}', [ReportController::class, 'update'])->name('report.update');
});