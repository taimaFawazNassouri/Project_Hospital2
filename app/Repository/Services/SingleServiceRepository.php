<?php
namespace App\Repository\Services;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Interfaces\Services\SingleServiceRepositoryInterface;

class SingleServiceRepository implements SingleServiceRepositoryInterface{

    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.Single_Service.index',compact('services'));
        
    }

    public function store($request)
    {
        try{
            $singleservice = new Service();
            $singleservice->price = $request->price;
            $singleservice->description = $request->description;
            $singleservice->status = 1;
            $singleservice->save();

            //store trans

            $singleservice->name = $request->name;
            $singleservice->save();


            session()->flash('add');
            return redirect()->route('Single_Service.index');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
        
    }
    public function update($request)
    {
       try{
           $singleservice = Service::findOrFail($request->id);
           $singleservice->price = $request->price;
           $singleservice->description = $request->description;
           $singleservice->status = $request->status;
           $singleservice->save();

           //update service trans
           $singleservice->name = $request->name;
           $singleservice->save();

           session()->flash('edit');
           return redirect()->route('Single_Service.index');

       }
       catch (\Exception $e) {
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

        
    }


    public function destroy($request)
    {
        // $singleservice = Service::findOrFail($request->id)->delete();
        Service::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Single_Service.index');
        
    }

}