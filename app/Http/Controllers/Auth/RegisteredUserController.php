<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'string', 'max:255', 'unique:fonctionnaires'],
            'sexe' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $fonctionnaire = Fonctionnaire::create([
            'username' => $request->username,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'mot_de_passe' => Hash::make($request->password),
            'admin'=> $request->admin ? true : false,
        ]);

        event(new Registered($fonctionnaire));

        Auth::login($fonctionnaire);

        return redirect(RouteServiceProvider::HOME);
    }
}
