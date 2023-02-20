<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class pagesController extends Controller
{
    public function index(){

        $posts = Post::all();
        return view('admin.index');
    }


    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){


        
        $request->validate([
            'title'=> 'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);



                                 try{
        DB::transaction(function() use($request){
           

                $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

                $request->image->move(public_path('images'), $newImageName);
                $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

                Post::create([

                        'title'=>$request->title,
                        'slug'=>$slug,
                        'description'=>$request->description,
                        'image_path'=>$newImageName,
                        'user_id'=> auth()->user()->id,
     ]);
          
        }
    
    
    );
    
      
         return to_route('events')->with('message', 'Events posted successfully');}catch(\Exception $exception){
              return to_route('dashboard.create')->with('message', $exception->getMessage());
        }

    }


    public function show($slug){
            return view('admin.show')->with('post', Post::where('slug', $slug)->first());
    }


    public function edit($slug){
        return view('admin.edit')->with('post', Post::where('slug', $slug)->first());
    }

    public function update(Request $request, $slug){

          
        $request->validate([
            'title'=> 'required',
            'description'=>'required',
        ]);



                                 try{
        DB::transaction(function() use($request, $slug){
           

        

                Post::where('slug', $slug)->update([

                        'title'=>$request->title,
                        'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
                        'description'=>$request->description,
                        'user_id'=> auth()->user()->id,
     ]);
          
        }
    
    
    );
    
      
         return to_route('events')->with('message', 'Events posted successfully');}catch(\Exception $exception){
              return to_route('dashboard.edit')->with('message', $exception->getMessage());
        }

    }


    public function destroy($slug){

         $post = Post::where('slug', $slug)->get()->first();
        $image_path = "images/".$post->image_path; 

    if (file_exists($image_path)) {

       @unlink($image_path);

   }

       $post->delete();

        return to_route('events')->with('message', 'Events deleted successfully');
       
    }

    
}
