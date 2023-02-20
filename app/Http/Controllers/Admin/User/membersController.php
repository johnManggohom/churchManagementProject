<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\OrganizationLeader;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

    class membersController extends Controller
{
        public function index()
    { 
       
        return view('admin.users.members.members-index');
    }


           public function show($user)
    {

          
        $isLeader = OrganizationLeader::where('user_id', '=',  $user)->get()->first();
        

$occupied = OrganizationLeader::where('organization_id', '=', $isLeader->organization_id)->where('is_leader', '=', 1)->get()->first();
      
        $user = User::where('id', $user)->get()->first();

        return view('admin.users.members.members-show', compact('user', 'isLeader', 'occupied'));
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


        public function removeLeader($id){



        try{

            DB::transaction(function() use($id){
             $data=OrganizationLeader::where('user_id', '=', $id)->get()->first();
            $data->is_leader = 0;
            $data->update();


            $user = User::where('id', '=', $data->user_id)->get()->first();
            $user->removeRole('organization leader');
        }
    
    );

     return back()->with('message', "Leadership  Updated");

        }catch(Exception $exception){
                return back()->with('message', "Update Failed");
        }
        
    }

            public function acceptLeader($id){
        try{

            DB::transaction(function() use($id){
             $data=OrganizationLeader::where('user_id', '=', $id)->get()->first();
            $data->is_leader = 1;
            $data->update();
            $user = User::where('id', $id)->get()->first();
              $user->assignRole('organization leader');
        }
    
    );

     return back()->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return back()->with('message', "Update Failed".$exception->getMessage());
        }
        
    }
}
