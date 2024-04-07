<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RayEmployee;
use Illuminate\Support\Facades\Hash;



class RayEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'jamal al saed';
        $ray_employee->email = 'employee@gmail.com'; 
        $ray_employee->password = Hash::make('password'); 
        $ray_employee->save(); 
    }
}
