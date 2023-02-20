<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class eventsController extends Controller
{
    public function index(){
        return view('admin.events.index');
    }
}
