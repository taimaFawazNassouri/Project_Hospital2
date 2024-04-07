<?php

namespace App\Interfaces\Insurances;
use Illuminate\Http\Request;


interface InsuranceRepositoryInterface 
{
    
  // ###############  CRUD Insurances   ############################
  public function index();
  public function create();
  public function store(Request $request);
  public function edit(String $id);
  public function update(Request $request);
  public function destroy(Request $request);







}