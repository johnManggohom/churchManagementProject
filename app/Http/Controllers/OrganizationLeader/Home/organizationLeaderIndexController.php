<?php

namespace App\Http\Controllers\OrganizationLeader\Home;

use App\Http\Controllers\Controller;
use App\Models\OrganizationUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class organizationLeaderIndexController extends Controller
{
    public function index(){

        $leaderOfOrg = auth()->user()->organization_leader->organization_id;
   
        $organizationsAccepted = OrganizationUser::where('organization_id', $leaderOfOrg)->where('isAccepted', 1)->count();
        $organizationsNotAccepted = OrganizationUser::where('organization_id', $leaderOfOrg)->where('isAccepted', 0)->count();

    
        return view('organization-leader.home.leader-home-index', compact('organizationsAccepted', 'organizationsNotAccepted'));
    }


    public function pending(){
        return view('organization-leader.home.leader-pending');
    }

     public function accepted(){
        return view('organization-leader.home.leader-accepted');
    }

     public function pendingAccept($id){

     try{

            DB::transaction(function() use($id){
             $data=OrganizationUser::where('id', '=', $id)->get()->first();
            $data->isAccepted = 1;
            $data->update();
        }
    
    );

     return back()->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return back()->with('message', "Update Failed");
        }
    
    }

         public function pendingRemove($id){

     try{

            DB::transaction(function() use($id){
             $data=OrganizationUser::where('id', '=', $id)->get()->first();
            $data->isAccepted = 0;
            $data->update();
        }
    
    );

     return back()->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return back()->with('message', "Update Failed");
        }
    
    }
}
