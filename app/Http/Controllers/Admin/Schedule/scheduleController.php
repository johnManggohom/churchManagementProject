<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use App\Models\Appointment;
use Carbon\Carbon;
use Doctrine\DBAL\Schema\Schema;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class scheduleController extends Controller
{
    public function index($id){
        
        $appointment = Appointment::where('id', $id)->get()->first();

        $schedule = Schedule::get()->first();
        return view('admin.schedule.schedule-index' ,compact('appointment', 'schedule'));
    }

    public function store(Request $request, $id){

        if($request->time != null){
                if(count($request->time) < 2){
                  return back()->with('messageerror', "Schedule Denied. Must pick start and end time slots.");
        }
        }else{
 return back()->with('messageerror', "Schedule Denied. Must pick time slot.");
        }

 
  
        try{



             DB::transaction(function() use($request,$id){
                    $appointment = Appointment::where('id', $id)->get()->first();
                    $appointment->status = 'finished';
                    $appointment->update();

                    
        $anotherArray = $request->time;

      
                            $firstValue = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse((head($anotherArray))) )->format('Y-m-d H:i:s'); 
                             $lastValue =   Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse(last($anotherArray)) )->format('Y-m-d H:i:s');


   

            Schedule::create([

                'user_id'=> $appointment->user_id,
                 'appointment_id'=> $request->id,
                'start_time'=>$firstValue,
                'endTime'=>$lastValue,
                'status'=>'accepted',
                'message' => $request->schedule_description,
                'ocassion_id'=> $appointment->ocassion_id,
   

            ]);

        }
    
    );
        return  back()->with('message', 'Appointment Succesful');

        }catch(Exception $e){
              return back()->with('message', "Appointment Denied. Something went wrong try again". $e->getMessage());
        }

        

      

    }

}
