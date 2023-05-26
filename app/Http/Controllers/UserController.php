<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Http\Resources\UserResource;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        //Roles & ownership check
        if(!$this->allowedRoles(['admin'])) abort(401);

        $users = UserResource::collection(User::query()->orderBy('id', 'desc')->paginate(10));
       
        return Inertia::render('User/UserIndex', [
            'users' => $users
        ]);
    }
}
