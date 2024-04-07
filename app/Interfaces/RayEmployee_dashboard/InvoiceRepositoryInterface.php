<?php

namespace App\Interfaces\RayEmployee_dashboard;
use Illuminate\Http\Request;


interface InvoiceRepositoryInterface {
    public function index();
    public function edit($id);
    public function update($request,$id);
    public function completed_invoices();
    public function view_rays($id);





   
}