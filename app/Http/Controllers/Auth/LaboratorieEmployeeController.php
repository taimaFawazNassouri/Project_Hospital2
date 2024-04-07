<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LaboratorieLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LaboratorieEmployeeController extends Controller
{
    
    public function store(LaboratorieLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::LABORATORIEEMPLOYEE);
        } else {
            return redirect()->back()->withErrors(['name'=>(trans('Dashboard/auth.failed'))]);
        
        }
        

      
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('laboratorie_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
