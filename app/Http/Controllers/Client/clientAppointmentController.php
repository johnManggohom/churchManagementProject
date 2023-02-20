<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Ocassion;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientAppointmentController extends Controller
{
    public function index(){

        $ocassions = Ocassion::all()->pluck('id', 'name');


        return view('users.appointments.appointmentForm', compact('ocassions'));
    }

    public function store(Request $request){

        $request->validate([
    'time' => 'required',
    'message' => 'nullable|max:100',
    'ocassion' => 'required|integer',
]);



         if( $gaga = Appointment::where('user_id', auth()->user()->id)->where('ocassion_id', $request->ocassion)->whereDate('start_time', Carbon::today())->first()){
                   return  to_route('client.appointment')->with('messageerror', 'You already had an appointment for ocassion '. $gaga->ocassion->name);

             }else{

                      
          try{
        DB::transaction(function() use($request){
               $dateTime = Carbon::parse($request->time);

        $gaga = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');
         $request['end_time'] = Carbon::parse( $gaga)->addHour();
            Appointment::create([

                'user_id'=> auth()->user()->id,
                'start_time'=>$gaga,
                'endTime'=>$request->end_time,
                'status'=>'pending',
                'message' => $request->message,
                'ocassion_id'=> $request->ocassion

            ]);

        }
    
    );

    return  to_route('client.appointment')->with('message', 'Appointment Succesful');
        }catch(\Exception $exception){
            return to_route('client.appointment')->with('message', "Appointment Denied. Something went wrong try again". $exception->getMessage());
        }


               
             }


    }

        public function storeHome(Request $request){

        $request->validate([
    'time' => 'required',
    'message' => 'nullable|max:100',
    'ocassion' => 'required|integer',
]);



         if(Appointment::where('user_id', auth()->user()->id)->where('ocassion_id', $request->ocassion)->whereDate('start_time', Carbon::today())->first()){
                   return  to_route('home.landing')->with('message', 'You already had an appointment');

             }else{

                      
          try{
        DB::transaction(function() use($request){
               $dateTime = Carbon::parse($request->time);
    

        $gaga = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');

        $request['end_time'] = Carbon::parse( $gaga)->addHour();

        $gaga = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');
            Appointment::create([

                'user_id'=> auth()->user()->id,
                'start_time'=>$gaga,
                'status'=>'pending',
                'message' => $request->message,
                 'endTime'=>$request->end_time,
                'ocassion_id'=> $request->ocassion

            ]);

        }
    
    );

    return  to_route('home.landing')->with('message', 'Appointment Succesful');
        }catch(\Exception $exception){
            return to_route('home.landing')->with('message', "Appointment Denied. Something went wrong try again". $exception->getMessage());
        }


               
             }


    }


      public function clientHistory(){
        return view('users.appointments.client-appointment-history');
    }

    public function update($id){

        try{

             DB::transaction(function() use($id){
             $data= Appointment::find($id);
            $data->status = 'canceled';
            $data->update();
        }
    
    );

     return to_route('client.appointment.history')->with('message', "Appointment Updated");

        }catch(Exception $exception){
                return to_route('client.appointment.history')->with('message', "Update Failed");
        }
        
            

       return  to_route('user.appointment');
    }


    
}
