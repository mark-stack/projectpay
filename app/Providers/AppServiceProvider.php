<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Company;
use App\Models\Project;
use App\Policies\CompanyPolicy;
use App\Policies\ProjectPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Company::class => CompanyPolicy::class,
        Project::class => ProjectPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
