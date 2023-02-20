<?php

namespace App\Http\Controllers\Admin\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Attendance;
use App\Models\SpecificAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index($id){

        $activity_name= Activity::where('id', $id)->first(['id', 'name']);  
        return view('admin.attendance.index', compact('activity_name'));
    }


    public function store(Request $request){

        $attendance_id = SpecificAttendance::where('activity_id', $request->activity_id)->where('attendance_day', '=', Carbon::now()->format('Y-m-d'))->get()->first();

          $gaga =   Attendance::create([
                'activity_id'          => $request->activity_id,
                'user_id'        => $request->account,
                'attendence_date'   => now()->format('Y-m-d H:i:s'),
                'attendence_status' => true,
                'specific_attendance' =>1,
                'employee_id'=>auth()->user()->id,
            ]);
        return to_route('admin.activities.attendance', $request->activity_id);
    }
}
