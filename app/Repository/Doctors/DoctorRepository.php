<?php
namespace App\Repository\Doctors;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Appointment;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Doctors\DoctorRepositoryInterface;



class DoctorRepository implements DoctorRepositoryInterface{
    use UploadImage;
    public function index(){
       $doctors = Doctor::with('doctorAppointments')->get();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('Dashboard.Doctors.create',compact('sections','appointments'));
    }

    public function store(Request $request){
        DB::beginTransaction(); //store in table image & doctors 

        try {

            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->save();

            // store trans
            $doctors->name = $request->name;
            $doctors->save();

            //store pivat table
            $doctors->doctorappointments()->attach($request->appointments);


            //Upload img
            $this->verfiyAndStoreImage($request,'photo','upload_Image','doctors',$doctors->id,'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit(String $id)
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        $doctor = Doctor::findOrFail($id);

        return view('Dashboard.Doctors.edit',compact('sections','appointments','doctor'));


    }
    
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {

            $doctor =Doctor::findOrFail($request->id);

            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->save();
            // store trans
            $doctor->name = $request->name;
            $doctor->save();
            
            //Ubdate pivat TABLE
            $doctor->doctorAppointments()->sync($request->appointments);


            //Upload img
            if($request->has('photo'))
            {
                if($doctor->image){
                    $old_img = $doctor->image->filename;
                    $this->deleteAttachment('upload_Image','doctors/'.$old_img,$request->id,$old_img);    
                }
                $this->verfiyAndStoreImage($request,'photo','upload_Image','doctors',$request->id,'App\Models\Doctor');

            }
           

            DB::commit();
            session()->flash('edit');
            return redirect()->back();

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_password(Request $request)
    {
        try
        {
            $doctor = Doctor::findOrFail($request->id);
            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);
            session()->flash('edit');
            return redirect()->back();
        }
        catch(\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }



    }

    public function update_status(Request $request)
    {
        try{
            $doctor = Doctor::findOrFail($request->id);
            $doctor->update([
                'status'=>$request->status
            ]);
            session()->flash('edit');
            return redirect()->back();

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }

    }

    



    public function destroy($request)
    {
        if ($request->page_id==1) 
        {
            if ($request->filename) 
            {
                $this->deleteAttachment('upload_Image','doctors/'.$request->image->filename,$request->id,$request->image->filename);
            }
            Doctor::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Doctors.index');


        }
        else
        {
            $delete_select_id = explode(",",$request->delete_select_id);
            foreach ($delete_select_id as $ids_doctors) {
                $doctor = Doctor::findOrFail($ids_doctors);
                if($doctor->image){
                    $this->deleteAttachment('upload_Image','doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);

                }
               
            }
        }
        Doctor::destroy($delete_select_id);
        session()->flash('delete');
        return redirect()->route('Doctors.index');
           

    }
    
   
   
   
    

    
    



}