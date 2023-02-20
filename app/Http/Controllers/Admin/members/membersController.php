<?php

namespace App\Http\Controllers\Admin\members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class membersController extends Controller
{
    public function index(){
        return view('admin.members.members_index');
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


    public function getDetails($member){
        $users = User::where('id', $member)->with('organization')->get();
        
return view('admin.members.members_details', compact('users')); 
    }
}
