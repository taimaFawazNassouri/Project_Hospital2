<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Doctor_dashboard\LaboratorieRepositoryInterface;


class LaboratorieController extends Controller
{
    private $LaboratorieRepository;
  
    public function __construct(LaboratorieRepositoryInterface $LaboratorieRepository)
    {
        $this->Laboratorie = $LaboratorieRepository;
    }  
    public function store(Request $request)
    {
       return $this->Laboratorie->store($request);
    }

  
    public function update(Request $request, string $id)
    {
        return $this->Laboratorie->update($request,$id);

    }
    public function show(String $id)
    {
        return $this->Laboratorie->show($id);
    }
    
    public function destroy(string $id)
    {
        return $this->Laboratorie->destroy($id);

    }
}
