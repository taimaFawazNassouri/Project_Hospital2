<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Patient_dashboard\InvoicePatientRepositoryInterface;


class PatientInvoicesController extends Controller
{
    private $InvoicePatient;
  
    public function __construct(InvoicePatientRepositoryInterface $InvoicePatient)
    {
        $this->Invoice = $InvoicePatient;
    }  
    public function invoices()
    {
        return $this->Invoice->invoices();
    }
 
    public function laboratories()
    {
        return $this->Invoice->laboratories();
    }

    public function rays()
    {
        return $this->Invoice->rays();
    }
    public function ViewRays(String $id)
    {
        return $this->Invoice->ViewRays($id);
    }
    public function ViewLaboratories(String $id)
    {
        return $this->Invoice->ViewLaboratories($id);
    }
    public function payments()
    {
        return $this->Invoice->payments();
    }


}
