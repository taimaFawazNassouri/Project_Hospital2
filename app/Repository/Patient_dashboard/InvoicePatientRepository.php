<?php


namespace App\Repository\Patient_dashboard;
use App\Interfaces\Patient_dashboard\InvoicePatientRepositoryInterface;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use App\Models\ReceiptAccount;

use Illuminate\Support\Facades\DB;
// use App\Traits\UploadImage;

use Illuminate\Support\Facades\Auth;

class InvoicePatientRepository implements InvoicePatientRepositoryInterface{

    public function invoices(){
        $invoices = Invoice::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_Patient.invoices.index',compact('invoices'));
    
    }
    
    public function laboratories(){
        $laboratories = Laboratorie::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_Patient.laboratorie.index',compact('laboratories'));
    
    }
    public function ViewLaboratories($id)
    {
       
        $laboratories = Laboratorie::findOrFail($id);
        if ($laboratories->patient_id != auth()->user()->id)
        {
            return redirect()->route('404');

        //   abort(404);
        }
        return view('Dashboard.dashboard_Patient.laboratorie.patient_details',compact('laboratories'));
    }

    
    public function rays(){
        $rays = Ray::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_Patient.rays.index',compact('rays'));
    
    }
    public function ViewRays($id)
    {
       
        $rays = Ray::findOrFail($id);
        if ($rays->patient_id != auth()->user()->id)
        {
            return redirect()->route('404');

        //   abort(404);
        }
        return view('Dashboard.dashboard_Patient.rays.patient_details',compact('rays'));
    }
    public function payments(){
        $payments = ReceiptAccount::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_Patient.Payment.index',compact('payments'));


    }


}