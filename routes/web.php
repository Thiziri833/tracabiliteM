<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PalletController;
use App\Http\Controllers\PrintingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderdetController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::get('orderdets/create/{order}', [OrderdetController::class, 'create'])->name('orderdets.create');
    Route::post('orderdets/store/{order}', [OrderdetController::class, 'store'])->name('orderdets.store');
    Route::get('orderdets/index/{order}', [OrderdetController::class, 'index'])->name('orderdets.index');
    // Route::get('orders/{order}', 'OrderdetController@show')->name('orders.show');




    Route::resource('structures', StructureController::class);
    Route::resource('lines', LineController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('loads', LoadController::class);

    Route::resource('productions', ProductionController::class);
    Route::resource('printings', PrintingController::class);
    Route::get('printings/create/{production}', [PrintingController::class, 'create'])->name('printings.create');
    Route::post('printings', [PrintingController::class, 'store'])->name('printings.store');
    Route::post('impression/{printing}/crud-sscc-create', 'PrintingController@crudSsccCreate')->name('impression.crudSsccCreate');

    Route::resource('pallets', PalletController::class);
    Route::get('/exportPDF/{pallet}', [PalletController::class, 'generatePDF'])->name('pallets.exportPDF');



});

require __DIR__ . '/auth.php';
