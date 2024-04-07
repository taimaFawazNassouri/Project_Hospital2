<?php


use App\Http\Controllers\Auth\LaboratorieEmployeeController;
use App\Http\Controllers\Laboratorie\InvoiceLaboratorieController;


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


    //################################ dashboard laboratorie_employee ########################################

    Route::get('/dashboard/laboratorie_employee', function () {
        return view('Dashboard.dashboard-LaboratorieEmployee.dashboard');
    })->middleware(['auth:laboratorie_employee'])->name('dashboard.laboratorie_employee');
    
    Route::post('logout/Laboratorie_employee', [LaboratorieEmployeeController::class, 'destroy'])->middleware(['auth:laboratorie_employee', 'verified'])->name('logout.laboratorie_employee');

    //################################ end dashboard laboratorie_employee #####################################
    Route::middleware(['auth:laboratorie_employee'])->group(function () {
       Route::resource('invoiceLaboratorie', InvoiceLaboratorieController::class);
       Route::get('Completed_Invoices/Laboratorie',[InvoiceLaboratorieController::class,'completed_invoices'])->name('CompletedInvoices.Laboratorie');
       Route::get('View_Laboratorie/{id}',[InvoiceLaboratorieController::class,'view_laboratories'])->name('ViewLaboratorie');
       Route::get('/404', function () {
           return view('Dashboard.404');
       })->name('404');





    });


//---------------------------------------------------------------------------------------------------------------


    
    require __DIR__ . '/auth.php';


});