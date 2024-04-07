<?php

namespace App\Interfaces\Patient_dashboard;
use Illuminate\Http\Request;


interface InvoicePatientRepositoryInterface {
    public function invoices();
    public function laboratories();
    public function rays();
    public function ViewRays($id);
    public function ViewLaboratories($id);
    public function payments();

   
}