<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [ 
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company_name' => $this->company_name,
            'company_email' => $this->company_email,
            'address' => $this->address,
            'website' => $this->website,
            'user' => $this->user->name, 
            'active_projects_qty' => $this->clientProjects()->count(),
            'created_at' => $this->created_at->toDateString()
        ]; 
    }
}
