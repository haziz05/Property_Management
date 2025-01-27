<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashController;
use App\Http\Controllers\editController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\dashControllerT;
use App\Http\Controllers\queryController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\myQueryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\managementController;
use App\Http\Controllers\myPropertyController;
use App\Http\Controllers\maintenanceController;
use App\Http\Controllers\myMaintenanceController;

Route::get('/', function () {
    Auth::logout();
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', [dashController::class, 'show'])->middleware(['auth', 'verified'])->name('admin_dash');
Route::get('/dashboardT', [dashControllerT::class, 'show'])->middleware(['auth', 'verified'])->name('tenant_dash');

Route::get('/listings', [PropertyController::class, 'show'])->name('listings');
Route::get('/edit', [PropertyController::class, 'showPropertyEditor'])->name('editScreen');
Route::POST('/edit', [PropertyController::class, 'addProperty'])->name('addProperty');
Route::get('/delete/{property_id}', [PropertyController::class, 'removeProperty'])->name('removeProperty');
Route::get('/edit/{property_id}', [PropertyController::class, 'editProperty'])->name('editProperty');
Route::POST('/update', [PropertyController::class, 'update'])->name('updateProperty');

Route::get('/maintenance', [maintenanceController::class, 'show'])->name('maintenance');
Route::get('/query/{id}', [maintenanceController::class, 'showQuery'])->name('query');
Route::POST('/updateQ', [maintenanceController::class, 'update'])->name('updateQuery');
Route::get('removeQ/{id}', [maintenanceController::class, 'remove'])->name('removeQuery');
Route::POST('/addQ', [maintenanceController::class, 'add'])->name('addQuery');


Route::get('/currentTenant', [TenantController::class, 'show'])->name('currentTenant');
Route::get('/editTenant', [TenantController::class, 'showTenant'])->name('editTScreen');
Route::POST('/editTenant', [TenantController::class, 'addTenant'])->name('addTenant');
Route::get('/remove/{tenant_id}', [TenantController::class, 'remove'])->name('removeTenant');
Route::get('/editT/{tenant_id}', [TenantController::class, 'editTenant'])->name('editTenant');
Route::POST('/updateT', [TenantController::class, 'update'])->name('updateTenant');




Route::get('/management/{id}', [managementController::class, 'show'])->name('manageProperty');

Route::get('/myProperty', [myPropertyController::class, 'show'])->name('tenantProperty');

Route::get('/myMaintenance', [myMaintenanceController::class, 'show'])->name('tenantQueryScreen');
Route::get('/myQuery/{id}', [myMaintenanceController::class, 'showQuery'])->name('tenantQueries');
Route::POST('/addQT', [myMaintenanceController::class, 'add'])->name('addTQueries');
Route::POST('/updateQT', [myMaintenanceController::class, 'update'])->name('updateTQueries');
Route::get('/removeQT/{id}', [myMaintenanceController::class, 'remove'])->name('removeTQuery');

Route::get('/showTenantUpload', [fileController::class, 'showTenantUpload'])->name('showTenantUpload');
Route::POST('/uploadTenantFile', [fileController::class, 'uploadTenantFile'])->name('uploadTenantFile');
Route::get('/showMaintenanceUpload', [fileController::class, 'showMaintenanceUpload'])->name('showMaintenanceUpload');
Route::POST('/uploadMaintenanceFile', [fileController::class, 'uploadMaintenanceFile'])->name('uploadMaintenanceFile');
Route::get('/showPropertyUpload', [fileController::class, 'showPropertyUpload'])->name('showPropertyUpload');
Route::POST('/uploadPropertyFile', [fileController::class, 'uploadPropertyFile'])->name('uploadPropertyFile');

Route::get('/showTenantSelect', [fileController::class, 'showTenantSelect'])->name('showTenantSelect');
Route::get('/viewTenantFiles/{id}', [fileController::class, 'viewTenantFiles'])->name('viewTenantFiles');
Route::get('/showMaintenanceSelect', [fileController::class, 'showMaintenanceSelect'])->name('showMaintenanceSelect');
Route::get('/viewMaintenanceFiles/{id}', [fileController::class, 'viewMaintenanceFiles'])->name('viewMaintenanceFiles');
Route::get('/showPropertySelect', [fileController::class, 'showPropertySelect'])->name('showPropertySelect');
Route::get('/viewPropertyFiles/{id}', [fileController::class, 'viewPropertyFiles'])->name('viewPropertyFiles');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

