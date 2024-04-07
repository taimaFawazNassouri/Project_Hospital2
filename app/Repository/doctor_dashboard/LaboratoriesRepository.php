<?php


namespace App\Repository\Doctor_dashboard;
use App\Interfaces\Doctor_dashboard\LaboratorieRepositoryInterface;
use App\Models\Invoice;
use App\Models\Laboratorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class LaboratoriesRepository implements LaboratorieRepositoryInterface{
    public function store($request){
        try{
            Laboratorie::create([
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
            $patient_Laboratorie = Laboratorie::findOrFail($id);
            $patient_Laboratorie->update([
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
            Laboratorie::destroy($id);
            session()->flash('delete');
            return redirect()->back();
    
        }
       
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }
    public function show($id){

        // $rays = Ray::where('doctor_id', Auth::user()->id)->first();
        $laboratories = Laboratorie::findOrFail($id);
        if ($laboratories->doctor_id != auth()->user()->id)
         {
          // abort(404);
          return redirect()->route('404');
         }
        return view('Dashboard.doctor.invoices.view_laboratorie',compact('laboratories'));
      }
    


}