<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Events\MyEvent;
use App\Livewire\Counter;




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);

 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



        //############################ Dashboard user #########################################
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.index');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        //############################ end Dashboard user #########################################

        //############################   Dashboard admin #########################################
        
        Route::get('/dashboard/admin', function () {
            $data['ser'] = \App\Models\Service::count();
            $data['grp'] = \App\Models\Group::count();
            return view('Dashboard.Admin.index',$data);
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        Route::post('logout/Admin', [AdminController::class, 'destroy'])->middleware(['auth:admin', 'verified'])->name('logout_admin');
        
        //############################ end Dashboard admin #########################################        
         

        Route::middleware(['auth:admin'])->group(function () {
          //############################ Start Sections #############################################

            Route::resource('Sections', SectionController::class);
            
           
            //############################ End Sections #############################################
           //############################ Start Doctors #############################################

            Route::resource('Doctors', DoctorController::class);
            //############################ End Doctors #############################################
            
            //############################   Dashboard update password doctor #########################################
            Route::post('update_password',[DoctorController::class ,'update_password'])->name('update_password');
            Route::post('update_status',[DoctorController::class ,'update_status'])->name('update_status');

            //############################   Dashboard services #########################################
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle);
            });
            Route::resource('Single_Service', SingleServiceController::class);

           //############################   Dashboard Group services #########################################


            Route::view('Add_GroupService', 'livewire.Group_Service.include')->name('Add_GroupService');

          
           //############################# insurance route ########################################
            Route::resource('insurance', InsuranceController::class);

          //############################# end insurance route #####################################
           
          //############################# start ambulance route ###################################
           Route::resource('Ambulance', AmbulanceController::class);
           
          //############################# end ambulance route #####################################

          //############################# start patient route #####################################
          Route::resource('Patients', PatientController::class);

          //############################# end Patients route ######################################

          //############################# start single_invocie route ##############################
          Route::view('Single_invoice', 'livewire.Single_Invoice.index')->name('Single_invoice');
          Route::view('Print_single_invoices', 'livewire.Single_Invoice.print')->name('Print_single_invoices');

          //############################# end single_invocie route ################################
         //############################# start group_invocie route ##############################
          Route::view('group_invoice', 'livewire.Group_Invoice.index')->name('group_invoice');
          Route::view('Print_group_invoices', 'livewire.Group_Invoice.print')->name('Print_group_invoices');
 
         //############################# end group_invocie route ################################

          //############################# start ReceiptAccount route ######################################
          Route::resource('Receipt', ReceiptAccountController::class);

          //############################# end ReceiptAccount route ######################################

          //############################# start PaymentAccount route ######################################
          Route::resource('Payment', PaymentAccountController::class);

          //############################# end PaymentAccount route ######################################
          
          //############################# start RayEmployee route ######################################
          Route::resource('RayEmployee', RayEmployeeController::class);

          //############################# end RayEmployee route ######################################
       
          //############################# start LaboratorieEmployee route ######################################
          Route::resource('LaboratorieEmployee', LaboratorieEmployeeController::class);

          //############################# end LaboratorieEmployee route ######################################
        
       
    
        
    });
   


     
        
        require __DIR__.'/auth.php';





    });
 