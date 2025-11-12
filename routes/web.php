<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');

/* Guest/Client Category Routes */
Route::get('categories',[\App\Http\Controllers\CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->name('categories.show');
Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])
    ->name('categories.store');

/* Guest/Client Joke Routes */
Route::get('jokes', [\App\Http\Controllers\JokeController::class, 'index'])
    ->name('jokes.index');
Route::get('jokes/{joke}', [\App\Http\Controllers\JokeController::class, 'show'])
    ->name('jokes.show');
Route::get('jokes/create', [\App\Http\Controllers\JokeController::class, 'create'])
    ->name('jokes.create');
Route::post('jokes/store', [\App\Http\Controllers\JokeController::class, 'store'])
    ->name('jokes.store');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
});

/* Staff amd Admin Routes */
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        /* Add a new route to this "admin" routing for the users */
        Route::resource('users',
            UserManagementController::class)
            ->middleware(['auth',]);
        /* Add a new route of user/delete page */
        Route::get('users/{user}/delete', [UserManagementController::class, 'delete'])
            ->name('users.delete');

        Route::get('users', [AdminController::class, 'users'])->name('users');

        /* Add a new route of category/delete page */
        Route::get('categories/{category}/delete', [CategoryManagementController::class, 'delete'])
            ->name('categories.delete');

        /* Add a new route of joke/delete page */
        Route::get('jokes/{joke}/delete', [JokeController::class, 'delete'])
            ->name('jokes.delete');
        /**
         *  create the routes:
         *          admin.categories.index
         *          admin.categories.show
         *          admin.categories.add
         *          admin.categories.create
         *          admin.categories.edit
         *          admin.categories.update
         *          admin.categories.destroy
         */
        Route::resource('categories', CategoryManagementController::class);

    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__.'/auth.php';
