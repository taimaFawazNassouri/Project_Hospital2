<?php

namespace App\Interfaces\Patients;
use Illuminate\Http\Request;


interface PatientRepositoryInterface 
{
    
  // ###############  CRUD Patients   ############################
  public function index();
  public function create();
  public function show(String $id);
  public function store(Request $request);
  public function edit(String $id);
  public function update(Request $request);
  public function destroy(Request $request);

}