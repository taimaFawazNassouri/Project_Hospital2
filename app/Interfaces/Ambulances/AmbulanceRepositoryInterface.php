<?php

namespace App\Interfaces\Ambulances;
use Illuminate\Http\Request;


interface AmbulanceRepositoryInterface 
{
    
  // ###############  CRUD Ambulance   ############################
  public function index();
  public function create();
  public function store(Request $request);
  public function edit(String $id);
  public function update(Request $request);
  public function destroy(Request $request);







}