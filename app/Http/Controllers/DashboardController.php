<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function dashboard(): Response
    {
        $user = auth()->user();
        $company = $user->company;
        $clientProjects = $company?->clientProjects()->get();
        $myProjectsCount = $user->myProjects()->count();

        return Inertia::render('Dashboard',compact('company','clientProjects','myProjectsCount'));
    }
}
