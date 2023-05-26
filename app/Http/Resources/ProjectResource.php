<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [ 
            'id' => $this->id,
            'user_id' => $this->user_id,
            'project_name' => $this->project_name,
            'description' => substr($this->description, 0, 50) . '...',
            'inclusions' => substr($this->inclusions, 0, 50) . '...',
            'exclusions' => substr($this->exclusions, 0, 50) . '...',
            'project_value_aud_dollars' => "$".number_format($this->project_value_aud_dollars,2),
            'user' => $this->user->name, 
            'contractor' => $this->company->company_name ?? null,
            'created_at' => $this->created_at->toDateString()
        ]; 
    }
}