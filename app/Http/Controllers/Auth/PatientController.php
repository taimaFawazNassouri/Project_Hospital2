<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\PatientLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function store(PatientLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::PATIENT);
        } else {
            return redirect()->back()->withErrors(['name'=>(trans('Dashboard/auth.failed'))]);
        
        }
        

      
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
 }
