<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Ocassion;
use Illuminate\Http\Request;

class homeController extends Controller
{
     public function index(){
       $ocassions = Ocassion::all()->pluck('id', 'name');
   
        return view('home-page.index', compact('ocassions'));
     }
}
