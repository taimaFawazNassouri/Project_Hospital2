<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Http\Requests\StoreSingleServiceRequest;
use Illuminate\Http\Request;


class SingleServiceController extends Controller
{
    private $SingleServiceRepository;

    public function __construct(SingleServiceRepositoryInterface $SingleServiceRepository)
    {
        $this->SingleService = $SingleServiceRepository;

    }
    public function index()
    {
        return $this->SingleService->index();
    }

  
    public function store(StoreSingleServiceRequest $request)
    {
        return $this->SingleService->store($request);
    }

 
   
    public function update(Request $request)
    {
       return $this->SingleService->update($request);

        
    }

    public function destroy(Request $request)
    {
        return $this->SingleService->destroy($request);

    }
}
