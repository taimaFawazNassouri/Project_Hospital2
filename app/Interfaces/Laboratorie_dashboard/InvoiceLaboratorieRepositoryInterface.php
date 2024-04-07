<?php

namespace App\Interfaces\Laboratorie_dashboard;
use Illuminate\Http\Request;


interface InvoiceLaboratorieRepositoryInterface {
    public function index();
    public function edit($id);
    public function update($request,$id);
    public function completed_invoices();
    public function view_laboratories($id);





   
}