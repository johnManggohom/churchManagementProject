<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
       public function index()
    { 
       
        return view('admin.users.user-index');
    }

        public function show(User $user)
    {
        $roles = Role::all()->where('name', '!=', 'user')->where('name', '!=', 'organization leader');


        return view('admin.users.user-role', compact('user', 'roles'));
    }

        public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

      if($request->role == 'admin'){
        $user->removeRole('staff');
      }elseif($request->role == 'staff'){
        $user->removeRole('admin');
      }

        $user->assignRole($request->role)->update();
        $user->isRoleAccepted = 1;
        $user->update();
        return back()->with('message', 'Role assigned.');
    }

        public function removeRole(User $user, Role $role)
    {

        if ($user->hasRole($role)) {
            $user->removeRole($role)->update();
                $user->isRoleAccepted = 0;
        $user->update();
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }


    public function updateBlock($id){
        $user = User::find($id);
        if($user->isBlock == 1){
            $user->isBlock = 0;
        }elseif($user->isBlock == 0){

            $user->isBlock = 1;
        }

        $user->update();

         return back()->with('message', 'User blocked.');

    }
}
