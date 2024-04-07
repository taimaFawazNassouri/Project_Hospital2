<?php

namespace App\Http\Controllers\RayEmployee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddDiagnosisRequest;
use App\Interfaces\RayEmployee_dashboard\InvoiceRepositoryInterface;


class InvoiceController extends Controller
{
    private $InvoiceRepository;
  
    public function __construct(InvoiceRepositoryInterface $InvoiceRepository)
    {
        $this->InvoiceRay = $InvoiceRepository;
    }  
    public function index()
    {
        return $this->InvoiceRay->index();
    }

 
    public function edit(string $id)
    {
        return $this->InvoiceRay->edit($id);
    }

    
    public function update(Request $request, string $id)
    {
        return $this->InvoiceRay->update($request,$id);

    }

   
    public function completed_invoices()
    {
        return $this->InvoiceRay->completed_invoices();

    }
    public function view_rays(String $id)
    {
        return $this->InvoiceRay->view_rays($id);

    }
}
