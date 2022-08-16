<div class="modal-body">
    <div class="container-fluid">
        <div class="row">
            <div class="post-media co col-md-4 col-lg-4 ">

                <div class="img-view-popup post rounded">
                    <div class="header">
                        <div class="headerTop">
                            <img class="icon"
                                onerror="this.onerror=null;this.src='{{ ('https://aas-bucket.s3.amazonaws.com/uploads/defult.jpg') }}';"
                                src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/' . @$item->resorese->page_logo) }}" alt="">
                            <div class="block">
                                <p class="name ">{{ @$item->page_name ? $item->page_name : 'Page name' }}</p>
                            </div>


                        </div>


                        <p class="post-title posttitleedit div-txt"
                            title="{{ $item->Ad_Description != null ? $item->Ad_Description : 'post dec' }}">⭐️
                            {!! Str::limit($item->Ad_Description ? str_replace(["\n\r", "\n", "\r"], '', $item->Ad_Description) : 'post dec') !!} ⭐️
                        </p>

                    </div>
                    <div class="post-body">
                        <div class="img-view">
                            {!! @$item->data_post() !!}


                        </div>
                        <ul class="list-unstyled">
                            <li><i
                                    class="fas fa-thumbs-up"></i><span>{{ conert_k($item->related->last()->like) }}</span>
                            </li>
                            <li><i
                                    class="fas fa-comment"></i><span>{{ conert_k($item->related->last()->comment) }}</span>
                            </li>
                            <li><i class="fas fa-share"></i><span>{{ conert_k($item->related->last()->share) }}</span>
                            </li>
                        </ul>

                        <a target="_blank" href="{{ $item->page_link_first() }}"
                            class="link">{{ $item->page_link_test() }}</a>
                        <a target="_blank" href="{{ $item->page_link_first() }}"
                            class="btn btn-outline-info btn-sm ml-3 shop">{{ $item->button }}</a>
                        <p class="mt-3"> ➣ {!! @$item->title !!}</p>

                    </div>
                </div>

                <div class="list-item itemlist ">
                    <ul class="list-unstyled dis_block post_url  @if (check_standard() == 0) contentBlur @endif">
                        <li class="rounded"> <a target="_blank"
                                @if (check_standard() != 0) href="{{ $item->post_link }}" @endif><i
                                    class="fab fa-facebook"></i>Visit Facebook Post </a></li>
                        <li class="rounded"><a target="_blank"
                                @if (check_standard() != 0) href="{{ $item->page_link }}" @endif><img
                                    src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/' . @$item->resorese->first()->page_logo) }}"
                                    style="width: 20px; height: 20px; border-radius: 50%;"> Visit Facebook
                                page</a></li>
                        <li class="rounded"><a target="_blank"
                                @if (check_standard() != 0) href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&view_all_page_id={{ $item->page_id }}&search_type=page&media_type=all" @endif><img
                                    src="{{ asset('new_style/images/facebook ad icon3.jpg') }}"></i>Visit Facebook
                                Ad Library</a></li>
                        <li class="rounded">
                            <a target="_blank"
                                @if (check_standard() != 0) href="{{ $item->landanig_page }}" @endif>
                                <img src="{{ asset('new_style/images/landing-icon.png') }}"></i>Visit Landing Page
                            </a>
                        </li>
                        <li class="rounded"><a target="_blank"
                                @if (check_standard() != 0) href="{{ route('dawnload.post', $item->_id) }}" @endif><img
                                    src="{{ asset('new_style/images/icons8-web-design-48.png') }}"></i>Download <span
                                    class="capitalize">{{ $item->ad_format }} Post </a></span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="contentDetails  col-md-8 col-lg-8 ">
                <div class="row">
                    <div class="contentStatistics mb-2 col-lg-12 col-md-12 col-sm-12 rounded">
                        <div class="row">
                            <div class="column col-lg-4 col-md-4">
                                <h4>Post Created <i class="fas fa-calendar-alt"></i> </h4>
                                <span>{{ $item->post_create }}   </span>
                            </div>

                            <div class="column col-lg-4 col-md-4">
                                <h4>last seen <i class="fas fa-calendar-alt"></i></h4>
                                <span>{{ $item->last_seen }} </span>
                            </div>

                            <div class="column col-lg-4 col-md-4">
                                <h4>duration <i class="fas fa-stopwatch"></i></h4>
                                <span> {!! $item->count_date() !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="chart col-sm-12 col-lg-12 col-md-12 table-responsive-sm rounded">

                        <h5>Real trend chart</h5>
                        <canvas id="myChart"
                            class="mychart  @if (check_standard() == 0) contentBlur @endif"></canvas>
                        <div id="addToCart-modal-body">

                        </div>
                    </div>
                </div>
                <script>
                    (function($) {

                        "use strict";

                        $('#id_0').datetimepicker({
                            allowInputToggle: true,
                            showClose: true,
                            showClear: true,
                            showTodayButton: true,
                            format: "MM/DD/YYYY hh:mm:ss A",
                            icons: {
                                time: 'fa fa-clock-o',

                                date: 'fa fa-calendar-o',

                                up: 'fa fa-chevron-up',

                                down: 'fa fa-chevron-down',

                                previous: 'fa fa-chevron-left',

                                next: 'fa fa-chevron-right',

                                today: 'fa fa-chevron-up',

                                clear: 'fa fa-trash',

                                close: 'fa fa-close'
                            },

                        });



                        var figure = $(".video").hover(hoverVideo, hideVideo);

                        function hoverVideo(e) {
                            $('video', this).get(0).play();
                        }

                        function hideVideo(e) {
                            $('video', this).get(0).pause();
                        }



                        var ctx = document.getElementById('myChart').getContext('2d');





                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! $item->dates() !!},
                                datasets: [

                                    {

                                        label: 'comments',
                                        data: {!! $item->array_like_comment() !!},
                                        backgroundColor: [
                                            'rgba(54, 162, 235, 0.2)'

                                        ],
                                        borderColor: [

                                            'rgba(255, 206, 86, 1)'

                                        ],
                                        borderWidth: 1,
                                        fill: true,
                                        tension: 0.5

                                    }

                                    ,
                                    {

                                        label: 'shares',
                                        data: {!! $item->array_like_share() !!},
                                        backgroundColor: [
                                            'rgba(75, 192, 192, 0.2)'

                                        ],
                                        borderColor: [

                                            'rgba(153, 102, 255, 1)'
                                        ],
                                        borderWidth: 1,
                                        tension: 0.5,
                                        fill: true

                                    },
                                    {
                                        label: 'likes',
                                        data: {!! $item->array_like_post() !!},
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
                                        borderWidth: 1,
                                        fontSize: 12,
                                        fill: true,
                                        tension: 0.5
                                    },



                                ]


                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }


                            }


                        });




                        $('select').niceSelect();


                    })(jQuery);
                </script>
                @auth

                    <div class="tables-data rounded  ">
                    @else
                        <div class="tables-data rounded ">

                        @endauth
                        <h5>Facebook Targeting</h5>

                        <div class="row @if (check_standard() == 0) contentBlur @endif">
                            <table class="table col-lg-6">
                                <thead>
                                    <tr class="table-info">
                                        <th scope="col"><i class="fad fa-ad fa-2x"></i>Ad details</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fad fa-globe-americas fa-2x"></i>AD Language</td>
                                        <td>{{ strtoupper($item->t_lang) ? strtoupper($item->t_lang) : '_' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fad fa-eye fa-2x"></i>Country Seen in</td>
                                        <td>

                                            @if($item->country_seen_new != null)
                                            <span title="
                                                   <?php
                                                   foreach ((array_unique($item->country_seen_new)) as $cat) {
                                                       echo $cat . ',';
                                                   }
                                                   ?>
                                                   ">
                                                @foreach (($item->country_seen_new) as $key => $cat)
                                                    @if ($key == 1)
                                                    @break
                                                @endif
                                                {{ $cat }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
    
                                            @endforeach
                                        </span>
                                        @else 
                                        -
                                        @endif
                                        </td>
    
                                       
                                    </tr>

                                    <tr>
                                        <td> <i class="fad fa-align-left fa-2x"></i>Category</td>
                                        <td>
                                            <span title="
                                                   <?php
                                                   foreach (json_decode($item->category) as $cat) {
                                                       echo $cat . ',';
                                                   }
                                                   ?>
                                                   ">
                                                @foreach (json_decode($item->category) as $key => $cat)
                                                    @if ($key == 1)
                                                    @break
                                                @endif
                                                {{ $cat }} <i class="fa fa-arrow-right" aria-hidden="true"></i>

                                            @endforeach
                                        </span>



                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td> <i class="fad fa-file fa-2x"></i>Page Id</td>
                                    <td>{{ $item->page_id }}</td>
                                </tr>
                                <tr>

                                    <td> <i class="fal fa-sim-card fa-2x"></i> Post Id</td>
                                    <td>{{ $item->post_id }}</td>
                                </tr>

                            </tbody>
                        </table>


                        <table class="table col-lg-6">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col"><i class="fab fa-facebook fa-2x"></i> Facebook Targeting</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fad fa-bullseye-arrow fa-2x"></i> Targeting interest </td>
                                        <td>
                                        {{ $item->interested ? $item->interested : '_' }}



                                    </td>
                                        {{-- {{ $item->interested ? $item->interested : '_' }} --}}




                                </tr>
                                <br>
                                <tr>
                                    <td><i class="fad fa-location fa-2x"></i>Target Countries</td>

                                    <td>


                                        @if($item->country_new != null)
                                        <span title="
                                               <?php
                                               foreach ((array_unique($item->country_new)) as $cat) {
                                                   echo $cat . ',';
                                               }
                                               ?>
                                               ">
                                            @foreach (($item->country_new) as $key => $cat)
                                                @if ($key == 1)
                                                @break
                                            @endif
                                            {{ $cat }} <i class="fa fa-arrow-right" aria-hidden="true"></i>

                                        @endforeach
                                    </span>
                                    @else 
                                    -
                                    @endif
                                    </td>
                                 

                                </tr>
                                <tr>
                                    <td><i class="fad fa-flag-usa fa-2x"></i>Target Age</td>
                                    <td>{!! $item->age ?  Str::limit($item->age, 20, ' ...') : '_' !!}
                                        <i class="fa fa-arrow-right" title="{{ $item->age }}" aria-hidden="true"></i>
                                    </td>
                                </tr>


                                <tr>
                                    <td><i class="fad fa-venus-mars fa-2x"></i>Target Gender</td>
                                    <td>{{ $item->gender ? $item->gender : '_' }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fad fa-globe-americas fa-2x"></i>Target Language</td>
                                    <td>{{ $item->lang ? $item->lang : '_' }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
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


</div>
