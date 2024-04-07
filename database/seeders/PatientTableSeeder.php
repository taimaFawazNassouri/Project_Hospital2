<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;


class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = new Patient();
        $patient->email = 'taima@gmail.com'; 
        $patient->password = Hash::make('password'); 
        $patient->Date_Birth = '1999-03-06'; 
        $patient->Gender = '2'; 
        $patient->phone = '0983510765'; 
        $patient->Blood_Group = 'O+'; 
        $patient->save();

        // store trans

        $patient->name = 'taima nassouri';
        $patient->Address = 'hamah';
        $patient->save();




        $patient->save(); 
    }
}
