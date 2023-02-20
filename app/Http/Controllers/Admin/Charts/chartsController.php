<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chartsController extends Controller
{
    public function index(){


        return view('admin.dashboard.admin_dashboard');
    }
}
