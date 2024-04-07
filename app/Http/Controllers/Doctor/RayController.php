<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Doctor_dashboard\RayRepositoryInterface;


class RayController extends Controller
{
    private $RayRepository;
  
    public function __construct(RayRepositoryInterface $RayRepository)
    {
        $this->Ray = $RayRepository;
    }  

    public function store(Request $request)
    {
        return $this->Ray->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->Ray->update($request,$id);

    }

    
    public function destroy(string $id)
    {
        return $this->Ray->destroy($id);

    }
}
