<?php


namespace App\Repository\RayEmployee_dashboard;
use App\Interfaces\RayEmployee_dashboard\InvoiceRepositoryInterface;
use App\Models\Ray;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadImage;

use Illuminate\Support\Facades\Auth;

class InvoiceRepository implements InvoiceRepositoryInterface{
    use UploadImage;

    public function index(){
        $invoices = Ray::where('case',0)->get();
        return view('Dashboard.dashboard_RayEmployee.invoices.index',compact('invoices'));
    
    }
    public function edit($id){
        $invoice = Ray::findOrFail($id);
        return view('Dashboard.dashboard_RayEmployee.invoices.add_diagnosis',compact('invoice'));
    }

    public function update($request, $id)
    {
        $invoice = Ray::findorFail($id);
 
        $invoice->update([
            'employee_id'=> auth()->user()->id,
            'description_employee'=> $request->description_employee,
            'case'=> 1,
        ]);
 
 
        if( $request->hasFile( 'photos' ) ) {
 
          foreach ($request->photos as $photo) {
              //Upload img
              $this->verifyAndStoreImageForeach($photo,'Rays','upload_Image',$invoice->id,'App\Models\Ray');
          }
 
        }
        session()->flash('edit');
        return redirect()->route('invoicesRays.index');
 
    }
    public function completed_invoices(){
        $invoices = Ray::where('case',1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_RayEmployee.invoices.completed_invoices',compact('invoices'));
    }
    public function view_rays($id)
    {
       
        $rays = Ray::findOrFail($id);
        if ($rays->employee_id != auth()->user()->id)
        {
            return redirect()->route('404');

        //   abort(404);
        }
        return view('Dashboard.dashboard_RayEmployee.invoices.patient_details',compact('rays'));
    }
  

  
 
    
}