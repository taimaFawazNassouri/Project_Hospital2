<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;


class DiagnosisController extends Controller
{
  
    private $DiagnosisRepository;
  
    public function __construct(DiagnosisRepositoryInterface $DiagnosisRepository)
    {
        $this->Diagnosis = $DiagnosisRepository;
    }
  
    public function store(Request $request)
    {
        return $this->Diagnosis->store($request);
    }

   
    public function show(string $id)
    {
        return $this->Diagnosis->show($id);

    }
    public function add_review(Request $request)
    {
        return $this->Diagnosis->add_review($request);
    }

 
  
}
