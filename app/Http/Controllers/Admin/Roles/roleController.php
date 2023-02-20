<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
        public function index(){
      $user=Auth::user();
        $roles = Role ::whereNotIn('name',['admin'])->get();
        return view('admin.roles.role-index', compact('roles', 'user') );
        
    }

           public function create(){
      return view('admin.roles.role-create');
    }

        public function store(Request $request){
        $validated = $request->validate(['name'=>['required', 'min:3']]);

        

        if(Role::where('name',$validated)->count() == 0 ){
          Role::create($validated);
              return to_route('admin.roles.role-index');
          }else{
            return to_route('admin.roles.index');
          }




    
    }
}
