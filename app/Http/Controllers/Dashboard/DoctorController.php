<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Image;
use App\Models\Appointment;

class DoctorController extends Controller
{
    private $DoctorRepository;
  
    public function __construct(DoctorRepositoryInterface $DoctorRepository)
    {
        $this->Doctor = $DoctorRepository;
    }   
    public function index()
    {
        return $this->Doctor->index();
       
    }

    
    public function create()
    {
        return $this->Doctor->create();
    }

   
    public function store(StoreDoctorRequest $request)
    {
        return $this->Doctor->store($request);
    }

    
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
         return $this->Doctor->edit($id);
    }

    
    public function update(Request $request)
    {
         return $this->Doctor->update($request);
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        return $this->Doctor->update_password($request);

    }
    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
        ]);
        return $this->Doctor->update_status($request);
    }

   

    public function destroy(Request $request)
    {
       return $this->Doctor->destroy($request);
    }
}
