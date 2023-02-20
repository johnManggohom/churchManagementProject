<?php

namespace App\Http\Controllers\Admin\OrganizationLeader;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class leaderScheduleController extends Controller
{
    public function index(){
        return view('organization-leader.appointment.schedule.leader-schedule-index');
    }

        public function update($id){

        try{
             DB::transaction(function() use($id){
             $data= Schedule::find($id);
            $data->status = 'canceled';
            $data->update();
        }
    
    );

     return to_route('leader.schedule.index')->with('message', "Schedule Updated");

        }catch(Exception $exception){
                return to_route('leader.schedule.index')->with('message', "Update Failed");
        }

       return  to_route('user.appointment');
    }
}
