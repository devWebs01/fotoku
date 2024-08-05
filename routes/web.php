<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FrontController::class, 'index'])->name('index');
Route::get('/fotografer',[FrontController::class, 'fotografer'])->name('fotografer_depan');
Route::get('/fotografer_detail/{id}',[FrontController::class, 'fotograferDetail'])->name('fotografer_detail');
Route::post('/daftar',[FrontController::class, 'daftar'])->name('daftar');

Auth::routes([
    'register'  => false,
    'reset'     => false,
    'confirm'   => false
]);

Route::middleware(['auth'])->get('/home', [DashboardController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/gantiPassword', [UserController::class, 'gantiPassword'])->name('gantiPassword');
    
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->middleware(['permission:read user'])->name('user.index');
        Route::post('user', 'store')->middleware(['permission:create user'])->name('user.store');
        Route::post('user/show', 'show')->middleware(['permission:read user'])->name('user.show');
        Route::put('user', 'update')->middleware(['permission:update user'])->name('user.update');
        Route::delete('user', 'destroy')->middleware(['permission:delete user'])->name('user.destroy');
    });

    // Route::controller(RoleController::class)->group(function () {
    //     Route::get('role', 'index')->middleware(['permission:read role'])->name('role.index');
    //     Route::post('role', 'store')->middleware(['permission:create role'])->name('role.store');
    //     Route::post('role/show', 'show')->middleware(['permission:read role'])->name('role.show');
    //     Route::put('role', 'update')->middleware(['permission:update role'])->name('role.update');
    //     Route::delete('role', 'destroy')->middleware(['permission:delete role'])->name('role.destroy');
    // });

    // Route::controller(PermissionController::class)->group(function () {
    //     Route::get('permission', 'index')->middleware(['permission:read permission'])->name('permission.index');
    //     Route::post('permission', 'store')->middleware(['permission:create permission'])->name('permission.store');
    //     Route::post('permission/show', 'show')->middleware(['permission:read permission'])->name('permission.show');
    //     Route::put('permission', 'update')->middleware(['permission:update permission'])->name('permission.update');
    //     Route::delete('permission', 'destroy')->middleware(['permission:delete permission'])->name('permission.destroy');
    //     Route::get('permission/reload', 'reloadPermission')->middleware(['permission:create permission'])->name('permission.reload');
    // });

    Route::controller(SettingController::class)->group(function () {
        Route::get('setting', 'index')->middleware(['permission:read setting'])->name('setting.index');
        Route::post('setting', 'store')->middleware(['permission:create setting'])->name('setting.store');
        Route::post('setting/show', 'show')->middleware(['permission:read setting'])->name('setting.show');
        Route::put('setting', 'update')->middleware(['permission:update setting'])->name('setting.update');
        Route::delete('setting', 'destroy')->middleware(['permission:delete setting'])->name('setting.destroy');
    });
    
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->middleware(['permission:read role'])->name('role.index');
        Route::post('role', 'store')->middleware(['permission:create role'])->name('role.store');
        Route::post('role/show', 'show')->middleware(['permission:read role'])->name('role.show');
        Route::put('role', 'update')->middleware(['permission:update role'])->name('role.update');
        Route::delete('role', 'destroy')->middleware(['permission:delete role'])->name('role.destroy');
    });
   
    /*
     * User Routes
     */
    Route::post('user/get', [App\Http\Controllers\Admin\UserController::class, 'get'])->name('user.get');
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    
   
    /*
     * pelanggan Routes
     */
    Route::post('pelanggan/get', [App\Http\Controllers\Admin\UserController::class, 'get'])->name('pelanggan.get');
    Route::resource('pelanggan', App\Http\Controllers\Admin\UserController::class);
    
    /*
     * Fotografi Routes
     */
    Route::get('fotografer/getFotograferFromId/{id}', [App\Http\Controllers\Admin\FotograferController::class, 'getFotograferFromId'])->name('fotografer.getFotograferFromId');
    Route::get('fotografer/getFotograferFromKecamatan/{id}', [App\Http\Controllers\Admin\FotograferController::class, 'getFotograferFromKecamatan'])->name('fotografer.getFotograferFromKecamatan');
    Route::post('fotografer/get', [App\Http\Controllers\Admin\FotograferController::class, 'get'])->name('fotografer.get');
    Route::resource('fotografer', App\Http\Controllers\Admin\FotograferController::class);
    
    // /*
    //  * Bank Routes
    //  */
    Route::post('bank/get', [App\Http\Controllers\Admin\BankController::class, 'get'])->name('bank.get');
    Route::resource('bank', App\Http\Controllers\Admin\BankController::class);
    
    /*
     * Komunitas Routes
     */
    Route::post('kecamatan/get', [App\Http\Controllers\Admin\KecamatanController::class, 'get'])->name('kecamatan.get');
    Route::resource('kecamatan', App\Http\Controllers\Admin\KecamatanController::class);
    
    /*
     * Galeri Routes
     */
    Route::post('galeri/get', [App\Http\Controllers\Admin\GaleriController::class, 'get'])->name('galeri.get');
    Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class);
    
    /*
     * Produk Routes
     */
    Route::get('produk/getProdukFromUser/{id}', [App\Http\Controllers\Admin\ProdukController::class, 'getProdukFromUser'])->name('produk.getProdukFromUser');
    Route::post('produk/get', [App\Http\Controllers\Admin\ProdukController::class, 'get'])->name('produk.get');
    Route::resource('produk', App\Http\Controllers\Admin\ProdukController::class);
    
    /*
     * Jadwal Routes
     */
    Route::post('jadwal/updateStatus', [App\Http\Controllers\Admin\JadwalController::class, 'updateStatus'])->name('jadwal.updateStatus');
    Route::get('jadwal/{jadwal}/editStatus', [App\Http\Controllers\Admin\JadwalController::class, 'editStatus'])->name('jadwal.editStatus');
    Route::post('jadwal/get', [App\Http\Controllers\Admin\JadwalController::class, 'get'])->name('jadwal.get');
    Route::resource('jadwal', App\Http\Controllers\Admin\JadwalController::class);
    
    /*
     * Booking Routes
     */
    Route::post('booking/updateDP', [App\Http\Controllers\Admin\BookingController::class, 'updateDP'])->name('booking.updateDP');
    Route::get('booking/{booking}/editDP', [App\Http\Controllers\Admin\BookingController::class, 'editDP'])->name('booking.editDP');
    Route::post('booking/get', [App\Http\Controllers\Admin\BookingController::class, 'get'])->name('booking.get');
    Route::resource('booking', App\Http\Controllers\Admin\BookingController::class);
});
