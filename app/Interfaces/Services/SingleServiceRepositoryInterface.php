<?php
namespace App\Interfaces\Services;
use Illuminate\Http\Request;

interface SingleServiceRepositoryInterface
{
  // ###############  CRUD single services   ############################
    public function index();
    public function store(Request $request);
    public function update(Request $request);
    public function destroy(Request $request);


}