<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Doctor_dashboard\DoctorInvoiceRepositoryInterface;


class InvoiceController extends Controller
{
    private $InvoiceRepository;
  
    public function __construct(DoctorInvoiceRepositoryInterface $InvoiceRepository)
    {
        $this->Invoice = $InvoiceRepository;
    }  
    public function index()
    {
         return $this->Invoice->index();
    }
    public function review_invoices()
    {
        return $this->Invoice->review_invoices();
    }
    public function completed_invoices()
    {
        return $this->Invoice->completed_invoices();
    }
    public function show(String $id)
    {
        return $this->Invoice->show($id);
    }
  

   
}
