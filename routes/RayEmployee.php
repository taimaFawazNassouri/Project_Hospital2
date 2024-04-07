<?php


use App\Http\Controllers\Auth\RayEmployeeController;
use App\Http\Controllers\RayEmployee\InvoiceController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    //################################ dashboard ray_employee ########################################

    Route::get('/dashboard/ray_employee', function () {
        return view('Dashboard.dashboard_RayEmployee.dashboard');
    })->middleware(['auth:ray_employee'])->name('dashboard.RayEmployee');
    
    Route::post('logout/Ray-Employee', [RayEmployeeController::class, 'destroy'])->middleware(['auth:ray_employee', 'verified'])->name('logout.ray_employee');

    //################################ end dashboard ray_employee #####################################
    Route::middleware(['auth:ray_employee'])->group(function () {
        
        Route::resource('invoicesRays', InvoiceController::class);
        Route::get('Completed_Invoices/Rays',[InvoiceController::class,'completed_invoices'])->name('CompletedInvoices.Rays');
        Route::get('View_Rays/{id}',[InvoiceController::class,'view_rays'])->name('ViewRays');
        Route::get('/404', function () {
            return view('Dashboard.404');
        })->name('404');





    });


//---------------------------------------------------------------------------------------------------------------


    
    require __DIR__ . '/auth.php';


});