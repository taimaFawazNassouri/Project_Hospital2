<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Appointment;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       Doctor::factory()->count(30)->create();
       $Appointments =Appointment::all();

       Doctor::all()->each(function($doctor) use ($Appointments)
       {
           $doctor->doctorAppointments()->attach
           ( $Appointments->random(rand(1,7))->pluck('id')->toArray());
       });

    
    // foreach ($doctors as $doctor) {
    //     $Appointments =Appointment::all()->random()->id;

    //     $doctor->doctorAppointments()->attach($Appointments);
    // }
      
        
    }
}
