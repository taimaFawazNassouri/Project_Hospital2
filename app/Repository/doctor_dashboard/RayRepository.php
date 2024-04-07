<?php


namespace App\Repository\doctor_dashboard;
use App\Interfaces\doctor_dashboard\RayRepositoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RayRepository implements RayRepositoryInterface{
    public function store($request){
        try{
            Ray::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'doctor_id'=>$request->doctor_id,
                'patient_id'=>$request->patient_id,

            ]);
            session()->flash('add');
            return redirect()->back();

        }
        catch (\Exception $e)
        {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        

    }

    public function update($request, $id){
        try{
            $Ray = Ray::findOrFail($id);
            $Ray->update([
                'description'=>$request->description,

            ]);
            session()->flash('edit');
            return redirect()->back();

        }
        catch (\Exception $e)
        {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy($id){
        try{
            Ray::destroy($id);
            session()->flash('delete');
            return redirect()->back();
    
        }
       
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }

}