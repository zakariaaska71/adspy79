<div class="modal-body">
    <div class="row justify-content-center">
        <div class="startSide col-lg-3 rounded row">
            <div class="analytics rounded col-lg-12 col-md-6 ">
                <h4>analytics <i class="fad fa-analytics "
                        style="font-size: 19px;margin-left: 5px;"></i></h4>
                <ul class="list-unstyled @if(check_standard() == 0 ) contentBlur @endif">
                    <li>
                        <div>
                            <span>Source</span>
                            <span>{{ $item->source }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Orders</span>
                            <span>{{ $item->orders == null ? '_' : $item->orders }}</span>
                        </div>
                    </li>
                   
                    <li>
                        <div>
                            <span>Reviews</span>
                            <span>{{ $item->review  == null ? '_' : $item->review  }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Rating</span>
                            <span>4</span>
                        </div>
                    </li>
                </ul>

            </div>
              
            <ul class="list-unstyled Media col-lg-12 col-md-6 @if(check_standard() == 0 ) contentBlur @endif">
                @if( $item->store_selling_this_item != null)
                <li>
                    <a href="{{ str_replace('http://nullrefer.com/?','',$item->store_selling_this_item) }}"  target="_blank"><i class="fab fa-shopify"></i> visit Store</a>
                </li>
                @endif
                @if( $item->aliexpress_supplier != null)
                <li>
                    <a href="{{ $item->aliexpress_supplier }}" target="_blank"><i class="fas fa-bags-shopping"></i> source from aliExpress</a>
                </li>
                @endif
                @if( $item->amazon != null)
                <li>
                    <a href="{{ $item->amazon }}" target="_blank"><i class="fab fa-amazon"></i> find in amazon</a>
                </li>
                @endif
                @if( $item->facebook_ad != null)

                <li>
                    <a href="{{ $item->facebook_ad }}" target="_blank"><i class="fab fa-facebook"></i> find in facebook</a>
                </li>
                @endif
                @if( $item->ebay != null)
                <li>
                    <a href="{{ $item->ebay }}" target="_blank"><i class="fas fa-bags-shopping"></i> find in eBay</a>
                </li>
                @endif
                @if( $item->alibaba != null)
                <li>
                    <a href="{{ $item->alibaba }}" target="_blank"><i class="fad fa-shopping-bag"></i> find in alibaba</a>
                </li>
                @endif
            </ul>


        </div>
        <div class="midSide col-lg-6 ">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="main-slider">
                        <div class="slider">
                            
                            @foreach ($item->images as $image)
                            <div><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/productImage/'.$image) }}" width="400" height="300" title="{{ $item->title  }}" style="width: 100%"></div>
                                
                            @endforeach
                        </div>

                        <div class="thumbs">
                            @foreach ($item->images as $image)
                                
                         

                            <div class="thumb">
                                <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/productImage/'.$image) }}">
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <script>
                        $('.slider').bxSlider({
                           mode: 'fade',
                           captions: true,
                           slideWidth: 600,
                           pager:false
                       });

                   </script>
                  
                    
                      @if($item->interests != null)
                <div class="facebook rounded col-lg-12 col-md-6">
                <h4>Product Interest</h4>
                <ul class="list @if(check_standard() == 0 ) contentBlur @endif" style="margin-left:5%">
                    @php 
                    $ints = explode(',',$item->interests);
                    @endphp
                    @foreach(($ints) as $in)
                    <li> {{ $in }} </li> 
                    @endforeach

                </ul>
            </div>
            @endif








                </div>

                <div class="detiles col-lg-5 col-md-5">
                    <h5 class="des-title">{{ $item->title }}</h5>
                    <span class="catg rounded-pill @if(check_standard() == 0 ) contentBlur @endif">{{ $item->category }}</span>
                    <h3 class="description">description</h3>
                    <p class="@if(check_standard() == 0 ) contentBlur @endif">
                    {{ $item->decs ? $item->decs : 'product description' }}
                    </p>

                </div>
            </div>

        </div>
        <div class="endSide col-lg-3 rounded row">

            <div class="targeting rounded col-lg-12 col-md-6">
                <h4>targeting <i class="fad fa-bullseye-arrow"
                        style="font-size: 22px;margin-left: 5px;"></i></h4>
                <ul class="list-unstyled @if(check_standard() == 0 ) contentBlur @endif">
                    <li>
                        <div>
                            <span>Country</span>
                            <span>{{ $item->country  == null ? '_' : $item->country }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Gender</span>
                            <span>{{ $item->gender   == null ? '_' : $item->gender  }}</span>
                        </span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Age Rang</span>
                            <span>{{ $item->age_range    == null ? '_' : $item->age_range   }}</span>
                        </div>
                    </li>
                     
                    <li>
                        <div>
                            <span>Audience Size</span>
                            <span>{{ $item->audience_size    == null ? '_' : $item->audience_size   }}</span>
                        </div>
                    </li>
            
                </ul>
            </div>


            <div class="facebook-engagement rounded col-lg-12 col-md-6">
                <h4>facebook engagement</h4>
                <ul class="list-unstyled @if(check_standard() == 0 ) contentBlur @endif">
                    <li><i class="fas fa-thumbs-up"></i> {{ $item->liks == null ? 0 : $item->liks  }}</li>
                    <li><i class="fas fa-comment"></i> {{ $item->comment == null ? 0 : $item->comment  }}</li>
                    <li><i class="fas fa-share-alt"></i> {{ $item->share == null ? 0 : $item->share  }}</li>
                </ul>
            </div>
        

            <div class="cost targeting rounded col-lg-12 col-md-6">
                <h4>your profit cost</h4>
                <ul class="list-unstyled @if(check_standard() == 0 ) contentBlur @endif">
                    <li>
                        <div>
                            
                            <span>Selling Price</span>
                            <span>{{ $item->selling_price  == null ? '0$' : $item->selling_price  }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Shipping Price</span>
                            <span>{{ $item->cpa  == null ? '0$' : $item->cpa  }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Product Cost</span>
                            <span>{{ $item->cost   == null ? '0$' : $item->cost   }}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Profit Margin</span>
                            <span>{{ $item->margin   == null ? '0$' : $item->margin   }}</span>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
@if (check_standard() == 0)
@guest
    <div class="model-overlay ">
        <div class="sign-msg text-center ">
            <p> Standerd Plan Can see this <span>register</span> </p>
            <a href="{{ route('register') }}">register now</a>
        </div>
    </div>
@else
    <div class="model-overlay ">
        <div class="sign-msg text-center ">
            <p> Standard Plan Can see this analysis <span>Please upgrade your account</span> </p>
            <a href="{{ route('user.profile') }}">Upgrade</a>
        </div>
    </div>
@endguest
@endif