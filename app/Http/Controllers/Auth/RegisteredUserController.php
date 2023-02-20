<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationLeader;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $roles = Role::all();
        $organizations = Organization::all();
        return view('auth.register', compact('roles', 'organizations'));
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
            'middle' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'phone' => array('required','regex:/(09)[0-9]{9}/'),
            'birth_date'=>['required'],
              'role'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        $user = User::create([
            'name' => $request->name,
            'middle_name' => $request->middle,
              'last_name' => $request->last,
            'phone_number' => $request->phone,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'age'=>Carbon::parse($request->birth_date)->age,
            'role_id'=>$request->role,
             'isRoleAccepted'=>0,
            'password' => Hash::make($request->password),
        ]);


        if($request->organization_id != null){
            OrganizationLeader::create([

                'user_id'=>$user->id,
                'organization_id'=>$request->organization_id,
                'is_leader'=> 0

            ]);
        }

        

        $user->assignRole('user');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
