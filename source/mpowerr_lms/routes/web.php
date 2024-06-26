<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CurdControllerCustomer;
use App\Http\Controllers\CurdControllerProduct;
use App\Http\Controllers\LeasingController;
use App\Http\Controllers\CrudControllerHistory;

Route::get('/', [PageController::class, 'IndexPage'])->name("IndexPageRoute");
Route::post('/LoginProcess', [AuthenticationController::class, 'LoginProcess'])->name("LoginProcessRoute");
Route::get('/LogoutProcess', [AuthenticationController::class, 'LogoutProcess'])->name("LogoutProcessRoute");


Route::middleware(['CheckUserAuth'])->group(function () {

Route::get('/CustomerManagement', [PageController::class, 'CustomerManagementPage'])->name("CustomerManagementRoute");
Route::post('/RegisterCustomer', [CurdControllerCustomer::class, 'RegisterCustomerMethod'])->name("RegisterCustomerRoute");
Route::delete('/DeleteCustomer', [CurdControllerCustomer::class, 'DeleteCustomerMethod'])->name("DeleteCustomerRoute");
Route::post('/EditCustomerView', [CurdControllerCustomer::class, 'EditCustomerViewMethod'])->name("EditCustomerViewRoute");
Route::post('/EditCustomer', [CurdControllerCustomer::class, 'EditCustomerMethod'])->name("EditCustomerRoute");

Route::get('/ProductManagement', [PageController::class, 'ProductManagementPage'])->name("ProductManagementRoute");
Route::post('/RegisterProduct', [CurdControllerProduct::class, 'RegisterProductMethod'])->name("RegisterProductRoute");
Route::delete('/DeleteProduct', [CurdControllerProduct::class, 'DeleteProductMethod'])->name("DeleteProductRoute");
Route::post('/EditProductView', [CurdControllerProduct::class, 'EditProductViewMethod'])->name("EditProductViewRoute");
Route::post('/EditProduct', [CurdControllerProduct::class, 'EditProductMethod'])->name("EditProductRoute");

Route::get('/LeasesManagement', [PageController::class, 'LeasesManagementPage'])->name('LeasesManagementRoute');
Route::post('/RegisterLeases', [LeasingController::class, 'RegisterLeasesMethod'])->name('RegisterLeasesRoute');
Route::delete('/DeleteLeases', [CrudControllerHistory::class, 'DeleteLeasesMethod'])->name("DeleteLeasesRoute");

Route::post('/PayInstallment', [LeasingController::class, 'PayInstallmentMethod'])->name('PayInstallmentRoute');
Route::delete('/DeleteInstallment', [CurdControllerProduct::class, 'DeleteInstallmentMethod'])->name("DeleteInstallmentRoute");

Route::get('/HistoryManagement', [PageController::class, 'HistoryManagementPage'])->name("HistoryManagementRoute");

Route::get('/SettingManagement', [PageController::class, 'SettingManagementPage'])->name("SettingManagementRoute");

});
