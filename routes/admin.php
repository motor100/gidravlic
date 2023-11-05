<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MainSliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [\App\Http\Controllers\Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);

        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('admin.logout');


        // Админ панель
        Route::get('/', [AdminController::class, 'home'])->name('admin.index');

        Route::get('/profile', [ProfileController::class, 'edit'])
                    ->middleware('password.confirm.admin')
                    ->name('admin.profile');

        Route::put('password', [ProfileController::class, 'new_password'])->name('admin.newpassword');

        Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

        Route::get('/products', [ProductController::class, 'index']);

        // Route::get('/products/create', [ProductController::class, 'create'])->name('products-create');

        // Route::post('/products/store', [ProductController::class, 'store'])->name('products-store');

        // Route::get('/products/{id}', [ProductController::class, 'show'])->name('products-show');

        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products-edit');

        Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('admin.products-update');

        // Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products-destroy');

        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');

        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders-show');

        Route::post('order/{id}/update', [OrderController::class, 'update'])->name('admin.order-update');

        Route::get('/main-slider', [MainSliderController::class, 'index']);

        Route::get('/main-slider/create', [MainSliderController::class, 'create'])->name('admin.main-slider-create');

        Route::post('/main-slider/store', [MainSliderController::class, 'store'])->name('admin.main-slider-store');

        Route::get('/main-slider/{id}', [MainSliderController::class, 'show'])->name('admin.main-slider-show');

        Route::get('/main-slider/{id}/edit', [MainSliderController::class, 'edit'])->name('admin.main-slider-edit');

        Route::post('/main-slider/{id}/update', [MainSliderController::class, 'update'])->name('admin.main-slider-update');

        Route::get('/main-slider/{id}/destroy', [MainSliderController::class, 'destroy'])->name('main-slider-destroy');

        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials');

        Route::post('/testimonials/{id}/update', [TestimonialController::class, 'update'])->name('admin.tesimonials-update');

        Route::post('/testimonials/{id}/destroy', [TestimonialController::class, 'destroy'])->name('admin.tesimonials-destroy');

        Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');

        Route::get('/subcategories/{id}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategories-edit');

        Route::post('/subcategories/{id}/update', [SubcategoryController::class, 'update'])->name('admin.subcategories-update');
    });
});

