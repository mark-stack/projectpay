<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAsUser($id): RedirectResponse
    {
        //Login as this user
        Auth::loginUsingId($id);

        //Redirect to dashboard
        return to_route('dashboard');
    }
}
