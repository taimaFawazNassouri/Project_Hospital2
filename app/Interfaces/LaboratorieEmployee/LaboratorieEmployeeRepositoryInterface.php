<?php

namespace App\Interfaces\LaboratorieEmployee;
use Illuminate\Http\Request;


interface LaboratorieEmployeeRepositoryInterface 
{
    
  // ###############  CRUD LaboratorieEmployee   ############################
  public function index();
  public function store(Request $request);
  public function update(Request $request, string $id);
  public function destroy(Request $request);

}