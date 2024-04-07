<?php


namespace App\Repository\Laboratorie_dashboard;
use App\Interfaces\Laboratorie_dashboard\InvoiceLaboratorieRepositoryInterface;
use App\Models\Laboratorie;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadImage;

use Illuminate\Support\Facades\Auth;

class InvoiceLaboratorieRepository implements InvoiceLaboratorieRepositoryInterface{
    use UploadImage;

    public function index(){
        $invoices = Laboratorie::where('case',0)->get();
        return view('Dashboard.dashboard-LaboratorieEmployee.invoices.index',compact('invoices'));
    
    }
    public function edit($id){
        $invoice = Laboratorie::findOrFail($id);
        return view('Dashboard.dashboard-LaboratorieEmployee.invoices.add_diagnosis',compact('invoice'));
    }
    public function update($request, $id)
    {
        $invoice = Laboratorie::findorFail($id);
 
        $invoice->update([
            'employee_id'=> auth()->user()->id,
            'description_employee'=> $request->description_employee,
            'case'=> 1,
        ]);
 
 
        if( $request->hasFile( 'photos' ) ) {
 
          foreach ($request->photos as $photo) {
              //Upload img
              $this->verifyAndStoreImageForeach($photo,'Laboratories','upload_Image',$invoice->id,'App\Models\Laboratorie');
          }
 
        }
        session()->flash('edit');
        return redirect()->route('invoicesRays.index');
 
    }

    
    public function completed_invoices(){
        $invoices = Laboratorie::where('case',1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard-LaboratorieEmployee.invoices.completed_invoices',compact('invoices'));
    }
    public function view_laboratories($id)
    {
        $laboratories = Laboratorie::findOrFail($id);
        if ($laboratories->employee_id != auth()->user()->id)
        {
            return redirect()->route('404');

        //   abort(404);
        }
        return view('Dashboard.dashboard-LaboratorieEmployee.invoices.patient_details',compact('laboratories'));
    }
  

  
 
    
}