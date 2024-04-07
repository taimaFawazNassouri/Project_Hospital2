<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('appointments')->delete();
        $Appointments = [
            ['name' => 'السبت'],
            ['name' => 'الأحد'],
            ['name' => 'الأثنين'],
            ['name' => 'الثلاثاء'],
            ['name' => 'الأربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعة'],

        ];
        foreach($Appointments as $Appointment){
            Appointment::create($Appointment);
        }
    }
}
