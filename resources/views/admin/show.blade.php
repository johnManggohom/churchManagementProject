@extends('layouts.app')

@section('content')


{{-- <div  class="bg-gray-900 grid grid-cols-1 m-auto">

    <div class="flex text-gray-100 pt-100">

        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
        <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">Do you want to be a developer</h1>
        <a href="/blog" class="text-center bg-emerald-900 text-gray-70 py-2 px-4 font-bold text-xl uppercase"> Read more</a>
        </div>
    </div>
</div>  --}}


<div class="w-4/5 m-auto text-center">

    <div class="py-16 border-b border-gray-200">
        
        <h1 class="text-6xl ">
                Post
        </h1>
    </div>
</div>


{{-- @if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
<p class="w-1/6 text-gray-50 bg-green-500 px-1   py-2">Events posted successfully</p>
</div>
    
@endif

 @if (Auth::check())
     <div class="pt-15  w-4/5 m-auto text-end text-white">
    <a href="/dashboard/create" class="bg-blue-500 uppercase text-xs font-extrabold py-3 px-3 rounded-3xl"> Create Post</a>
    </div>
 @endif --}}




    
<div class="grid grid-cols-2 gap-20
 w-4/5 h-1/2 mt-10 mx-auto py-15 border-b border-gray-200 overflow-hidden">


 <div class="flex items-center justify-center">

        <div class="overflow-hidden h-2/4" style="width:20rem; height:20rem; overflow:hidden">
        <img style="width: 100%; height:100%; object-fit:cover"  src="https://images.pexels.com/photos/2100941/pexels-photo-2100941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
    </div>


 </div>


    <div class="h-1/2" >

            <h2 class="text-gray-700 font-bold text-3xl pb-4">   {{ $post->title }}</h2>

            <span class="text-gray-500">

                <span class="font-bold italic text-gray-800
                "> {{ $post->user->name }} - Date: 2022-02-20</span>
            </span> 

            <p class="text-xl   text-gray-700 pt-8 pb-10 leading font-light"> {{$post->description }}
            
            {{-- @if(strlen(strip_tags($post->description)) > 5)
            {{ ... Read}}
         
            @endif --}}
            </p>
            

            {{-- <a href="/dashboard/{{ $post->slug }}" class="bg-blue-500 px-4 py-2 text-gray-200">Read More</a> --}}
            <a href="/dashboard/{{ $post->slug }}">Edit Post</a>

    </div>




</div>


{{-- <div class="grid grid-cols-2 gap-20
 w-4/5 h-1/2  mx-auto py-15 border-b border-gray-200 overflow-hidden">


 <div class="flex items-center justify-center">

        <div class="overflow-hidden h-2/4" style="width:20rem; height:20rem; overflow:hidden">
        <img style="width: 100%; height:100%; object-fit:cover"  src="https://images.pexels.com/photos/2100941/pexels-photo-2100941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
    </div>


 </div>


    <div class="h-1/2" >

            <h2 class="text-gray-700 font-bold text-3xl pb-4">    Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>

            <span class="text-gray-500">

                <span class="font-bold italic text-gray-800
                ">Date: 2022-02-20</span>
            </span> 

            <p class="text-xl   text-gray-700 pt-8 pb-10 leading font-light"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat exercitationem cupiditate blanditiis dolorum? Inventore numquam, deleniti recusandae facilis doloremque suscipit?</p>
            

            <a href="" class="bg-blue-500 px-4 py-2 text-gray-200">Read More</a>

    </div>




</div> --}}

@endsection