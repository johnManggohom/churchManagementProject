<?php

namespace App\Http\Controllers\Home\Events;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eventsPageController extends Controller
{
    public function index(){
         $events = Event::where('Post', '=', 1)->orderBy('EventDateFrom', 'desc')->paginate(6);
         $activities=Activity::orderBy('start_time', 'desc')->paginate(6);

         
        return view('home-page.events.index', ['events' => $events, 'activities'=>$activities]);
    }
      /**
   * Display a listing of the resource.
   *
   * @return IlluminateHttpResponse
   */
  
   public function admineventshow() {
    $events = Event::orderBy('EventDateFrom', 'desc')->paginate();
    return view('admin.admineventshow', ['events' => $events]);
  }

  public function events() {
    $events = Event::orderBy('EventDateFrom', 'desc')->paginate(9);
    return view('events', ['events' => $events]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return IlluminateHttpResponse
   */
  public function create() {
    return view('admin.adminevent');
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
        'Attendance' =>  $request->inputAttendance == 'on' ? 1 : 0,
        'Post' => $request->inputPost == 'on' ? 1 : 0

    ]);
    return redirect('/adminevent')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  }

  /**
   * Display the specified resource.
   *
   * @param  AppModelsPost  $events
   * @return IlluminateHttpResponse
   */
  public function show($id) {


    $events  = Event::where('id',  $id)->get()->first();
    return view('home-page.events.home-events-show', ['events' => $events]);
  }

    public function showActivity($id) {


    $events  = Activity::where('id',  $id)->get()->first();
    return view('home-page.events.home-activity-show', ['events' => $events]);
  }

  public function admineventshowid($id) {


    $events  = Event::where('id',  $id)->get()->first();
    return view('admin.admineventedit', ['events' => $events]);
  }


  

  /**
   * Show the form for editing the specified resource.
   *
   * @param  AppModelsPost  $post
   * @return IlluminateHttpResponse
   */
  public function edit(Post $post) {
    return view('post.edit', ['post' => $post]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @param  AppModelsEvent $event
   * @return IlluminateHttpResponse
   */
  public function update(Request $request, $id ) {

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
    $data->Attendance = $request->inputAttendance == 'on' ? 1 : 0;
    $data->Post = $request->inputPost == 'on' ? 1 : 0;


    $data->update();
    
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
    return to_route('admineventshow')->with(['message' => 'Post updated successfully!', 'status' => 'success']);
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
    return to_route('admineventshow')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
  }
}
