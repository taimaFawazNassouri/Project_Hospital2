<?php

namespace App\Interfaces\Doctor_dashboard;
use Illuminate\Http\Request;


interface DoctorInvoiceRepositoryInterface {
    public function index();
    public function review_invoices();
    public function completed_invoices();
    public function show($id);


}