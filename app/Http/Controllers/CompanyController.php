<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Http\Resources\CompanyResource;
use Inertia\Response;

class CompanyController extends Controller
{
    public function index(): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin'])) abort(401);

        $companies = CompanyResource::collection(Company::query()->latest()->paginate(10));

        return Inertia::render('Company/CompanyIndex', compact('companies'));
    }

    public function create(): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','contractor'])) abort(401);

        return Inertia::render('Company/CompanyCreate');
    }

    public function store(CompanyRequest $request): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['contractor'])) abort(401);

        $data = array_merge($request->validated(),[
            'user_id' => Auth()->user()->id
        ]);
        
        Company::create($data);
        
        return to_route('dashboard');
    }

    public function show(Company $company)
    {
        //Not used
    }

    public function edit(Company $company): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','contractor'],$company)) abort(401);

        return Inertia::render('Company/CompanyEdit',compact('company'));
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','contractor'],$company)) abort(401);

        $company->update($request->validated());

        //If Admin redirect to index, otherwise dashboard
        return auth()->user()->hasRole('admin') 
            ? to_route('companies.index')
            : to_route('dashboard');
    }

    public function destroy(Company $company): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin'],$company)) abort(401);

        $company->delete();
        
        return to_route('companies.index');
    }
}
