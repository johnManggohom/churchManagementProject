

            <div  class="bg-white p-2">
              <p class="text-center">Attendance Chart</p>
   <div id="chartBox"  class="flex justify-center align-center" style="height: 30vh; width:30vw"   >
          
             <canvas id="myChart"></canvas>
        </div>
        </div>

                        <script>    

                        document.addEventListener('livewire:load', function(){

                             var _ydata = JSON.parse('{!! json_encode($days) !!}');
                            var _xdata = JSON.parse('{!! json_encode($count) !!}');


                              const ctx = document.getElementById('myChart');

                                    new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                        labels: _ydata,
                                        datasets: [{
                                            label: 'Attendees',
                                            data: _xdata,
                                            borderWidth: 1
                                        }]
                                        },
                                        options: {
                                        scales: {
                                            x: { title: { display: true, text: 'Dates' }},
                                            y: {
                                            beginAtZero: true,
                                            ticks: {
                                                precision: 0
                                            },
                                             title: {
                                                display: true,
                                                text: 'Number of Attendees'
                                            }
                                            }
                                        }
                                        }
                                    });


                        })

                        
                </script>
