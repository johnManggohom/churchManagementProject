<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminEventController extends Controller
{
    public function index(){


        return view('admin.admin-events.admin-index');
    }


    public function create(){
        return view('admin.admin-events.admin-events-create');
    }

      /**
   * Store a newly created resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @return IlluminateHttpResponse
   */
  public function store(Request $request) {
    

    $request->validate([
      'inputEventName' => 'required',
      'inputDateFrom' => 'required',
      'inputDateTo' => 'required',
      'inputDetails' => 'required|min:10',
      'inputPictures' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
    ]);

    $imageName = time() . '.' . $request->inputPictures->extension();
    // $request->image->move(public_path('images'), $imageName);
    $request->inputPictures->storeAs('public/images', $imageName);



    Event::create([
        'EventName' => $request->inputEventName,
        'EventDateFrom'=> $request->inputDateFrom,
        'EventDateTo' => $request->inputDateTo, 
        'Details' => $request->inputDetails,
        'Picture' => $imageName,
        'Attendance' => 0,
        'Post' => $request->inputPost == 'on' ? 1 : 0

    ]);
    return to_route('admin.adminEvents')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  }

     public function edit($event){

        $event= Event::where('id', $event)->first();

        return view('admin.admin-events.admin-events-edit', compact('event'));
    }


      public function update(Request $request, $id ) {
        

    
try{

  DB::transaction(function() use($request, $id){

     $data = Event::find($id);
    $imageName = '';
    if ($request->hasFile('inputPictures')) {
      $imageName = time() . '.' . $request->inputPictures->extension();
      $request->inputPictures->storeAs('public/images', $imageName);
      if ($data->Picture) {
        Storage::delete('public/images/' . $data->Picture);
      }
      
    } else {
      $imageName = $data->Picture;
    }
 
    // 1674265503.jpg


    $data->EventName = $request->inputEventName;
    $data->EventDateFrom = $request->inputDateFrom;
    $data->EventDateTo = $request->inputDateTo;
    $data->Details = $request->inputDetails;
    $data->Picture = $imageName;
    $data->Attendance = 0;
    $data->Post = $request->inputPost == 'on' ? 1 : 0;


    $data->update();
    
  }

  
);

    return to_route('admin.adminEvents')->with(['message' => 'Post updated successfully!', 'status' => 'success']);
    

}catch(Exception $excetion){
   return to_route('admin.adminEvents')->with(['message' => 'Update Failed!', 'status' => 'success']);
}
      
   
//     $postData = [
//     'EventName' => $request->inputEventName,
//     'EventDateFrom'=> $request->inputDateFrom,
//     'EventDateTo' => $request->inputDateTo, 
//     'Details' => $request->inputDetails,
//     'Picture' => $imageName,
//     'Attendance' =>  $request->inputAttendance == 'on' ? 1 : 0,
//     'Post' => $request->inputPost == 'on' ? 1 : 0

// ];



//     $events->update($postData);

  }

    /**
   * Remove the specified resource from storage.
   *
   * @param  AppModelsEvent  $event
   * @return IlluminateHttpResponse
   */
  public function destroy($id) {

$event = Event::where('id', $id)->get()->first();

    Storage::delete('public/images/' . $event->Picture);
    $event->delete();
    return to_route('admin.adminEvents')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
  }

}
