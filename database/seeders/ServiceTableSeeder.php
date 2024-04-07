<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $singleservice = new Service();
        $singleservice->price = 500;
        $singleservice->status = 1; 
        $singleservice->save(); 

        // store trans

        $singleservice->name = 'كشف أخصائي' ;
        $singleservice->save(); 

    }
}
