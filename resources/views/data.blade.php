@if (isset($posts))
    @foreach ($posts as $key => $item)
        <div class="post col-sm-12 col-md-6 col-lg-4 rounded">
            <div class="header">
                <div class="headerTop">
                    <img class="icon"
                        onerror="this.onerror=null;this.src='{{ ('https://aas-bucket.s3.amazonaws.com/uploads/defult.jpg') }}';"
                        src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/' . @$item->resorese->page_logo) }}" alt="{{ @$item->title }}">
                    <div class="block">
                        <p class="name ">
                            {{ Str::limit($item->page_name ? $item->page_name : 'page name', 20) }} </p>
                        <p>
                            @if (@$item->post_create != false)
                                <span>{{ @$item->post_create }} </span>
                                @endif &nbsp;- @if (@$item->last_seen != false)
                                    <span>{{ @$item->last_seen }}</span>
                                    @endif <span class="" style="font-size: 12px; color: gray;"><i
                                            class="fal fa-clock " style="font-size: 12px; color: gray;"></i>
                                        {{ $item->count_date() }}</span>
                        </p>
                    </div>

                    @auth

                        <i onclick="likepost(this,'{{ $item->_id }}')"
                            class=" {{ postlike($item->_id) }}  fa-heart"></i>


                    @endauth
                    <div class="clearfix"></div>
                </div>
                @php
                $dataa = str_replace( "</p>", "", Str::limit($item->Ad_Description ?$item->Ad_Description : 'Post description', 35) );
                $dataa = str_replace( "<p>", "", Str::limit($item->Ad_Description ?$item->Ad_Description : 'Post description', 35) );
            @endphp
                <p class="post-title">⭐️ {!! $dataa !!} ⭐️
                </p>

            </div>
            @if ($key > 2 && !auth()->user())
                <div class="post-body blur position-relative">
                    <div class="img-view ">

                        <img class="post-img-2" src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/' . $item->resorese->image) }}" alt="">

                    </div>
                    <ul class="list-unstyled ">
                        <li><i class="fas fa-thumbs-up"></i><span>50</span></li>
                        <li><i class="fas fa-comment"></i><span>20</span></li>
                        <li><i class="fas fa-share"></i><span>8</span></li>
                        <li><i class="fas fa-eye"></i><span>350</span></li>
                    </ul>

                    <a href="#" class="link">www.eubiofficial.com</a>
                    <a href="#" class="btn btn-outline-info btn-sm ml-3 shop">Shop Now</a>
                    <p class="mt-3"> ➣ Introducing.Our best-selling skulls just ...</p>

                    <div class="btn-block">
                        <a href="#" class="btn">add library</a>
                        <a href="#" style="background-color:unset;"><i class="fab fa-facebook"></i></a>
                        @guest
                            <a href="#" class="btn" data-toggle="modal" data-target="#staticBackdrop">show
                                analytic</a>
                        @else
                            @if (auth()->user()->subscriptions()->where('name', 'Statndrd')->active()->first())
                                <a href="#" class="btn" data-toggle="modal" data-target="#staticBackdrop">show
                                    analytic</a>
                            @endif
                        @endguest


                    </div>


                </div>
                <div class="over-lay-img">
                    <i class="fas fa-lock fa-4x"></i>
                    <a href="#" class="access-btn btn" data-toggle="modal" data-target="#staticBackdrop2">Access
                        Data</a>

                    <a href="#" class="access-btn btn" data-toggle="modal" data-target="#exampleModal">Access Data</a>
                </div>
            @else
                <div class="post-body">
                    <div class="img-view">
                        {!! @$item->data_post() !!}

                    </div>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-thumbs-up"></i><span>{{ conert_k(@$item->related->last()->like) }}</span>
                        </li>
                        <li><i
                                class="fas fa-comment"></i><span>{{ conert_k(@$item->related->last()->comment) }}</span>
                        </li>
                        <li><i class="fas fa-share"></i><span>{{ conert_k(@$item->related->last()->share) }}</span>
                        </li>
                    </ul>
                    <a href="{{ $item->page_link_first() }}"
                        class="link">{{ $item->page_link_test() }}</a>
                    <a target="_blank" href="{{ $item->landanig_page }}"
                        class="btn btn-outline-info btn-sm ml-3 shop">{{ $item->button ? str_replace('_', ' ', $item->button) : 'Shop now' }}</a>
                        @php
                            $data = str_replace( "</p>", "", Str::limit($item->title ? $item->title : 'Post title', 35) );
                            $data = str_replace( "<p>", "", Str::limit($item->title ? $item->title : 'Post title', 35) );
                        @endphp
                    <p class="mt-3"> ➣ {!!   $data  !!}
                       
                    </p>

                    <div class="btn-block">
                        <a target="_blank"
                            href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&view_all_page_id={{ $item->page_id }}&search_type=page&media_type=all"
                            class="btn">ads library</a>
                        <a target="_blank" href="{{ @$item->post_link }}" style="background-color:unset;"><i
                                class="fab fa-facebook"></i></a>
                        <a class="btn" onclick="make('{{ $item->_id }}')" data-toggle="modal"
                            data-target="#staticBackdrop}">show analytic</a>

                    </div>
                    <div class="modal fase" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="staticBackdropLabel">Facebook Ad Analytic</h5>

                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="addToCart-modal-body">
                                    <div class="c-preloader text-center p-3">
                                        <i class="fa fa-spinner fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <!--<button type="button" class="btn ok">Ok</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>






        <!--<h2 style="text-align: center;" >No Data</h2>-->
    @endforeach
@endif
<div class="modal modal-2  fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel2">Login or SignUp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="sign-box col-lg-6 ">
                        <div class="img-box text-center rounded-circle">
                            <img src="{{ asset('new_style/images/contract.png') }}" style="width: 35px;">
                        </div>

                        <h3 class="text-center mb-4 text-secondary font-weight-bold">Login</h3>
                        <form class="form-horizontal" method="post" action="{{ route('login') }}">
                            @csrf
                            <input type="email" id="username" name="email" value="{{ old('email') }}" required
                                class="form-control mb-2" placeholder="Email">

                            <input name="password" type="password" class="form-control mb-2" placeholder="Password">

                            <input type="submit" class="send btn btn-info mt-4 m-b2" value="Send">


                        </form>

                    </div>

                    <div class="sign-box col-lg-6">
                        <div class="img-box text-center rounded-circle">
                            <img src="{{ asset('new_style/images/add-user.png') }}" style="width: 35px;">
                        </div>

                        <h3 class="text-center mb-4 text-secondary font-weight-bold">SingUp</h3>

                        <form class="form-horizontal auth-form my-4" method="post" action="{{ route('register') }}">
                            @csrf
                            <input type="text" class="form-control mb-2"  id="username" placeholder="Enter username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                            <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">

                            <!-- <input type="number" class="form-control mb-2" placeholder="Phone"> -->

                            <select name="country" id="country" class="form-control mb-1" style="margin-left: 40px;padding-left: 5px;
                            padding-top: 0;">
                                <option value="">Select Country</option>
                                @foreach (\Monarobase\CountryList\CountryListFacade::getList() as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select> 

                            <input type="password" class="form-control mb-2" id="userpassword" placeholder="Enter password" name="password" required autocomplete="new-password">
                            <input type="password" class="form-control mb-2"  id="conf_password" placeholder="Enter Confirm Password" name="password_confirmation" required autocomplete="new-password">
                         
                       

                          <div class=" {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}" style="margin-left: 50px;">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                            
                            </div>
                            <input type="submit" class="send btn btn-info mt-4 m-b2" value="Send">
  

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">ok</button>
            </div>
        </div>
    </div>
</div>
{!! NoCaptcha::renderJs() !!}

<script>
    function likepost(obj, id) {

        $.ajax({
            type: 'post',
            url: "{{ route('like_post') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'post_id': id
            },

            success: function(data) {

                if (data == 1) {

                    $(obj).removeClass('far');
                    $(obj).addClass('fas');

                } else {
                    $(obj).removeClass('fas');
                    $(obj).addClass('far');

                }


            }
        });
    }
</script>
