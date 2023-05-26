<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request): RedirectResponse
    {
        //Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'role' => 'required|in:project_owner,contractor',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        //TESTING: Email verification disabled
        if(env('EMAIL_VERIFICATION_DISABLED')){
            $user->email_verified_at = now();
            $user->save();
        }

        //Assign role (Spatie)
        $user->assignRole($validated['role']);

        //Registration event
        event(new Registered($user));

        //Login
        Auth::login($user);

        //Redirect
        return to_route('dashboard');
    }
}
