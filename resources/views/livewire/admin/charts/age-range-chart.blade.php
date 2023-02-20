


        <div class="bg-white p-2">
              <p class="text-center">Members Age Range</p>
   <div id="chartBox"  class="flex justify-center align-center" style="height: 30vh; width:30vw"   >
          
             <canvas id="myChart2"></canvas>
        </div>
        </div>

       

     

                        <script>    

                        document.addEventListener('livewire:load', function(){

                             var _ydata = JSON.parse('{!! json_encode($days) !!}');
                            var _xdata = JSON.parse('{!! json_encode($count) !!}');


                              const ctx = document.getElementById('myChart2');

                                    new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                        labels: _ydata,
                                        datasets: [{
                                        
                                            data: _xdata,
                                            borderWidth: 1
                                        }]
                                        },
                                        options: {
                                            responsive: true,
                                            plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            }
                                        },
                                    });


                        })

                        
                </script>



                                                            
          

