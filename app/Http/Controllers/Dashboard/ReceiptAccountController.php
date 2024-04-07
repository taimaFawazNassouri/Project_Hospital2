<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Finance\ReceiptRepositoryInterface;
use Illuminate\Http\Request;


class ReceiptAccountController extends Controller
{
   
    private $ReceiptAccount;

    public function __construct(ReceiptRepositoryInterface $ReceiptAccount)
    {
        $this->ReceiptAccount = $ReceiptAccount;
    }
    public function index()
    {
        return $this->ReceiptAccount->index();
    
    }

   
    
    public function create()
    {
        return $this->ReceiptAccount->create();
    }
    public function show(string $id)
    {
        return $this->ReceiptAccount->show($id);
    }
   
    public function store(Request $request)
    {
        return $this->ReceiptAccount->store($request);
    }

   

   
    public function edit(string $id)
    {
        return $this->ReceiptAccount->edit($id);
    }

   
    public function update(Request $request)
    {
        return $this->ReceiptAccount->update($request);
    }

  
    public function destroy(Request $request)
    {
        return $this->ReceiptAccount->destroy($request);
    }
}
