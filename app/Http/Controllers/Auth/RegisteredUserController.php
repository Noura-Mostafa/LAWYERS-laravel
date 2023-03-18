<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\company;
use Illuminate\Http\Request;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_name'=> ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    // dd($user);

    if($request->role_name=="company"){
        $company=company::create(['owner-id'=>$user->id]);
        $result=$company->id;
           $user->company_id =$result;
           $user->save();
    }
    Auth::login($user);
    $user->assignRole($request->role_name);//model has roles
    event(new Registered($user));



        // event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
