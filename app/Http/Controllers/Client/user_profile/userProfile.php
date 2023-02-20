<?php

namespace App\Http\Controllers\Client\user_profile;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Http\Request;

class userProfile extends Controller
{
   public function index(){

       $gaga =  auth()->user()->id;

      $community = User::find($gaga);

   $user =$community->organization()->wherePivot('isAccepted', '=', 0)->get();
      $user1 =$community->organization()->wherePivot('isAccepted', '=', 1)->get();

    $organizations = Organization::all();
    return view('users.user-profile.index', compact('user', 'user1', 'organizations'));
   }


   public function store(Request $request){
   $user1= User::find(auth()->user()->id);
   $user1->organization()->sync($request->organizations);

   return to_route('client.user-profile');
   }
}
