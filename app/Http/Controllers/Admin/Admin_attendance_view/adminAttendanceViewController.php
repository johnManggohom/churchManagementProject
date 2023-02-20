<?php

namespace App\Http\Controllers\Admin\Admin_attendance_view;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminAttendanceViewController extends Controller
{
    public function index(){
        return view('admin.attendance_view.index');
    }
}
