<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionManagementController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\CategoryController as GuestCategoryController;

/* Home */
Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');

/* About */
Route::get('/about', [StaticPageController::class, 'about'])
    ->name('about');

/* Guest/Client Category Routes */
Route::get('categories',[GuestCategoryController::class, 'index'])
    ->name('categories.index');
Route::get('categories/{category}', [GuestCategoryController::class, 'show'])
    ->name('categories.show');

/**
 *  create the Joke routes:
 *          admin.jokes.index
 *          admin.jokes.show
 *          admin.jokes.add
 *          admin.jokes.create
 *          admin.jokes.edit
 *          admin.jokes.update
 *          admin.jokes.destroy
 *          +
 *          admin.jokes.delete
 */
Route::get('jokes/{joke}/delete', [JokeController::class, 'delete'])
            ->name('jokes.delete');
Route::resource('jokes', JokeController::class);

/* Dashboard */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
});

/* ----- Staff and Admin Routes (Roles and Permissions) ----- */
Route::middleware(['auth', 'verified', 'role:staff|admin|super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        //Roles Management (for staff)
        Route::resource('roles', RoleManagementController::class)
            ->only(['index', 'show']);

        /* Admin Home*/
        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        /* User CRUD */
        /* Add a new route to this "admin" routing for the users */
        Route::resource('users', UserManagementController::class);

        /* Add a new route of user/delete page */
        Route::get('users/{user}/delete', [UserManagementController::class, 'delete'])
            ->name('users.delete');

        /* Category CRUD */
        /**
         *  create the Category's routes:
         *          admin.categories.index
         *          admin.categories.show
         *          admin.categories.add
         *          admin.categories.create
         *          admin.categories.edit
         *          admin.categories.update
         *          admin.categories.destroy
         */
        Route::resource('categories', CategoryManagementController::class);
        /* Add a new route of category/delete page */
        Route::get('categories/{category}/delete', [CategoryManagementController::class, 'delete'])
            ->name('categories.delete');

        // Permission Management (for staff)
        Route::resource('permissions', PermissionManagementController::class);



        /**
         * Admin, Super admin only
         */
        Route::middleware('role:admin|super-admin')
            ->group(function () {
                // Assigning permissions to roles
                Route::middleware(['auth', 'verified', 'permission:role-permission-update'])
                    ->group(function () {

                        Route::post('/roles/{role}/permissions',
                            [RoleManagementController::class, 'givePermission'])
                            ->name('roles.permissions');
                    });

                // Role delete confirm page
                Route::get('roles/{role}/delete', [RoleManagementController::class, 'delete'])
                    ->name('roles.delete');

                 Route::resource('roles', RoleManagementController::class)
                    ->except(['index', 'show']); // Avoid duplicating
                // ->except(['delete','destroy'])
                //->only(['index', 'show']);
            });
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
