<?php

namespace App\Interfaces\RayEmployee;
use Illuminate\Http\Request;


interface RayEmployeeRepositoryInterface 
{
    
  // ###############  CRUD RayEmployee   ############################
  public function index();
  public function store(Request $request);
  public function update(Request $request, string $id);
  public function destroy(Request $request);

}