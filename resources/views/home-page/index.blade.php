@include('partials.header')
             <section class="slider_section" style="height: 85vh;" >
            <div class="slider_bg_box">
                <div class="h-full w-full" style="background: rgb(2,0,36);
background: linear-gradient(148deg, rgba(2,0,36,0.7372198879551821) 0%, rgba(2,62,38,0.9108893557422969) 100%); position: absolute; z-index:1"></div>
               <img src="{{URL('images/home/sto.nino facade.png' ) }}" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container text-center text-white">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1 class="text-white">
                                    <span class="text-white"> 
                                  WELCOME MGA KA-NIÑO
                                    </span>
                                  
                                 </h1>
                                 <p>
                                 The official website of Sto. Niño De Congreso Parish.
                                 </p>
                                 <div class="btn-box">
                                    <a  href="#appointment" class="btn1">
                                    Book an Appointment
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
         </section>


         <section id="appointment" class="py-12">
  <div class="w-4/5 m-auto">

     <div>
        @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show w-10/12 mx-auto my-4 " role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('message') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif

 <div class="bg-white drop-shadow-md px-5 py-1 rounded-lg w-full mt-4 mx-auto">
<div class="w-full  mb-5"> <p class="font-bold text-xl text-center">Make Appointment</p> </div>





  <form method="POST" action="{{ route('client.appointment.storeHome') }}">
@csrf

<div class="flex w-full space-x-5">
<livewire:client.appointment.date-time-picker>


 {{-- <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button> --}}

 <div class="w-1/2">

    <div class="w-full">
  <div class="mb-3 w-full">
    <select name="ocassion" class="form-select appearance-none 
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">   
      <option value="">Select Ocassion</option>
      @foreach ($ocassions as $key=>$ocassion )

        <option value="{{ $ocassion }}">{{ $key }}</option>
        
      @endforeach
       
    
    </select>
  </div>
</div>

   <div class="w-full">
  <div class="mb-3 xl:w-full">
    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
      >Message <span class="text-gray-500 text-xs"> (optional)</span></label
    >
    <textarea name="message"
      class="
        form-control
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
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
      id="exampleFormControlTextarea1"
      rows="3"
      placeholder="Your message"
    ></textarea>
  </div>
</div>


@if(auth()->user())

<div class="w-full">
  <button type="submit" class="inline-block px-6 w-full py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg mb-3 focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
</div>
@else
<div class="w-full">
  <a href="{{ route('login') }}" class="inline-block px-6 w-full py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg mb-3 focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out text-center">Log In first</a>
</div>
@endif


 </div>

 </form>


 {{---------------------------------------------------------- Appointment table --------------------------------------------------------}}

</div>

</div>


  </div>


         </section>


<section id="about" class="w-4/5 m-auto mt-8">
      <div>
        <p class="text-5xl text-center text-white"> About Us</p>
        <p class="mx-5 text-white" style="line-height: 200%;   text-align: justify;">
          <p class="my-4 text-white">
        The Sto. Nino de Congreso Parish located in the Congressional Road, Congressional Village, Bagumbong, Caloocan City was established on December 15, 1998 and was canonically erected as a parish on April 9, 1999 by the late Cardinal Jaime L. Sin.
        </p>
          <p class="my-4 text-white">
        SNdCP was founded upon a vision that a pastoral community be organized with the primary aim of rearing the youth and molding them into effective Christian leaders. Thus, SNdCP’s logo highlights an image of an unborn child upon a hand-shaped fire, representing the community’s ardent desire to protect and nurture its youth.
         </p><p class="my-4 text-white">
        The story of Sto. Niño de Congreso had its humble beginning with the feasibility studies conducted by Fr. Noel Jacob, then parish priest of Our Lady of Fatima (OLFP), Urduja Village, North Caloocan City. At that time, SNdCP was only a sub-parish of OLFP.
           </p><p class="my-4 text-white">
        On 18 April 1999, shortly after SNdCP was established, Rev. Fr. Nonette C. Legaspi was installed as SNdCP’s first Parish Priest. He was succeeded by Rev. Fr. Romeo Fedellaga on 18 April 2004, and by Rev. Fr. Aristeo M. de Leon on May 2007 in an interim capacity.
          </p><p class="my-4 text-white">
        On July 2007, His Grace, Most Rev. Antonio Tobias, D.D., Bishop of Novaliches, handed over the administration of SNdCP to the Missionaries of Our Lady of La Salette. From then on, rosters of Saletian missionaries were appointed to serve the parish.
          </p><p class="my-4 text-white">
        Rev. Fr. Eugene Flores, MS was the first Saletian appointed as Parish Priest, together with Rev. Fr. Christopher M. Bautista, MS as his assisting Parish Priest. They were succeeded by Rev. Fr. Andreas M. Sudarsono, MS, who served as Parish Priest until May 2012.
       </p><p class="my-4 text-white">
        After Fr. Sudarsono, SNDCP was administered by Rev. Fr. Antonio G. Abuan, M.S.  together with Fr. Joseph Christian M. Pilotin, MS as Assisting Priest. Fr. Tony has undertaken several initiatives such as cascading the Diocese’s Services and Programs to the Parish level ever since he became Parish Priest in 2012.
       </p><p class="my-4 text-white">
        The parish continued to grow and had nineteen (19) pastoral areas under its care including the following sub-parishes: Christ the King of Kingstown 1 Subd.; San Lorenzo Ruiz of Rainbow Village 5; St. Joseph the Worker of Senate Village; and Most Holy Rosary of Union Village. The parish has, as of October 31, 2019, 13 chapels.
       </p> <p class="my-4 text-white">
        Its feast day is the 3rd Sunday of January.
        </p>
       
    </div>
</section>

                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.2.min.js"
  integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
  crossorigin="anonymous"></script>

      @livewireScripts

         @stack('scripts')

@include('partials.footer')
</body>
</html>