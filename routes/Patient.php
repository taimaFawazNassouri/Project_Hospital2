<?php


use App\Http\Controllers\Auth\PatientController;
use App\Http\Controllers\Patient\PatientInvoicesController;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;



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


    //################################ dashboard  ########################################

    Route::get('/dashboard/patient', function () {
        return view('Dashboard.dashboard_Patient.dashboard');
    })->middleware(['auth:patient'])->name('dashboard.patient');
    
    Route::post('logout/Patient', [PatientController::class, 'destroy'])->middleware(['auth:patient', 'verified'])->name('logout.patient');
    Route::middleware(['auth:patient'])->group(function () {
       //############################# patients route ##########################################
       Route::get('invoices', [PatientInvoicesController::class,'invoices'])->name('invoices.patient');
       Route::get('laboratories', [PatientInvoicesController::class,'laboratories'])->name('laboratories.patient');
       Route::get('view_laboratories/{id}', [PatientInvoicesController::class,'viewLaboratories'])->name('laboratories.view');
       Route::get('rays', [PatientInvoicesController::class,'rays'])->name('rays.patient');
       Route::get('view_rays/{id}', [PatientInvoicesController::class,'viewRays'])->name('rays.view');
       Route::get('payments', [PatientInvoicesController::class,'payments'])->name('payments.patient');
       //############################# end patients route ######################################

      //#############################  chat route ##########################################
    //   Livewire::setUpdateRoute(function ($handle) {
    //     return Route::post('/livewire/update', $handle);
    //   });
      Route::get('list/doctors', CreateChat::class)->name('list.doctors');
      Route::get('chat/doctors', Main::class)->name('chat.doctors');

     

     //############################# end chat route ############################################


        Route::get('/404', function () {
            return view('Dashboard.404');
        })->name('404');





    });
  

//---------------------------------------------------------------------------------------------------------------


    
    require __DIR__ . '/auth.php';


});