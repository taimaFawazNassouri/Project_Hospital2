<?php

namespace App\Http\Controllers\Dashboard;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
   
   
    private $Payment;

    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }
    public function index()
    {
        return $this->Payment->index();
    
    }

   
    
    public function create()
    {
        return $this->Payment->create();
    }

    public function show(String $id)
    {
        return $this->Payment->show($id);
    }

   
    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }

   

   
    public function edit(string $id)
    {
        return $this->Payment->edit($id);
    }

   
    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }

  
    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}
