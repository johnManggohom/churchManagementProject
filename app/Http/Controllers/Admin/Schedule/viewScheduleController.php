<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Mail\statusMail;
use App\Models\Admin\Schedule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class viewScheduleController extends Controller
{
    public function index(){
     return  view('admin.schedule.shedule-view.schedule-view-index');
    }

    
    public function edit($appointment_id){



        $appointment= Schedule::where('id', $appointment_id)->first();

        return view('admin.schedule.shedule-view.admin-edit-schedule', compact('appointment'));
    }

        public function update(Request $request, $id){
        
            
        try{

             DB::transaction(function() use($request, $id){
             $data= Schedule::find($id);

            $data->status = $request->status;
            $data->update();

            // Mail::to($data->user->email)->send(new statusMail($data));
        }
    
    );

     return to_route('admin.schedule-view.index')->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return to_route('admin.schedule-view.index')->with('message', "Update Failed". $exception->getMessage());
        }
        
            

       return  to_route('admin.schedule-view.index');
    }


        public function appointmentCalendar(){

                $appointments = Schedule::all();

               
          return view('livewire.admin.schedule.admin-schedule-calendar', compact('appointments'));

    }
}
