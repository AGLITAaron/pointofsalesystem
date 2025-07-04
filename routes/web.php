<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setup\SetupController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Modules\Products\ProductController;
use App\Http\Controllers\Modules\Dashboard\DashboardController;
use App\Http\Controllers\Modules\Products\ProductBrandController;
use App\Http\Controllers\Modules\Products\ProductCategoryController;
use App\Http\Controllers\Modules\UserAccounts\UserAccountsController;
use App\Http\Controllers\Modules\Maintenance\Address\AddressController;
use App\Http\Controllers\Modules\Maintenance\Roles\UserRolesController;

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

Route::get('/setup', [SetupController::class, 'index'])->name('setup');
Route::post('/setup', [SetupController::class, 'store'])->name('setup.store');

Route::get("/", [LoginController::class, "index"])->name("login");
Route::get("/forgot-password", [LoginController::class, "forgotPassword"])->name('forgot-passowrd');
Route::get('/registration', [LoginController::class, 'registration'])->name("register-account");

Route::post('/register-user', [LoginController::class, 'registereUser'])->name('register-user');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/forgot-password-proc', [LoginController::class, 'resetPassword'])->name('reset-password');


Route::middleware(['auth', 'preventBackHistory'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user/')->group(
        function () {
            Route::get('/', [UserAccountsController::class, 'index'])->name('users');
            Route::get('/user-account/{id}', [UserAccountsController::class, 'editUser'])->name('editUser');
        }
    );

    Route::prefix('roles/')->group(
        function () {
            Route::get('/', [UserRolesController::class, 'index'])->name('user-roles');
            Route::post('/add-role', [UserRolesController::class, 'addRole'])->name('add-role-proc');
            Route::get('/edit-role/{id}', [UserRolesController::class, 'editRole'])->name('edit-role');
            Route::post('/edit-role-proc', [UserRolesController::class, 'editRoleProc'])->name('edit-role-proc');
            Route::get('/delete-role/{id}', [UserRolesController::class, 'deleteRole'])->name('delete-role');
            Route::post('/delete-role-proc', [UserRolesController::class, 'deleteRoleProc'])->name('delete-role-proc');
        }
    );


    Route::prefix('products/')->group(
        function () {
            Route::prefix('product-list/')->group(
                function () {
                    Route::get('/', [ProductController::class, 'index'])->name('products.list');
                    Route::get('/create-product', [ProductController::class, 'addProducts'])->name('create-product');
                }
            );

            Route::prefix('product-category/')->group(
                function () {
                    Route::get('/', [ProductCategoryController::class, 'index'])->name('product-category');
                    Route::post('/create-product-category', [ProductCategoryController::class, 'addProductCategory'])->name('create-product-category');
                    Route::get('/edit-product-category/{id}', [ProductCategoryController::class, 'editProductCategory'])->name('edit-product-category');
                    Route::post('/edit-product-category-proc', [ProductCategoryController::class, 'editProductCategoryProc'])->name('edit-product-category-proc');
                    Route::get('/delete-product-category/{id}', [ProductCategoryController::class, 'deleteProductCategory'])->name('delete-product-category');
                    Route::post('/delete-product-category-proc', [ProductCategoryController::class, 'deleteProductCategoryProc'])->name('delete-product-category-proc');
                }
            );
            Route::prefix('product-brand/')->group(
                function () {
                    Route::get('/', [ProductBrandController::class, 'index'])->name('product-brand');
                    Route::post('/create-product-brand', [ProductBrandController::class, 'addProductBrand'])->name('create-product-brand');
                    Route::get('/edit-product-brand/{id}', [ProductBrandController::class, 'editProductBrand'])->name('edit-product-brand');
                    Route::post('/edit-product-brand-proc', [ProductBrandController::class, 'editProductBrandProc'])->name('edit-product-brand-proc');
                    Route::get('/delete-product-brand/{id}', [ProductBrandController::class, 'deleteProductBrand'])->name('delete-product-brand');
                    Route::post('/delete-product-brand-pro', [ProductBrandController::class, 'deleteProductBrandProc'])->name('delete-product-brand-proc');
                    // Route::post('/delete-product-brand-proc', [ProductBrandController::class, 'deleteProductBrandProc'])->name('delete-product-brand-proc');
                }
            );
        }
    );
});
