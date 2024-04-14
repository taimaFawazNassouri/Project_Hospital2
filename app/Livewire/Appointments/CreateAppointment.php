<?php

namespace App\Livewire\Appointments;
use App\Models\Section;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Events\PatientAppointmentCreate;


use Livewire\Component;

class CreateAppointment extends Component
{
    public $message=false;
    public $sections, $section_id, $doctors, $doctor, $name, $phone, $email, $notes, $appointment_patient;

    public function mount(){
        $this->sections = Section::get();
        $this->doctors =[];

    }
    public function render()
    {
        return view('livewire.appointments.create-appointment',[
            'sections' =>Section::get()
        ]);
    }
    public function getDoctor(){
        $this->doctors = Doctor::where('section_id',$this->section_id)->get();
        $this->doctor= $this->doctors->first()->id;

    }
    public function store(){
       $appointment_info = Appointment::where('doctor_id',$this->doctor)->where('appointment_patient',$this->appointment_patient)->where('type','unComplete')->count();
       $doctor_info = Doctor::findOrFail($this->doctor);
       if ($appointment_info >= $doctor_info->number_of_statements) {      
        session()->flash('doctorLimit', trans('Doctors.doctor_limit'));
            $this->reset('appointment_patient');
        } else {
            Appointment::create([
                'doctor_id' => $this->doctor,
                'section_id' => $this->section_id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'notes' => $this->notes,
                'appointment_patient' => $this->appointment_patient,
            ]);
            $data = [
                'name' => $this->name,
                'doctor' => $this->doctor,
                'section' => $this->section_id,
            ];
            event(new PatientAppointmentCreate($data));
            $this->message = true;
            $this->reset('section_id', 'doctor', 'name', 'email', 'phone', 'notes','appointment_patient');
            $this->doctors = [];
        
            }
    }
        
       
   
   
}
