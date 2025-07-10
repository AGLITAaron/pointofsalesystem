<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setup\SetupController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Modules\Customers\CustomersContoller;
use App\Http\Controllers\Modules\Dashboard\DashboardController;
use App\Http\Controllers\Modules\Employees\EmployeesController;
use App\Http\Controllers\Modules\UserAccounts\UserAccountsController;
use App\Http\Controllers\Modules\Maintenance\Address\AddressController;
use App\Http\Controllers\Modules\Maintenance\Price\PriceController;
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
    Route::post('/logout-proc', [LoginController::class, 'logout'])->name('logout-proc');


    Route::prefix('employeess/')->group(
        function () {
            Route::get('/', [EmployeesController::class, 'index'])->name('employees');
            Route::post('/add-employees', [EmployeesController::class, 'addEmployees'])->name('add-employees-proc');
            Route::get('/edit-employees/{id}', [EmployeesController::class, 'editEmployees'])->name('edit-employees');
            Route::post('/edit-employees-proc', [EmployeesController::class, 'editEmployeesProc'])->name('edit-employees-proc');
        }
    );

    Route::prefix('customers/')->group(
        function () {
            Route::get('/', [CustomersContoller::class, 'index'])->name('customers');
            Route::post('/add-customers', [CustomersContoller::class, 'addCustomer'])->name('add-customer-proc');
            Route::get('/edit-customers/{id}', [CustomersContoller::class, 'editCustomer'])->name('edit-customer');
            Route::post('/edit-customers-proc', [CustomersContoller::class, 'editCustomerProc'])->name('edit-customers-proc');
            Route::get('/delete-customers/{id}', [CustomersContoller::class, 'deleteCustomer'])->name('delete-customers');
            Route::post('/delete-customers-proc', [CustomersContoller::class, 'deleteCustomerProc'])->name('delete-customers-proc');
        }
    );


    Route::prefix('user/')->group(
        function () {
            Route::get('/', [UserAccountsController::class, 'index'])->name('users');
            Route::get('/user-account/{id}', [UserAccountsController::class, 'editUser'])->name('editUser');
        }
    );

    Route::prefix('maintenance/')->group(
        function () {

            Route::prefix('price/')->group(
                function () {
                    Route::get('/', [PriceController::class, 'index'])->name('price');
                    Route::post('/add-price-proc', [PriceController::class, 'addPrice'])->name('add-price-proc');
                    Route::get('/edit-price/{id}', [PriceController::class, 'editPrice'])->name('edit-price');
                    Route::post('/edit-price-proc', [PriceController::class, 'editPriceProc'])->name('edit-price-proc');
                    Route::get('/delete-price/{id}', [PriceController::class, 'deletePrice'])->name('delete-price');
                    Route::post('/delete-price-proc', [PriceController::class, 'deletePriceProc'])->name('delete-price-proc');
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
        }
    );
});
