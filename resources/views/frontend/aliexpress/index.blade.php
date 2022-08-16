<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="{{asset('aliexpressproduct/libs/jquery-nice-select-1.1.0/css/nice-select.css')}}">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('aliexpressproduct/libs/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('aliexpressproduct/libs/daterangepicker-master/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('aliexpressproduct/css/style.css')}}" type="text/css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script src="{{asset('aliexpressproduct/libs/jquery-nice-select-1.1.0/js/jquery.nice-select.js')}}"></script>-->
    <script src="{{asset('aliexpressproduct/libs/moment-with-locales.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"
        integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('aliexpressproduct/libs/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/js/all.min.js')}}"></script>

    <script src="{{asset('aliexpressproduct/libs/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('aliexpressproduct/libs/daterangepicker-master/daterangepicker.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<style>
 .bootstrap-select .dropdown-menu li {
    position: relative;
    text-align: left !important;
}
</style>

    <title>Ali Epress Product</title>
</head>

<body>
    
    
        @include('front.nav')
 <div class="container">

        <div class="main">

            <div class="container">

                <div class="filter rounded">

                    <div class="row">
                        <div class="col-lg-12 border-bottom pb-3 head">
                            <div class="row">



                                <div class="col-lg-4 col-md-4 col-sm-6 d-flex align-items-lg-center ">
                                    <form class="form-inline">
                                        <i class="fad fa-search fa-2x"></i>
                                        <input class="form-control  rounded-0 search-input" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn rounded-0 search-btn" type="submit">Search</button>
                                    </form>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 d-flex">
                                    <i class="fad fa-calendar-week fa-2x"></i>
                                    <div class="caleander">

                                        <input type="text" class="form-control" name="daterange"value="01/01/2021 - 01/15/2021" />
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 d-flex sort">
                                    <i class="fad fa-sort-amount-up-alt fa-2x"></i>
                                    <select class="form-control border-info">
                                        <option data-display="Sort by">Nothing</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3">A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-6 d-flex rest" style="height: 38px;">
                                    <i class="fad fa-retweet fa-2x"></i>
                                    <a href="#" class="btn btn-info">Rest Selects</a>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fad fa-database fa-2x text-info"></i>
                                    <select class="form-control">
                                        <option data-display="Source">AliExpress</option>

                                    </select>


                                </div>

                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fad fa-bullseye-arrow fa-2x text-info"></i>
                                    <select class="form-control">
                                        <option data-display="Niches">Nothing</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3">A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>

                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fas fa-th fa-2x text-info"></i>
                                    <select class="form-control my-select selectpicker" id="categoty" data-live-search="true">
                                        <option data-display="Categories">Nothing</option>
                                       @foreach($cats as $cat)
                                         <option value="{{$cat->categoy_id}}">{{$cat->name}}</option>

                                       @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>


                        <div class="col-lg-12 mt-3">
                            <div class="row">

                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fad fa-globe-americas fa-2x text-info"></i>
                                    <select class="form-control">
                                        <option data-display="Top countries">Nothing</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3">A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>

                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fad fa-truck-moving fa-2x text-info"></i>

                                    <select class="form-control">
                                        <option data-display="Shipping">Nothing</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>

                                <div
                                    class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-between align-items-lg-center">
                                    <i class="fad fa-truck-loading fa-2x text-info"></i>
                                    <select class="form-control">
                                        <option data-display="Ships from">Nothing</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>

                            </div>
                        </div>



                        <div class="col-lg-12 mt-3 inputs">
                            <div class="row">
                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-between align-items-lg-center">
                                    <abbr title=""><span class="mr-2">price</span></abbr>
                                    <input class="form-control min mr-2" placeholder="from">
                                    <input class="form-control max" placeholder="to">
                                    <i class="fad fa-dollar-sign fa-2x"></i>

                                </div>

                                <!--<div-->
                                <!--    class="col-lg-4 col-md-5 col-sm-6 d-flex justify-content-between align-items-lg-center">-->

                                <!--    <abbr title=""><span class="mr-2">total order number</span></abbr>-->
                                <!--    <input class="form-control min mr-2" placeholder="from">-->
                                <!--    <input class="form-control max" placeholder="to">-->
                                <!--    <i class="fad fa-clipboard-list fa-2x"></i>-->

                                <!--</div>-->

                                <!--<div-->
                                <!--    class="col-lg-4 col-md-5 col-sm-6 d-flex justify-content-between align-items-lg-center">-->

                                <!--    <abbr title=""><span class="mr-2">period orders</span></abbr>-->
                                <!--    <input class="form-control min mr-2" placeholder="from">-->
                                <!--    <input class="form-control max" placeholder="to">-->
                                <!--    <i class="fad fa-clipboard-check fa-2x"></i>-->
                                <!--</div>-->
                                
                                
                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-between align-items-lg-center">

                                    <abbr title=""><span class="mr-2">dilly orders</span></abbr>
                                    <input class="form-control min mr-2" placeholder="from">
                                    <input class="form-control max" placeholder="to">
                                    <i class="fad fa-chart-bar fa-2x"></i>


                                </div>
                                
                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-between align-items-lg-center">

                                    <abbr title=""><span class="mr-2">votes</span></abbr>
                                    <input class="form-control min mr-2" placeholder="from">
                                    <input class="form-control max" placeholder="to">
                                    <i class="fad fa-box-ballot fa-2x"></i>

                                </div>

                                <div
                                    class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-between align-items-lg-center">

                                    <abbr title=""><span class="mr-2">wishlist</span></abbr>
                                    <input class="form-control min mr-2" placeholder="from">
                                    <input class="form-control max" placeholder="to">
                                    <i class="fad fa-ballot-check fa-2x"></i>

                                </div>
                                
                            </div>
                        </div>




                        <!--<div class="col-lg-12 mt-3 inputs">-->
                        <!--    <div class="row">-->


                                
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                </div>

            </div>


           @include('frontend.aliexpress.products')




            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <div id="addToCart-modal-body">
<div class="c-preloader text-center p-3">
                        <i class="fa fa-spinner fa-4x" aria-hidden="true"></i>
                        </div>
                    
                    </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>





        </div>

    </div>
    
    
        <script src="{{asset('aliexpressproduct/js/script.js')}}"></script>


    <script>
    
    
            $(function () {
                $('.my-select').selectpicker();
                
                $('#categoty').change(function() {
                    alert($(this).val());
                });
            });
           function ali(id){
              
            $('#staticBackdrop').modal();
            $('.c-preloader').show();

            $.ajax({
            type:'post',
            url:"{{ route('show_ali_product') }}" ,
          data: { "_token": "{{ csrf_token() }}",'id':id},
         
            success:function(data){
                setTimeout(function(){
                $('.c-preloader').hide();

            }, 4000);

                $('#addToCart-modal-body').html(data);

                
            }
            });
        
        }
        </script>
</body>

</html>