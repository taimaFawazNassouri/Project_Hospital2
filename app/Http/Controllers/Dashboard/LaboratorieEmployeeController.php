<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeRepositoryInterface;


class LaboratorieEmployeeController extends Controller
{
    
    private $employee;

    public function __construct(LaboratorieEmployeeRepositoryInterface $employee)
    {
        $this->Employee = $employee;
    }
   
    public function index()
    {
        return $this->Employee->index();
    }

  
    public function store(Request $request)
    {
          return $this->Employee->store($request);

    }

    public function update(Request $request, string $id)
    {
        return $this->Employee->update($request, $id);

    }

   
    public function destroy(string $id)
    {
        return $this->Employee->destroy($id);

    }
}
