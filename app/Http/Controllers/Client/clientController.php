<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index(){
        
        return view('users.index');
    }


    public function store(){
        
    }
}
