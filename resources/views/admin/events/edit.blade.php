
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
               Update Post
        </h1>
    </div>
</div>



@if($errors->any())
    <div class="w-4/5 m-auto">
    <ul>    

        @foreach ($errors->all() as $error )
            <li class="w-1/5 mb-4 text-gray-100 bg-red-700 py-4">{{ $error }}</li>
        @endforeach

    </ul>
    </div>
@endif
    
<div class="w-4/5 m-auto pt-20">

<form action="{{ route('dashboard.updates.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
@csrf


<input type="text" name="title" value= "{{ $post->title }}"  class="bg-gray-0 block border-b-2 w-1/2 h-10 text-3xl outline-none">

<textarea name="description" id="" class="py-10 bg-gray-0 block border-b-2 w-1/2 h-30 text-xl outline-none">{{ $post->description }}</textarea>

{{-- <div class="">
  <div class="mb-3 w-96">
    <label for="formFileMultiple" class="form-label inline-block mb-2 text-gray-700"></label>
    <input class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="image" type="file" id="formFileMultiple">
  </div>
</div> --}}


<button type="submit" class="uppdercase mt-15  bg-blue-500 text-gray-100 text-lg font-extrabold py-2 px-4 rounded-3xl">Publish</button>
</form>
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