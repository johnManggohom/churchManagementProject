<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class roleRouter extends Controller
{
  public function index(){

    
      $gaga = auth()->user()->roles->pluck('name');
      

         if($gaga->contains('user')){

            if($gaga->contains('staff')){
                return to_route('admin.dashboard.index');
            }elseif($gaga->contains('admin')){
               return to_route('admin.dashboard.index');
            }elseif($gaga->contains('organization leader')){
                return to_route('leader.dashboard.index');
            }else{
                 return to_route('home.landing');
            }
           
         }elseif($gaga->contains('admin')){
            return to_route('admin.dashboard.index');
         }

    }
}
