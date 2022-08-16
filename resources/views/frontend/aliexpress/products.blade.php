 <div class="products">
                <div class="container">
                    <div class="row">
                        @foreach($products as $pro)

                        <div class="product-item col-lg-3 col-md-4 col-sm-6">
                            <a onclick="ali('{{$pro->_id}}')" style="text-decoration: none; color: inherit;" data-toggle="modal"
                                data-target="#staticBackdrop">
                                <div class="item-head">
                                    <div class="ht">
                                        <ul class="stars list-unstyled float-left">
                                            {{renderStarRating($pro->avarage_review)}}
                                            <li class="text-white">({{$pro->total_review}})</li>
                                        </ul>
                                        @if($pro ->is_single_price == false)
                                        <span class="price float-right bg-light">{{'$'.$pro->min_price}} - {{'$'.$pro->max_price}}</span>
                                        @else
                                        <span class="price float-right bg-light">{{'$'.$pro->price}}</span>
                                        @endif

                                    </div>

                                    <div class="img-box">
                                        <img src="{{$pro->images[0]}}">
                                              @if($pro->is_descount == true)
                                    <div class="Discount">
                                            {{$pro->discount_value}}%
                                        </div>
                                        @endif
                                    </div>
                              

                                    <div class="save">
                                        <i class="far fa-heart"></i>
                                    </div>

                                    <div class="search">
                                        <i class="far fa-search" onclick="ali('{{$pro->_id}}')" data-toggle="modal" data-target="#staticBackdrop"></i>
                                    </div>

                                </div>

                                <div class="item-body">

                                    <div class="rate rate-good">
                                        <i class="fas fa-long-arrow-alt-up"></i> +1 Rete
                                    </div>
                                    <span class="catg">product</span>
                                    
                                    <p><abbr title=" " style="text-decoration: none; ">{{ Str::limit($pro->title ? $pro->title: 'Product Title'  , 25) }}</abbr></p>
                                    
                                    <ul class="icons list-unstyled">
                                        <li> <abbr title="Total Order"><i  class="fad fa-usd-square"></i>{{$pro->totalOrders}}</abbr> </li>
                                        <li><abbr title="Total Stock"><i class="fad fa-cart-plus"> </i>{{$pro->totalStock}}</abbr></li>
                                        <li><abbr title="Total Wishlist"><i class="fas fa-heart"></i> {{$pro->wishlistCount}}</abbr></li>
                                    </ul>

                                </div>
                            </a>
                        </div>
                        @endforeach


                       

        

                    </div>
                                   {{ $products->links() }}
 
                </div>
            </div>