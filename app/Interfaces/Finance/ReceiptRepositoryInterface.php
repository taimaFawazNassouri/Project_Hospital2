<?php

namespace App\Interfaces\Finance;
use Illuminate\Http\Request;


interface ReceiptRepositoryInterface 
{
    
  // ###############  CRUD Receipt   ############################
  public function index();
  public function create();
  public function show(String $id);
  public function store(Request $request);
  public function edit(String $id);
  public function update(Request $request);
  public function destroy(Request $request);

}