<?php

namespace App\Interfaces\Doctors;
use Illuminate\Http\Request;


interface DoctorRepositoryInterface 
{
    
  // ###############  CRUD Doctors   ############################
  public function index();
  public function create();
  public function store(Request $request);
  public function edit(String $id);
  public function update(Request $request);
  public function update_status(Request $request);
  public function update_password(Request $request);
  public function destroy(Request $request);







}