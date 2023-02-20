<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use App\Mail\statusMail;
use App\Models\Appointment;
use App\Models\Ocassion;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class appointmentController extends Controller
{
    public function index(){

        // $events = array();
        
        $appointments = Appointment::all();

        // foreach($appointments as $appointment){
        //     $events[]= [

        //         'title'=>$appointment->ocassion->name,
        //         'start'=>$appointment->start_time,
        //         'end'=>$appointment->endTime,
        //     ];
        // }

      

    

        return view('admin.appointment.index', compact('appointments'));
    }


    public function appointmentCalendar(){

                $appointments = Appointment::all();

               
          return view('admin.appointment.admin-appointment-calendar', compact('appointments'));

    }

    public function edit($appointment_id){

        $appointment= Appointment::where('id', $appointment_id)->first();

        return view('admin.appointment.admin-edit-appointment', compact('appointment'));
    }

    public function update(Request $request, $id){
        

  

        try{

             DB::transaction(function() use($request, $id){
             $data= Appointment::find($id);
            $data->status = $request->status;
            $data->update();

            Mail::to($data->user->email)->send(new statusMail($data));
        }
    
    );

     return to_route('admin.appointment')->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return to_route('admin.appointment')->with('message', "Update Failed". $exception->getMessage());
        }
        
            

       return  to_route('admin.appointment');
    }


       public function destroy(Appointment $appointment)
    {
      
         $appointment->delete();
           return to_route('admin.appointment')->with('message', 'Appointment deleted');
        //
    }

    public function ajaxUpdate(Request $request)
{


    $appointment = Appointment::with('user')->findOrFail($request->appointment_id);
    $appointment->update($request->all());

    return response()->json(['appointment' => $appointment]);
}

public function  followup($id){

    $appointment = Appointment::where('id', $id)->get()->first();

  $ocassions = Ocassion::all()->pluck('id', 'name');
   return view('admin.appointment.admin-followup', compact('appointment', 'ocassions'));
}

public function followStore(Request $request, $id){
   

   $request->validate([
    'time' => 'required',
]);
                      
          try{
          DB::transaction(function() use($request,$id){
                $appointment = Appointment::where('id', '=', $id)->get()->first();
                $appointment->status = 'finished';
                $appointment->isFollow = 1;
                $appointment->update();

                
               $dateTime = Carbon::parse($request->time);

       
        $gaga = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');
         $request['end_time'] = Carbon::parse( $gaga)->addHour();
            Appointment::create([

                'user_id'=> $appointment->user_id,
                'start_time'=>$gaga,
                'endTime'=>$request->end_time,
                'status'=>'accepted',
                'message' => $appointment->message,
                'ocassion_id'=> $appointment->ocassion_id,
                    'isFollow'=>0,
                'follow_number'=>$appointment->follow_number +1,

            ]);

        }
    
    );

    return  back()->with('message', 'Appointment Succesful');
        }catch(\Exception $exception){
            return back()->with('message', "Appointment Denied. Something went wrong try again". $exception->getMessage());
        }


               
             

}
}
