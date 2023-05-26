<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Inertia\Response;

class ProjectController extends Controller
{
    public function index(): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','project_owner','contractor'])) abort(401);

        $user = auth()->user();
    
        //Admin sees all projects
        if($user->hasRole('admin')){
            $projects = ProjectResource::collection(Project::query()->latest()->paginate(10));
        }
        //Contractor sees client projects
        elseif($user->hasRole('contractor')){
            $company = $user->company;
            $projects = ProjectResource::collection($company?->clientProjects()->latest()->paginate(10));
        }
        //Project Owner sees just their own
        else{
            $projects = ProjectResource::collection($user->myProjects()->latest()->paginate(10));
        }
        
        return Inertia::render('Project/ProjectIndex', [
            'projects' => $projects
        ]);
    }

    public function create(): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','project_owner'])) abort(401);

        return Inertia::render('Project/ProjectCreate');
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','project_owner'])) abort(401);

        $data = array_merge($request->validated(),[
            'user_id' => Auth()->user()->id
        ]);
        
        Project::create($data);
        
        return to_route('projects.index');
    }

    public function show(Project $project)
    {
        //Not used
    }

    public function edit(Project $project): Response
    {      
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','project_owner'],$project)) abort(401);

        return Inertia::render('Project/ProjectEdit',compact('project'));
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin','project_owner'],$project)) abort(401);

        //Only admin can edit 'project_value_aud_dollars'. (permission: 'can-edit-project-price')
        $user = auth()->user();
        $validated = $request->validated();
        if($user->can('can-edit-project-price')){
            $project->update($validated);
        }
        else{
            //Remove 'project_value_aud_dollars' from validated array
            unset($validated['project_value_aud_dollars']);
            $project->update($validated);
        }

        return to_route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin'],$project)) abort(401);

        $project->delete();
        
        return to_route('projects.index');
    }
}
