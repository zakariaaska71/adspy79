<div class="container">
    <div class="row">
        <div class="slider col-lg-5 ">
            <div class="gallrey">
                <div class="img-mian">
                    <span class="skin-Background"><i class="fas fa-angle-left"></i></span>
                    <span class="skin-Background"><i class="fas fa-angle-right"></i></span>
                    <div class="save2">
                        <i class="far fa-heart "></i>
                    </div>
                    <img src="{{$product->images[0]}}">
                </div>
                <div class="thumbnials">
                    @foreach(($product->images) as $key=> $image)
                    <img src="{{$image}}" @if($key==0) class="selected" @else class="" @endif style="width: 19.2%; margin-right: 1%;"> @endforeach




                </div>
            </div>
        </div>
        @php
        $dates = [];
        $orders =[];
        foreach($product->daliy as $data){
        array_push($dates,$data->created_at->format('d-m-Y'));
        array_push($orders,$data->totalOrders);
        }
        
        @endphp
        <script>
            $(window).ready(function() {



                $('.thumbnials img').click(function() {



                    $(this).addClass('selected').siblings().removeClass('selected');

                    $('.img-mian img').hide().attr('src', $(this).attr('src')).fadeIn(500)

                })

                var numOfThumb = $('.thumbnials').children().length,

                    MargenBitwenThumb = "1",
                    TotalMargen = (numOfThumb - 1) * MargenBitwenThumb,
                    ThumbWidth = (100 - TotalMargen) / numOfThumb;

                console.log(ThumbWidth, )
                $('.thumbnials img').css({
                    'width': ThumbWidth + "%",
                    'margin-right': MargenBitwenThumb + "%"
                })


                $('.img-mian span:last-of-type').click(function() {

                    if ($('.thumbnials .selected').is(":last-child")) {

                        $('.thumbnials img').eq(0).click()
                    } else {
                        $('.thumbnials .selected').next().click()
                    }
                })

                $('.img-mian span:first-of-type').click(function() {

                    if ($('.thumbnials .selected').is(":first-child")) {
                        $('.thumbnials img:last').click()

                    } else {

                        $('.thumbnials .selected').prev().click()
                    }
                });
//                 let ctx = document.getElementById('myChart').getContext('2d');

//   let delayed;





//     var myChart = new Chart(ctx, {
//         type: 'bar',
//         data: {
//             labels: ['Tody', 'Yesterday', '3Days', 'Week', '2Week', 'Month'],
            
//             datasets: [
//                 {
//                     label: 'item',
//                     data: [1, 2, 3, 4, 5, 4, 4,6, 5],
//                     backgroundColor: [
//                         'rgba(255, 159, 64, 0.2)'
//                     ],
//                     borderColor: [
//                         'rgba(255, 99, 132, 1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                         'rgba(153, 102, 255, 1)',
//                         'rgba(255, 159, 64, 1)'
//                     ],
//                     borderWidth: 1, fontSize:12,fill: true
//                 }
                
    
//             ]
    
    
//         },
//         options: {


//             animation: {
//                 tension:{
//                     onComplete: () => {
//                         delayed = true;
//                     },
//                     delay: (context) => {
//                         let delay = 0;
//                         if (context.type === 'data' && context.mode === 'default' && !delayed) {
//                           delay = context.dataIndex * 300 + context.datasetIndex * 100;
//                         }
//                         return delay;
//                     }
            
//                 }
            
//             },

//             scales: {

//                 x: {
//                     stacked: true
//                 },
//                 y: {
//                     stacked: true

//                 }
//             }


        
    
            
//         }
//     });



    
    var ctx2 = document.getElementById('myChart2').getContext('2d');

    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: {!!json_encode($dates)!!},
            datasets: [
                {
                    label: 'order',
                    data: {!!json_encode($orders)!!},
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1, fontSize:12,fill: false, borderRadius: 5,
                }
                
    
            ]
    
    
        },
        options: {

            animations: {
                tension: {
                duration: 2000,
                delay:1000,
                from: 1,
                to: 0,
                loop: true
                }
            },
            scales: {
                y: { 
                min: 0,
                max: 1000
                }
            }
        }
    });



    
    var ctx3 = document.getElementById('myChart3').getContext('2d');

    var myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Jan2021', 'Feb2021', 'Mar2021', 'Apr2021', 'May2021', 'June2021', 'July2021', 'Aug2021', 'Sept2021', 'Oct2021', 'Nov2021', 'Dec2021'],
            datasets: [
                {
                    label: 'order',
                    data: [500, 100, 300, 400, 700, 600, 400, 600, 500,900],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1, fontSize:12,fill: false, borderRadius: 5,
                }

            ]

        },
        options: {
       

            animations: {
                tension: {
                duration: 2000,
                delay:1000,
                from: 1,
                to: 0,
                loop: true
                }
            },
            scales: {
                y: { 
                  min: 0,
                  max: 1000
                }
              }
            
    
            
        }
    });



    var ctx4 = document.getElementById('myChart4').getContext('2d');

    var myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: ['Jan2021', 'Feb2021', 'Mar2021', 'Apr2021', 'May2021', 'June2021', 'July2021', 'Aug2021', 'Sept2021', 'Oct2021', 'Nov2021', 'Dec2021'],
            datasets: [
                {
                    label: 'wishlist',
                    data: [500, 100, 300, 400, 700, 200, 400, 700, 100,500],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1, fontSize:12,fill: false, borderRadius: 5,
                }

            ]

        },
        options: {
       

            animations: {
                tension: {
                duration: 2000,
                delay:1000,
                from: 1,
                to: 0,
                loop: true
                }
            },
            scales: {
                y: { 
                  min: 0,
                  max: 1000
                }
              }
            
    
            
        }
    });



    var ctx5 = document.getElementById('myChart5').getContext('2d');

    var myChart5 = new Chart(ctx5, {
        type: 'line',
        data: {
            labels: ['Jan2021', 'Feb2021', 'Mar2021', 'Apr2021', 'May2021', 'June2021', 'July2021', 'Aug2021', 'Sept2021', 'Oct2021', 'Nov2021', 'Dec2021'],
            datasets: [
                {
                    label: 'wishlist',
                    data: [500, 100, 800, 400, 600, 200, 400, 300, 600,500],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1, fontSize:12,fill: false, borderRadius: 5,
                }

            ]

        },
        options: {
       

            animations: {
                tension: {
                duration: 2000,
                delay:1000,
                from: 1,
                to: 0,
                loop: true
                }
            },
            scales: {
                y: { 
                  min: 0,
                  max: 1000
                }
              }
            
    
            
        }
    });

            })
        </script>

        <div class="info col-lg-7  ">
            <h3>{{$product->title}}</h3>

            <div class="title-data">
                <ul class="stars list-unstyled">
                    @if($product->is_descount == true)
                            <ul class="stars list-unstyled align-items-center">
                                 @if($product ->is_single_price == false)
                                                <span class="price"> {{dicount_price($product->min_price,$product->discount_value)}} <sup>{{'$'.$product->min_price}}</sup> </span> 
                                                <span class="price"> {{dicount_price($product->max_price,$product->discount_value)}}  <sup>{{'$'.$product->max_price}}</sup> </span>
                                @endif
                                @if($product ->is_single_price == true)
                                                <span class="price"> {{dicount_price($product->price,$product->discount_value)}} <sup>{{'$'.$product->price}}</sup> </span> 
                                @endif

                                @else
                                @if($product ->is_single_price == false)
                                                <span class="price"> {{'$'.$product->min_price}} - {{'$'.$product->max_price}}</span> 
                                @endif
                                 @if($product ->is_single_price == true)
                                                <span class="price"> {{'$'.$product->price}}  </span> 
                                @endif
                                
                                
                                @endif
                   
                </ul>
            </div>

            <div class="cards d-flex justify-content-start">
                <div class="order d-flex justify-content-between mr-2">
                    <i class="fas fa-award fa-1x text-info mr-2"></i>

                    <div class="order-top text-center">
                        <p>total order: <span class="ml-2 font-wieght-bold">{{$product->totalOrders}}</span></p>
                    </div>


                </div>

                <div class="wishlist d-flex justify-content-between">
                    <i class="far fa-heart-square fa-1x text-info mr-2"></i>
                    <div class="order-top text-center">
                        <p>wishlist order: <span class="ml-2 font-wieght-bold">{{$product->wishlistCount}}</span></p>

                    </div>

                </div>
            </div>

            <div class="btns d-flex justify-content-lg-start">
                <a target="_blank" href="{{$product->productUrl}}" class="btn mr-2">Show on aliexpress</a>

            </div>

            <!--<div class="chart1">-->
            <!--    <h5>quick view.</h5>-->
            <!--    <canvas id="myChart" class="mychart"></canvas>-->

                <!--<script>-->
                <!--    $(window).ready(function() {-->
                <!--        let ctx = document.getElementById('myChart').getContext('2d');-->

                <!--        let delayed;-->





                <!--        var myChart = new Chart(ctx, {-->
                <!--            type: 'bar',-->
                <!--            data: {-->
                <!--                labels: ['Tody', 'Yesterday', '3Days', 'Week', '2Week', 'Month'],-->

                <!--                datasets: [{-->
                <!--                        label: 'item',-->
                <!--                        data: [1, 2, 3, 4, 5, 4, 4, 6, 5],-->
                <!--                        backgroundColor: [-->
                <!--                            'rgba(255, 159, 64, 0.2)'-->
                <!--                        ],-->
                <!--                        borderColor: [-->
                <!--                            'rgba(255, 99, 132, 1)',-->
                <!--                            'rgba(54, 162, 235, 1)',-->
                <!--                            'rgba(255, 206, 86, 1)',-->
                <!--                            'rgba(75, 192, 192, 1)',-->
                <!--                            'rgba(153, 102, 255, 1)',-->
                <!--                            'rgba(255, 159, 64, 1)'-->
                <!--                        ],-->
                <!--                        borderWidth: 1,-->
                <!--                        fontSize: 12,-->
                <!--                        fill: true-->
                <!--                    }-->


                <!--                ]-->


                <!--            },-->
                <!--            options: {-->


                <!--                animation: {-->
                <!--                    tension: {-->
                <!--                        onComplete: () => {-->
                <!--                            delayed = true;-->
                <!--                        },-->
                <!--                        delay: (context) => {-->
                <!--                            let delay = 0;-->
                <!--                            if (context.type === 'data' && context.mode === 'default' && !delayed) {-->
                <!--                                delay = context.dataIndex * 300 + context.datasetIndex * 100;-->
                <!--                            }-->
                <!--                            return delay;-->
                <!--                        }-->

                <!--                    }-->

                <!--                },-->

                <!--                scales: {-->

                <!--                    x: {-->
                <!--                        stacked: true-->
                <!--                    },-->
                <!--                    y: {-->
                <!--                        stacked: true-->

                <!--                    }-->
                <!--                }-->





                <!--            }-->
                <!--        });-->
                <!--    });-->
                <!--</script>-->

            <!--</div>-->

        </div>
    </div>


    <div class="checks text-right pr-2 custom-control custom-radio">
        Order <input type="radio" id="order" value="order" class="Radio" name="custom-radio" checked> Wishlist <input type="radio" id="wishlist" value="wishlist" class="Radio" name="custom-radio">
    </div>
    <div class="chart2">
        <h5>product performance.</h5>

        <canvas id="myChart2" class="mychart2"></canvas>
    </div>



    <div class="chart3">
        <h5>all time skills data.</h5>
        <canvas id="myChart3" class="mychart3"></canvas>
    </div>



    <div class="chart4">
        <h5>product performance 2.</h5>
        <!-- <div class="checks text-right pr-2 custom-control custom-radio">
                                        Order  <input type="radio" id="order" value="order" class="Radio" name="custom-radio" > 
                                        Wishlist <input type="radio" id="wishlist" value="wishlist" class="Radio" name="custom-radio" checked> 
                                    </div> -->
        <canvas id="myChart4" class="mychart4"></canvas>
    </div>


    <div class="chart5">
        <h5>all time skills data 2.</h5>
        <canvas id="myChart5" class="mychart5"></canvas>
    </div>


</div>