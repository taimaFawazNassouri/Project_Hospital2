<?php

namespace App\Http\Controllers\Laboratorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Laboratorie_dashboard\InvoiceLaboratorieRepositoryInterface;


class InvoiceLaboratorieController extends Controller
{
    private $InvoiceRepository;
  
    public function __construct(InvoiceLaboratorieRepositoryInterface $InvoiceRepository)
    {
        $this->InvoiceLaboratorie = $InvoiceRepository;
    }  
    public function index()
    {
        return $this->InvoiceLaboratorie->index();
    }

 
    public function edit(string $id)
    {
        return $this->InvoiceLaboratorie->edit($id);
    }

    
    public function update(Request $request, string $id)
    {
        return $this->InvoiceLaboratorie->update($request,$id);

    }

   
    public function completed_invoices()
    {
        return $this->InvoiceLaboratorie->completed_invoices();

    }
    public function view_laboratories(String $id)
    {
        return $this->InvoiceLaboratorie->view_laboratories($id);

    }
}
