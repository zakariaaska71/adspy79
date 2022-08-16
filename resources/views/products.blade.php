<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('product_style/js/jquery-nice-select-1.1.0/css/nice-select.css') }}">
    <link href="{{ asset('product_style/libs/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/css/all.min.css') }}"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js"
        integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="{{ asset('product_style/libs/Hover-master/css/hover-min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/' . general('logo')) }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <link href="{{ asset('product_style/css/style.css') }}" rel="stylesheet">
    <title>{{ general('title') }}</title>
    <style>
        .list{
            
    overflow-y: auto !important;
    max-height: 200px !important;

        }
    </style>
</head>

<body>



    @include('front.nav')



    <div class="products-page rounded">
        <div class="container">
            <div class="filter rounded">
                <div class="row">
                <form class="form-inline Search my-2 my-lg-0 " style="
    margin: 3% !important;
    width: 100%;" method="get"
                action="{{ route('productgs_index') }}">
               
                                                <i class="fad fa-search" style="color:#17a2b8;font-size:24px" ></i>

                        <div class="col-lg-3 col-md-12 ">
                        <input class="form-control" value="{{$request->title}}" name="title" type="search" placeholder="Type Title Search"
                            aria-label="Search">

                        </div>
                                                <i class="fad fa-sort-circle-down" style="color:#17a2b8;font-size:24px"></i>

                        <div class=" col-lg-3 col-md-12">
                            <select class="form-control" value="{{$request->sort}}"  name="sort">
                                <option disabled  selected value="" data-display="Sort By">Nothing</option>
                                <option value="new" @if($request->sort == 'new') selected @endif>New</option>
                                <option value="old" @if($request->sort == 'old') selected @endif>Old</option>

                            </select>
                           

                        </div>
                                                <i class="fad fa-list-alt" style="color:#17a2b8;font-size:24px"></i>

                        <div class=" col-lg-3 col-md-12">
                          <select class="selectpicker form-control" style="width:100%" value="{{$request->sort}}"  name="category" placeholder="Chose Category...">
                                <option disabled  selected value="" >Nothing</option>
                               <option value="Automobiles & Motorcycles">Automobiles & Motorcycles</option>
                                <option value="Baby fashion">Baby fashion</option>
                                <option value="Beauty">Beauty</option>
                                <option value="Camping & Hiking">Camping & Hiking</option>
                                <option value="Cellphones & Telecom">Cellphones & Telecom</option>
                                <option value="Christmas">Christmas</option>
                                <option value="Computer & Office">Computer & Office</option>
                                <option value="Decoration">Decoration</option>
                                <option value="Dental care">Dental care</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Eyewear">Eyewear</option>
                                <option value="Festive & Party supplies">Festive & Party supplies</option>
                                <option value="Fishing">Fishing</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Gifts">Gifts</option>
                                <option value="Halloween">Halloween</option>
                                <option value="Health">Health</option>
                                <option value="Health & Beauty">Health & Beauty</option>
                                <option value="Home & Garden">Home & Garden</option>
                                <option value="Home improvement">Home improvement</option>
                                <option value="Jewelry">Jewelry</option>
                                <option value="Kids fashion">Kids fashion</option>
                                <option value="Kitchen">Kitchen</option>
                                <option value="Lights & Lighting">Lights & Lighting</option>

                                <option value="Luggage-Bags">Luggage-Bags</option>
                                <option value="Men Clothing & Accessories">Men Clothing & Accessories</option>
                                <option value="Mobiles">Mobiles</option>
                                <option value="Mother & Kids">Mother & Kids</option>
                                <option value="Novelty & Special use">Novelty & Special use</option>
                                <option value="Pet Products">Pet Products</option>
                                <option value="Pro">Pro</option>
                                <option value="Security & Protection">Security & Protection</option>
                                <option value="Sewing">Sewing</option>
                                <option value="Shoes">Shoes</option>
                                <option value="Sports & Entertainment">Sports & Entertainment</option>
                                <option value="Tools">Tools</option>
                                <option value="Toys & Hobbies">Toys & Hobbies</option>
                                <option value="Travel">Travel</option>
                                <option value="Women Clothing & Accessories">Women Clothing & Accessories</option>

                            </select>
                         

                        
                        </div>
                          
                         <div class="  col-lg-2 col-md-12"  >
                    <input  class="form-control btn btn-info" type="submit"  >
                </div>  
                        
                 
                </div>
                
               
          
            </form>
            </div>

            <div class="products row">
           
                @forelse ($products as $product)
                {{-- {{ dd() }} --}}
                    <div class="product-item col-sm-12 col-md-10 col-lg-5 col-xl-4 rounded hvr-shadow">
                        <div class="img-box">
                            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/productImage/' . @$product->images[0]) }}">
                        </div>
                        <div class="tit-sup clearfix">
                            <span class="date"><i class="far fa-clock"></i> {{ $product->post_on }}</span>
                            <span class="price">{{ $product->selling_price }}</span>
                        </div>
                        <h2 class="title">
                            {{ Str::limit($product->title ? $product->title : 'product title', 22) }}</h2>
                        <span class="txt-ava">Available Info</span>
                        <ul class="list-unstyled">
                            <li>
                                <div class="box hvr-grow"><i class="fad fa-dollar-sign" style="--fa-primary-color :#ffc107 ; --fa-secondary-color: white;font-size:25px"></i>
                                </div>
                                <p>profits</p>
                            </li>
                            <li class="text-center">
                                <div class="box hvr-grow"><i class="fad fa-chart-bar" style="--fa-primary-color :#e91e63 ; --fa-secondary-color: white;font-size:25px"></i>
                                </div>
                                <p>analytics</p>
                            </li>
                            <li>
                                <div class="box hvr-grow"><i class="fad fa-ad" style="--fa-primary-color :#f44336 ; --fa-secondary-color: white;font-size:25px"></i>
                                </div>
                                <p>fb-ads</p>
                            </li>
                          <li>
                                <div class="box hvr-grow" data-toggle="modal"
                                    onclick="product('{{ $product->_id }}')" data-target="#staticBackdrop"><i class="fad fa-bullseye-arrow "  style="--fa-primary-color :blue ; --fa-secondary-color: #009688;font-size:25px"></i></div>
                                <p>analytics</p>
                            </li>

                        </ul>

                        

                        <a data-toggle="modal" onclick="product('{{ $product->_id }}')" data-target="#staticBackdrop"
                            class="btn btn-info">details</a>
                    </div>
                    @empty
                    
            <div class="product-item col-sm-12 col-md-12 col-lg-12 col-xl-12 rounded hvr-shadow" style="text-align: center;">
                        <h2>No Data Here</h2>
                    </div>
                @endforelse


            </div>
            @if(check_basic() == 1)
            {{ $products->appends(Request::all())->links() }}
  
            @endauth
   



            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       
                        <div id="product-modal-body">
 <div class="c-preloader text-center p-3">
                        <i class="fa fa-spinner fa-4x" aria-hidden="true"></i>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>




    <div class="footer" style="text-align: center;">
        <div class="container">
            <p>Copyright companyName 2021 &copy; all rights received</p>
        </div>
    </div>













    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('product_style/js/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('product_style/libs/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/js/all.min.js') }}">
    </script>

    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.2.6/dist/js/splide.min.js"
        integrity="sha256-cx5eIhYQSRWG91/24kAUBO103gftIvUA7xyYTo+ZnPc=" crossorigin="anonymous"></script> 


    <script src="{{ asset('product_style/js/script.js') }}"></script>
    <script>
    
        function product(id) {


            $('#staticBackdrop').modal();
            $('.c-preloader').show();

            $.ajax({
                type: 'post',
                url: "{{ route('showproductModal') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },

                success: function(data) {
                                    setTimeout(function(){
                $('.c-preloader').hide();

            }, 4000);

                    $('#product-modal-body').html(data);


                }
            });

        }
        $(document).ready(function() {
            $('.my-select').selectpicker();
            $('.thumbnials img').click(function() {


                $(this).addClass('selected').siblings().removeClass('selected');

                $('.img-mian img').hide().attr('src', $(this).attr('src')).fadeIn(500)

            })

            var numOfThumb = $('.thumbnials').children().length,

                MargenBitwenThumb = "0.5",
                TotalMargen = (numOfThumb - 1) * MargenBitwenThumb,
                ThumbWidth = (100 - TotalMargen) / numOfThumb;
            console.log(ThumbWidth)
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
        });
    </script>

</body>

</html>
