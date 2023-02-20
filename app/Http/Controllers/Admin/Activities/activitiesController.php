<?php

namespace App\Http\Controllers\Admin\Activities;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\SpecificAttendance;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class activitiesController extends Controller
{
    public function index(){
        return view('admin.activities.index');
    }


    public function create(){
        return view('admin.activities.create');
    }

    public function store(Request $request){


                $request->validate([
    'activity_name' => 'required|max:50',
    'activity_description' => 'required|max:100',
    'startday' => 'required|date_format:Y-m-d',
    'end_day' => 'required|date_format:Y-m-d',

]);


        try{

        $dateTime = Carbon::parse($request->startday)->startOfDay();
                 $endDay  = Carbon::parse($request->end_day)->endOfDay();
          $start_day_dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');
        $end_day_dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $endDay )->format('Y-m-d H:i:s');

       $model =  Activity::create([

            'name'=> $request->activity_name,
            'start_time'=>$start_day_dateTime,
            'end_time'=>$end_day_dateTime,
            'description'=>$request->activity_description,
            'hasAttendance' => $request->status == 'on' ? 1 : 0
        ]); 


        $gaga = $model->id;

  




      $date = Activity::where('id', $gaga)->first();
                          $createdAt = Carbon::parse($date->start_time);
                    $startDate = new Carbon($createdAt->format('Y-m-d')); 
                    $createdAfter = Carbon::parse($date->end_time);
                    $endDate = new Carbon($createdAfter->format('Y-m-d')); 
                while ( $startDate->lte($endDate)){



                $dd =  Carbon::parse($startDate)->startOfDay();
                $start_day_dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dd )->format('Y-m-d H:i:s');

                SpecificAttendance::create([

            'activity_id'=> $gaga,
            'attendance_day'=>$start_day_dateTime,
    
        ]); 

             

  $startDate->addDay();
}

         return to_route('admin.activities')->with('message', 'Activity is posted succesfully');

        }catch(Exception $exceprion){

            return to_route('admin.activities')->with('message', 'Something went wrong. Try again'.$exceprion->getMessage());

        }
       
       

   
    }

        public function edit($activity_id){

        $activity= Activity::where('id', $activity_id)->first();

        return view('admin.activities.edit', compact('activity'));
    }



        public function update(Request $request, $id){
        try{

             DB::transaction(function() use($request, $id){
             $data= Activity::find($id);

              $dateTime = Carbon::parse($request->startday)->startOfDay();
         $endDay  = Carbon::parse($request->end_day)->endOfDay();

         
          $start_day_dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime )->format('Y-m-d H:i:s');
        $end_day_dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $endDay )->format('Y-m-d H:i:s');
               
            $data->name = $request->activity_name;
            $data->start_time =$start_day_dateTime;
            $data->end_time=$end_day_dateTime;
            $data->description = $request->activity_description;
            $data->hasAttendance =  $request->status == 'on' ? 1 : 0;
            $data->update();
        }
    
    );



     return to_route('admin.activities')->with('message', "Activity Updated");

        }catch(Exception $exception){
                return to_route('admin.activities')->with('message', "Update Failed");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function destroy($activity)
    {


             try{
        DB::transaction(function() use($activity){
             $data= Activity::find($activity);
         $data->delete();  
        }
    
    );

     return to_route('admin.activities')->with('message', "Occasion Deleted");
        }catch(\Exception $exception){
            return to_route('admin.activities')->with('message', "Deletion Failed");
        }

        
    }
}
