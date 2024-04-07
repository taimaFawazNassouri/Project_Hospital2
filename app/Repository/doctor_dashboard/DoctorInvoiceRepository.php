<?php


namespace App\Repository\Doctor_dashboard;
use App\Interfaces\Doctor_dashboard\DoctorInvoiceRepositoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;




class DoctorInvoiceRepository implements DoctorInvoiceRepositoryInterface{
    public function index(){
      $invoices= Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',1)->get();
      return view('Dashboard.doctor.invoices.index',compact('invoices'));
     
    }
    public function review_invoices(){
      $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',2)->get();
      return view('Dashboard.doctor.invoices.review_invoices',compact('invoices'));
    }
    public function completed_invoices(){
      $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',3)->get();
      return view('Dashboard.doctor.invoices.completed_invoices',compact('invoices'));
    }
    public function show($id){

      // $rays = Ray::where('doctor_id', Auth::user()->id)->first();
      $rays = Ray::findOrFail($id);
      if ($rays->doctor_id != auth()->user()->id)
       {
        // abort(404);
        return redirect()->route('404');
       }
      return view('Dashboard.doctor.invoices.view_rays',compact('rays'));
    }
  
}