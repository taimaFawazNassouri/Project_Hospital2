<?php


namespace App\Repository\Doctor_dashboard;
use App\Interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Invoice;
use App\Models\Diagnostic;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;




class DiagnosisRepository implements DiagnosisRepositoryInterface{
  public function store($request){
   DB::beginTransaction();
   try {
   
    $this->invoice_status($request->invoice_id,3);
    $diagnosis = new Diagnostic();
    $diagnosis->date = date('Y-m-d');
    $diagnosis->review_date = date('Y-m-d H:i:s');
    $diagnosis->patient_id = $request->patient_id;
    $diagnosis->invoice_id =$request->invoice_id;
    $diagnosis->doctor_id =$request->doctor_id;
    $diagnosis->diagnosis = $request->diagnosis;
    $diagnosis->medicine = $request->medicine;
    $diagnosis->save();


    DB::commit(); 
    session()->flash('add');
    return redirect()->back();
   }

   catch (\Exception $e)
    {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }



  }
  public function show($id){
    $patient_records = Diagnostic::where('patient_id',$id)->get();
    return view('Dashboard.doctor.invoices.patient_record',compact('patient_records'));

  }
  public function add_review($request){
    DB::beginTransaction();
   try {
    $this->invoice_status($request->invoice_id,2);
   
    $diagnosis = new Diagnostic();
    $diagnosis->date = date('Y-m-d');
    $diagnosis->review_date = date('Y-m-d H:i:s');
    $diagnosis->patient_id = $request->patient_id;
    $diagnosis->invoice_id =$request->invoice_id;
    $diagnosis->doctor_id =$request->doctor_id;
    $diagnosis->diagnosis = $request->diagnosis;
    $diagnosis->medicine = $request->medicine;
    $diagnosis->save();


    DB::commit(); 
    session()->flash('add');
    return redirect()->back();
   }

   catch (\Exception $e)
    {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }
  public function invoice_status($invoices_id,$id_status){
    $invoices_status = Invoice::findOrFail($invoices_id);
    $invoices_status->update([
      'invoice_status'=>$id_status,
    ]);
  }


  
}