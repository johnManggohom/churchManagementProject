<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class followUpappointmentController extends Controller
{
    public function index(){

        
        return view('admin.appointment.admin-followup');
    }
}
