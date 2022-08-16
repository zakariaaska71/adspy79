<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ general('title') }} | Likes</title>
    <link rel="shortcut icon" href="{{('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo'))}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js" integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('new_style/icons/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/css/all.css') }}">

    <!--<link rel="stylesheet" href="{{ asset('new_style/css/style.css') }}">-->

    <link rel="stylesheet" href="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/css/nice-select.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{ asset('new_style/css/style2.css') }}">
    <script src="{{ asset('new_style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('new_style/js/popper.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new_style/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


</head>


<body>


    @include('front.nav')
    <div class="back">
        <div class="container">
            <span class="form-inline search_form my-2 my-lg-0" >
                <select id="ads_info" name="search_type" class="select rounded-0 s-select">
                    <option value="title" disable >Ads title</option>
                    <option value="page_name">Advertiser</option>
                    <option value="landanig_page">Landing page</option>
                </select>
                <input class="form-control mr-sm-2 rounded-0 search-input" id="search_input" name="serach_text" type="search" placeholder="Please enter any ad keyword" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0 rounded-0 search-btn" type="button"><i class="fas fa-search"></i></button>
            </span>

        </div>

        <div class="container">

            <div class="panel rounded">
                <div class="row">
                    <form class="">
                        <div class="block-1 ">
                            <h3 class="title">basic:</h3>

                            <div class="i-box">
                                <i class="fab fa-facebook fa-2x"></i>
                            <select class="select">
                                <option data-display="Networks">Networks</option>
                                <option value="Facebook" selected>Facebook</option>
                            </select>
                            </div>
                            
                            

                            <div class="i-box">
                                <i class="fad fa-globe-americas fa-2x"></i>
                            <select class="country" name="country">
                                <option data-display="country">Country</option>

                            </select>
                            </div>

                            

                            <div class="content countries rounded unc_path">
                                <h3 class="border-bottom text-left">country</h3>
                                <div class="row1">
                                    <span class="d-block text-primary">All country

                                        <input class="check" id="" value="" type="checkbox">

                                    </span>
                                    <span ><label for='Algeria' ><input class="check"id="Algeria"  value="" type="checkbox">Algeria</label></span>
                                    <span><label for='Angola'><input class="check" id="Angola" value="" type="checkbox">Angola</label></span>
                                    <span><label for='Argentina'><input class="check" id="Argentina" value="" type="checkbox">Argentina</label></span>
                                    <span><label for='Austria'><input class="check" id="Austria" value="" type="checkbox">Austria</label></span>
                                    <span><label for='Azerbaijan'><input class="check" id="Azerbaijan" value="" type="checkbox">Azerbaijan</label></span>
                                    <span><label for='Bahrain'><input class="check" id="Bahrain" value="" type="checkbox">Bahrain</label></span>
                                    <span><label for='Belgium'><input class="check" id="Belgium" value="" type="checkbox">Belgium</label></span>
                                    <span><label for='Brazil'><input class="check" id="Brazil" value="" type="checkbox">Brazil</label></span>
                                    <span><label for='Canada'><input class="check" id="Canada" value="" type="checkbox">Canada</label></span>
                                    <span><label for='Chile'><input class="check" id="Chile" value="" type="checkbox">Chile</label></span>
                                    <span><label for='Colombia'><input class="check" id="Colombia" value="" type="checkbox">Colombia</label></span>
                                    <span><label for='Egypt'><input class="check" id="Egypt" value="" type="checkbox">Egypt</label></span>
                                    <span><label for='Emirates'><input class="check" id="Emirates" value="" type="checkbox">Emirates</label></span>
                                    <span><label for='Europe'><input class="check" id="Europe" value="" type="checkbox">Europe</label></span>
                                    <span><label for='France'><input class="check" id="France" value="" type="checkbox">France</label></span>
                                    <span><label for='Germany'><input class="check" id="Germany" value="" type="checkbox">Germany</label></span>
                                    <span><label for='Greece'><input class="check" id="Greece" value="" type="checkbox">Greece</label></span>
                                    <span><label for='HK/MO/TW'><input class="check" id="HK/MO/TW" value="" type="checkbox">HK/MO/TW</label></span>
                                    <span><label for='Hong Kong'><input class="check" id="Hong Kong" value="" type="checkbox">Hong Kong</label></span>
                                    <span><label for='India'><input class="check" id="India" value="" type="checkbox">India</label></span>
                                    <span><label for='Indonesia'><input class="check" id="Indonesia" value="" type="checkbox">Indonesia</label></span>
                                    <span><label for='Ireland'><input class="check" id="Ireland" value="" type="checkbox">Ireland</label></span>
                                    <span><label for='Israel'><input class="check" id="Israel" value="" type="checkbox">Israel</label></span>
                                    <span><label for='Italy'><input class="check" id="Italy" value="" type="checkbox">Italy</label></span>
                                  
                              
                                 



                                </div>

                                <div class="row1">
                                    <span><label for='Japan'><input class="check" id="Japan" value="" type="checkbox">Japan</label></span>
                                    <span><label for='Korea'><input class="check" id="Korea" value="" type="checkbox">Korea</label></span>
                                    <span><label for='Kenya'><input class="check" id="Kenya" value="" type="checkbox">Kenya</label></span>
                                    <span><label for='Korea'><input class="check" id="Korea" value="" type="checkbox">Korea</label></span>
                                    <span><label for='Kuwait'><input class="check" id="Kuwait" value="" type="checkbox">Kuwait</label></span>
                                    <span><label for='Lebanon'><input class="check" id="Lebanon" value="" type="checkbox">Lebanon</label></span>
                                    <span><label for='Luxembourg'><input class="check" id="Luxembourg" value="" type="checkbox">Luxembourg</label></span>
                                    <span><label for='Macau'><input class="check" id="Macau" value="" type="checkbox">Macau</label></span>
                                    <span><label for='Malaysia'><input class="check" id="Malaysia" value="" type="checkbox">Malaysia</label></span>
                                    <span><label for='Mexico'><input class="check" id="Mexico" value="" type="checkbox">Mexico</label></span>
                                    <span><label for='Middle'><input class="check" id="Middle" value="" type="checkbox">Middle East</label></span>
                                    <span><label for='Netherlands'><input class="check" id="Netherlands" value="" type="checkbox">Netherlands</label></span>
                                    <span><label for='NewZealand'><input class="check" id="NewZealand" value="" type="checkbox">NewZealand</label></span>
                                    <span><label for='Nigeria'><input class="check" id="Nigeria" value="" type="checkbox">Nigeria</label></span>
                                    <span><label for='North America'><input class="check" id="North America" value="" type="checkbox">North America</label></span>
                                    <span><label for='Norway'><input class="check" id="Norway" value="" type="checkbox">Norway</label></span>
                                    <span><label for='Oceania'><input class="check" id="Oceania" value="" type="checkbox">Oceania</label></span>
                                    <span><label for='Oman'><input class="check" id="Oman" value="" type="checkbox">Oman</label></span>
                                    <span><label for='Pakistan'><input class="check" id="Pakistan" value="" type="checkbox">Pakistan</label></span>
                                    <span><label for='Panama'><input class="check" id="Panama" value="" type="checkbox">Panama</label></span>
                                    <span><label for='Paraguay'><input class="check" id="Paraguay" value="" type="checkbox">Paraguay</label></span>
                                    <span><label for='Peru'><input class="check" id="Peru" value="" type="checkbox">Peru</label></span>
                                    <span><label for='Philippines'><input class="check" id="Philippines" value="" type="checkbox">Philippines</label></span>
                                    <span><label for='Poland'><input class="check" id="Poland" value="" type="checkbox">Poland</label></span>
                                    <span><label for='Portugal'><input class="check" id="Portugal" value="" type="checkbox">Portugal</label></span>
                                    
                                    
                 
                               

                                </div>



                                <div class="row1">
                                    <span><label for='Qatar'><input class="check" id="Qatar" value="" type="checkbox">Qatar</label></span>
                                    <span><label for='Romania'><input class="check" id="Romania" value="" type="checkbox">Romania</label></span>
                                    <span><label for='Russia'><input class="check" id="Russia" value="" type="checkbox">Russia</label></span>
                                    <span><label for='Saudi Arabia'><input class="check" id="Saudi Arabia" value="" type="checkbox">Saudi Arabia</label></span>
                                    <span><label for='Singapore'><input class="check" id="Singapore" value="" type="checkbox">Singapore</label></span>
                                    <span><label for='South Africa'><input class="check" id="South Africa" value="" type="checkbox">South Africa</label></span>
                                    <span><label for='South America'><input class="check" id="South America" value="" type="checkbox">South America</label></span>
                                    <span><label for='Southeast Asia'><input class="check" id="Southeast Asia" value="" type="checkbox">Southeast Asia</label></span>
                                    <span><label for='Southern Asia'><input class="check" id="Southern Asia<" value="" type="checkbox">Southern Asia</label></span>
                                    <span><label for='Spain'><input class="check" id="Spain" value="" type="checkbox">Spain</label></span>
                                    <span><label for='Sweden'><input class="check" id="Sweden" value="" type="checkbox">Sweden</label></span>
                                    <span><label for='Switzerland'><input class="check" id="Switzerland" value="" type="checkbox">Switzerland</label></span>
                                    <span><label for='Thailand'><input class="check" id="Thailand" value="" type="checkbox">Thailand</label></span>
                                    <span><label for='Turkey'><input class="check" id="Turkey" value="" type="checkbox">Turkey</label></span>
                                    <span><label for='Ukraine'><input class="check" id="Ukraine" value="" type="checkbox">Ukraine</label></span>
                                    <span><label for='United Kingdom'><input class="check" id="United Kingdom" value="" type="checkbox">United Kingdom</label></span>
                                    <span><label for='United States'><input class="check" id="United States" value="" type="checkbox">United States</label></span>
                                    <span><label for='Venezuela'><input class="check" id="Venezuela" value="" type="checkbox">Venezuela</label></span>
                                    <span><label for='Vietnam'><input class="check" id="Vietnam" value="" type="checkbox">Vietnam</label></span>
                                   
                                    

                                </div>

                                <div class="text-center border-top pt-2">
                                    <button class="btn btn-primary count" type="button">ok</button>
                                    <button class="btn btn-light cancel">cancel</button>
                                </div>
                            </div>

                            <div class="i-box">

                            <i class="fad fa-photo-video fa-2x"></i>
                            <!-- <i class="fad fa-image-polaroid fa-2x"></i> -->
                            <select id="post_type">
                                <option disabled data-display="Post type">Post type</option>
                                <option value="all" selected>ALL</option>
                                <option value="video">Video</option>
                                <option value="image">Image</option>

                            </select>
                          
                            </div>
                            <div class="i-box">
                            <i class="fas fa-align-left fa-2x"></i>
                            <select id="category">
                                <option data-display="Category">Category</option>
                                <option value="All">All</option>
                                <option value="Bags&Shoes">Bags&Shoes</option>
                                <option value="Jewelry&Watches">Jewelry&Watches</option>
                                <option value="Vehicles">Vehicles</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Beauty">Beauty</option>
                                <option value="Events">Events</option>
                                <option value="Phone&Electronics ">Phone&Electronics </option>
                                <option value="Business&Finance">Business&Finance</option>
                                <option value="Home&Garden">Home&Garden</option>
                                <option value="Health&Fitness">Health&Fitness</option>

                                


                            </select>
                            </div>


                        </div>






                        <div class="block-1">

                            <h3 class="title">Advanced:</h3>
                            <div class="i-box">
                            <i class="fad fa-language fa-2x"></i>
                            <select class="lang">
                                <option data-display="Language">Language</option>
                            </select>
                            </div>
                            <div class="langs content">
                            <h3 class="border-bottom text-left">Lang</h3>
                                <div class="row1">

                             		<span><label for='English'><input class="check" id="English" value="" type="checkbox">English</label></span>
                                    <span><label for='Japanese'><input class="check" id="Japanese" value="" type="checkbox">Japanese</label></span>
                                    <span><label for='Korean'><input class="check" id="Korean" value="" type="checkbox">Korean</label></span>
                                    <span><label for='Arabic'><input class="check" id="Arabic" value="" type="checkbox">Arabic</label></span>
                                    <span><label for='Chinese'><input class="check" id="Chinese" value="" type="checkbox">Chinese (Traditi...)</label></span>
                                    <span><label for='Thai'><input class="check" id="Thai" value="" type="checkbox">Thai</label></span>
                                    <span><label for='Polish'><input class="check" id="Polish" value="" type="checkbox">Polish</span>


             
                                </div>

                                <div class="row1">
                         			<span><label for="Spanish"><input class="check" id="Spanish" value="" type="checkbox">Spanish</label></span>                                  
                                    <span><label for="French"><input class="check" id="French" value="" type="checkbox">French</label></span>
                                    <span><label for="Hindi"><input class="check" id="Hindi" value="" type="checkbox">Hindi</label></span>
                                    <span><label for="Italian"><input class="check" id="Italian" value="" type="checkbox">Italian</label></span>
                                    <span><label for="Malay"><input class="check" id="Malay" value="" type="checkbox">Malay</label></span>
                                    <span><label for="Dutch"><input class="check" id="Dutch" value="" type="checkbox">Dutch</label></span>
                                    <span><label for="Turkish"><input class="check" id="Turkish" value="" type="checkbox">Turkish</label></span>
                                
                                
                           

                                </div>

                                <div class="row1">
                                    <span><label for="Portuguese"><input class="check" id="Portuguese" value="" type="checkbox">Portuguese</label></span>
                                    <span><label for="Russian"><input class="check" id="Russian" value="" type="checkbox">Russian</label></span>
                                    <span><label for="Vietnamese"><input class="check" id="Vietnamese" value="" type="checkbox">Vietnamese</label></span>
                                    <span><label for="Indonesian"><input class="check" id="Indonesian" value="" type="checkbox">Indonesian</label></span>
                                    <span><label for="Hebrew"><input class="check" id="Hebrew" value="" type="checkbox">Hebrew</label></span>
                                    <span><label for="Filipino"><input class="check" id="Filipino" value="" type="checkbox">Filipino</label></span>
                                    <span><label for="Norwegian"><input class="check" id="Norwegian" value="" type="checkbox">Norwegian</label></span>

                                </div>


								<div class="text-center border-top pt-2">
                                    <button class="btn btn-primary language" type="button">ok</button>
                                    <button class="btn btn-light cancel">cancel</button>
                                </div>



                            </div>

                            <div class="i-box">
                            <i class="fad fa-exchange-alt fa-2x"></i>
                            <select class="Engagement">
                                <option data-display="Engagement">Engagement</option>
                            </select>
                            </div>
                            <div class="Engagements content">
                                <div class="row1" id="like">
                                    <span>like:</span>
                                    <span>1~100</span>
                                    <span>101~1000</span>
                                    <span>>1000</span>

                                    <input type="number" class="min form-control d-inline-block" style="width: 80px;" placeholder="min"> ~
                                    <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">

                                </div>

                                <div class="row1" id="comment">
                                    <span>comment:</span>
                                    <span>1~100</span>
                                    <span>101~1000</span>
                                    <span>>1000</span>
                                    <input type="number" class="min form-control d-inline-block ok" style="width: 80px;" placeholder="min"> ~
                                    <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">

                                </div>

                                <div class="row1" id="share">
                                    <span>share:</span>
                                    <span>1~100</span>
                                    <span>101~1000</span>
                                    <span>>1000</span>
                                    <input type="number" class="min form-control d-inline-block ok" style="width: 80px;" placeholder="min"> ~
                                    <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">
                                </div>


                                <div class="text-center border-top pt-2">
                                    <button class="btn btn-primary OK">ok</button>
                                    <button class="btn btn-light cancel">cancel</button>
                                </div>

                            </div>


                            <div class="i-box">
                            <i class="fad fa-bullseye-arrow fa-2x"></i>
                            <select class="objective">
                                <option data-display="objective/ cta">objective/ cta</option>

                            </select>
                            </div>

                            <div class="content objectives rounded">
                                <h3 class="obj border-bottom text-left"> Objective</h3>
                                <div class="row1">
                                    <h3 class="text-dark">Shopping</h3>

                          
                                    <span><label for="Ord"><input class="check" id="Ord"value="" type="checkbox" >Order Now</label></span>
                                    <span><label for="Sel"><input class="check" id="Sel"value="" type="checkbox" >Sell Now</label></span>
                                    <span><label for="Sho"><input class="check" id="Sho"value="" type="checkbox" >Shop Now</label></span>
                                    <span><label for="Sta"><input class="check" id="Sta"value="" type="checkbox" >Start Order</label></span>
                                     <span><label for="Add"><input class="check" id="Add"value=""type="checkbox" >Add to Cart</label></span>


                                </div>

                                <div class="row1">
                                    <h3 class="text-dark">Conversion / Leads</h3>

									<span><label for="Con"><input class="check" id="Con"value="" type="checkbox" >Contact Us</label></span>
                                    <span><label for="Lea"><input class="check" id="Lea"value="" type="checkbox" >Learn More</label></span>
                                    <span><label for="Get"><input class="check" id="Get"value="" type="checkbox" >Get Offer</label></span>
                                    <span><label for="Get"><input class="check" id="Get"value="" type="checkbox" >Get Showtimes</label></span>
                                    <span><label for="Req"><input class="check" id="Req"value="" type="checkbox" >Request Time</label></span>
                                    <span><label for="See"><input class="check" id="See"value="" type="checkbox" >See Menu</label></span>
                                    <span><label for="Sub"><input class="check" id="Sub"value="" type="checkbox" >SubScribe</label></span>
                                    <span><label for="App"><input class="check" id="App"value="" type="checkbox" >Apply Now</label></span>
                                    <span><label for="Buy"><input class="check" id="Buy"value="" type="checkbox" >Buy Now</label></span>
                                    <span><label for="Buy"><input class="check" id="Buy"value="" type="checkbox" >Buy Tickets</label></span>
                                    <span><label for="Get"><input class="check" id="Get"value="" type="checkbox" >Get Offer View</label></span>
                                    <span><label for="Sig"><input class="check" id="Sig"value="" type="checkbox" >Sign Up</label></span>
                          
                                     
                    

                                </div>

                                <div class="row1">
                                    <h3 class="text-dark">Message</h3>
                         
          							<span><label for="Get"><input class="check" id="Get"value="" type="checkbox" >Get Quote</label></span>
                                    
                                    <span><label for="Sen"><input class="check" id="Sen"value="" type="checkbox" >Send Message</label></span>
                                    <span><label for="Sen"><input class="check" id="Sen"value="" type="checkbox" >Send WhatsApp Me</label></span>
                                    <span><label for="Wha"><input class="check" id="Wha"value="" type="checkbox" >WhatsApp Message</label></span>
                                    <span><label for="Mes"><input class="check" id="Mes"value="" type="checkbox" >Message Page</label></span>
                          
	                           


                                </div>

                                <div class="row1">
                                    <h3 class="text-dark">Video Views</h3>
                                     <span><label for="Wat"><input class="check" id="Wat"value="" type="checkbox" >Watch Video</label></span>
                                    <span><label for="Wat"><input class="check" id="Wat"value="" type="checkbox" >Watch More</label></span>
                                    <span><label for="Lis"><input class="check" id="Lis"value="" type="checkbox" >Listen Music</label></span>
                                    <span><label for="Lis"><input class="check" id="Lis"value="" type="checkbox" >Listen Now</label></span>
                   

                                </div>

                                <div class="row1">
                                    <h3 class="text-dark">Engagement</h3>
                                      <span><label for="Like"><input class="check" id="Like" name="Lik Page" value="" type="checkbox" >Lik Page</label></span>
                                    <span><label for="Get"><input class="check" id="Get"value="" type="checkbox" >Get Quote</label></span>
                                    <span><label for="Cal"><input class="check" id="Cal"value="" type="checkbox" >Call Now</label></span>
                                    <span><label for="Cal"><input class="check" id="Cal"value="" type="checkbox" >Get Offer View</label></span>
                                    <span><label for="Mes"><input class="check" id="Mes"value="" type="checkbox" >Message Page</label></span>
                                    <span><label for="Vie"><input class="check" id="Vie"value="" type="checkbox" >View Instagram</label></span>

                                    


                                </div>

                                <div class="row1">
                                    <h3 class="text-dark">Other</h3>
           							<span><label for="Email_Now"><input class="check" id="Email_Now"value="" type="checkbox" >Email Now</label></span>
                                    <span><label for="Get_Tickets"><input class="check" id="Get_Tickets"value="" type="checkbox" >Ge _Tickets</label></span>
                                    <span><label for="Get_Directions"><input class="check" id="Get_Directions"value="" type="checkbox" >Get Directions</label></span>
                                    <span><label for="Open_Link"><input class="check" id="Open_Link"value="" type="checkbox" >Open Link</label></span>
                                    <span><label for="Save"><input class="check" id="Save"value="" type="checkbox" >Save</label></span>
                                    <span><label for="Search"><input class="check" id="Search"value="" type="checkbox" >Search</label></span>
                                    <span><label for="Try_It"><input class="check" id="Try_It"value="" type="checkbox" >Try It</label></span>
                                    <span><label for="Donate"><input class="check" id="Donate"value="" type="checkbox" >Donate</label></span>
                                    <span><label for="Go_live"><input class="check" id="Go_live"value="" type="checkbox" >Go live</label></span>
                                    <span><label for="Link_Card"><input class="check" id="Link_Card"value="" type="checkbox" >Link Card</label></span>
                                    <span><label for="Event_RSVP"><input class="check" id="Event_RSVP"value="" type="checkbox" >Event RSVP</label></span>
                                    <span><label for="View_Instagram"><input class="check" id="View_Instagram"value="" type="checkbox" >View Instagram</label></span>
                   



                                </div>



                                <div class="text-center border-top pt-2">
                                    <button class="btn btn-primary objctive">ok</button>
                                    <button class="btn btn-light cancel">cancel</button>
                                </div>
                            </div>



                        </div>

                        <div class="block-1">
                            <h3 class="title">Date:</h3>
                            <div class="i-box">
                            <i class="fad fa-clock fa-2x"></i>

                            <ul class="dates list-unstyled">
                                <li class="list-unstyled">
                                    <div class="btn-group" id="aBtnGroup" role="group" aria-label="Basic example">
                                        <button type="button" value="7" class="btn btn-default ">7 days</button>
                                        <button type="button" value="30" class="btn btn-default">30 days</button>
                                        <button type="button" value="90" class="btn btn-default">90 days</button>
                                        <button type="button" value="360" class="btn btn-default ">1 year</button>
                                        <button type="button" value="all" class="btn btn-default active">all</button>
                                    </div>
                                </li>
                                </div>
                                
                                <div class="i-box">
                                <i class="fad fa-calendar-week fa-2x"></i>
                               <li class="caleander" style="list-style: none !important;">
                                    <input type="text" class="form-control" name="daterange" value="{!! get_date() !!}" />

                                </li>
                                </div>
                                <!-- <li class="btn-curTime">
                                <button class="btn btn-light date">By Carted Time</button>
                            </li> -->
                            </ul>
                            <button type="button" class="btn btn-info clear  ">Rest</button>

                        </div>




                    </form>

                </div>

            </div>

            <div class="sort clearfix">


                <!-- <span class="" style="line-height: 58px;">Sort By:</span> -->
                <i class="fad fa-sort-amount-up fa-2x" style="margin-left: 26px;"></i>
                <select class="select" id="sort_by">
                    <option value="updated_at" data-display="Last Seen">Last Seen ↓</option>
                    <option value="post_create">Created Time ↓</option>
                    <option value="like">Like ↓</option>
                    <option value="comment">Comments ↓</option>
                    <option value="share">Share ↓</option>


                </select>
            </div>

        </div>
    </div>
    <div class="result">
        <div class="container">
            <div class="row tests boxList  " id="post-data">
                @include('data')


            </div>

        </div>
        @if(check_basic() == 1)

        <button style="display: none" class="btn btn-info loadMore" id="load_more_data"> Load More <i class="fas fa-spinner fa-spin"></i></button>
      @endif
        
        <div class="loader">
            <div class="loading">
            </div>
        </div>
        <div id="disblyarea" style="display: none">
            <div class="container">
                <p style="text-align: center;font-size: 30px">No results available.</p>
            </div>
        </div>
    </div>


















    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="img-contain"><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}"  alt=""></div>
                    {!! general('dec') !!}
                </div>
                <div class="col">
                    <h2>links</h2>
                    <div class="col">
                        <ul class="list-unstyled">
                            @foreach(App\Menu::where('show',1)->where('type','footer')->orderBy('created_at', 'acs')->get() as $footer)

                            <li> <a href="{{$footer->url}}"> {{$footer->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <h2>contact us</h2>
                    <p class="address"> {!! general('palestine') !!}</p>
                    <p class="phone">phone : <a href="tel:{!! general('phone') !!}">{!! general('phone') !!}</a></p>
                    <p class="email">email <a href="{!! general('email') !!}">{!! general('email') !!}</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="wrapper-cover">

        <div class="wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span>Loading...</span>
        </div>

    </div>


    <script type="text/javascript">
          function make(id) {

            $('#staticBackdrop').modal();
            $('.c-preloader').show();

            $.ajax({
                type: 'post',
                url: "{{ route('showpostModal') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },

                success: function(data) {
                    setTimeout(function() {
                        $('.c-preloader').hide();

                    }, 4000);

                    $('#addToCart-modal-body').html(data);


                }
            });

        }
    
     $(document).ready(function(){
    


        $('.clear').click(function() {
            $('.current').each(function() {
                let defVal = $(this).text();
                $('.current').text("Select ...");
                loadMoreData();
            })

        })
        // var page = 1;


        // $(window).scroll(function() {
        //     if($(window).scrollTop() + $(window).height()+0.5 >= $(document).height()) {


        //         @auth
        //     loadMoreData()

        //         @endauth
        //     }
        // });
        $("#load_more_data").click(function() {
            $('#load_more_data').hide();
             $(".loader").show();
            setTimeout(function() {
                $('#load_more_data').show();
                $('.loader').hide();
            }, 3000);
            // $(".loader").show(3000);

            loadMoreData();
        });
        
   
        var val3 = {};

        function getInput(min, max, src) {

            if (min !== "" || max !== "") {

                $('.Engagement .current').text(parseInt(min) + "~" + parseInt(max))
                val3.one = min
                val3.two = max
                val3.three = $(src).parent().attr('id');



            }
        }


        $('.OK').click(function() {
            getInput($('#like .min').val(), $('#like .max').val(), $('#like .max'))
            getInput($('#comment .min').val(), $('#comment .max').val(), $('#comment .max'))
            getInput($('#share .min').val(), $('#share .max').val(), $('#share .max'))

        })
        var val2 = {};

        function getTypeId(src1) {
            $(src1).click(function() {
                val2.one = $(this).parent().attr('id');
                val2.two = $(this).text()
            })
        }

        var val = {};

        function getdataIDPro(src1) {
            $(src1).click(function() {
                val.one = $(this).attr("id");

            })
        }
        $('.clear').click(function() {
            $('.current').each(function() {
                let defVal = $(this).text();
                $('.current').text("Select ...");
                location.reload();
            })

        })

        getdataIDPro('.langs span');
        getTypeId('.Engagements span');
        var offset = 2;
        var page = 2;

        function loadMoreData() {
            // let post_type = $('#post_type :selected').val();

            let lang = allvalLang;

            // let country = $('.country .current').text();
            let country = allval;
            // let obj = $('.objective .current').text();
            let obj = allvalObj;
            let enng = val2.one + " " + val2.two;
            let post_type = $('#post_type :selected').val();
            let sort_by = $('#sort_by :selected').val();
            var radioValue = $(".btn-default.active").val();
            var daterange = $("#daterange").val();
            let min_max = val3.three + " " + val3.one + "~" + val3.two;
            let category = $('#category :selected').val();
            let title = $('#search_input').val();
            let search_type = $('#ads_info').val();
            $.ajax({
                    url: '/new_likes?page=' + page + '&offset=' + offset,
                    type: "get",
                    data: {
                        'enng': enng,
                        'country': country,
                        'lang': lang,
                        "obj": obj,
                        'post_type': post_type,
                        "sort_by": sort_by,
                        'radioValue': radioValue,
                        'min_max': min_max,
                        'category': category,
                        "daterange": daterange,
                        'title':title,
                        'search_type':search_type,
                    },

                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {
                    if (data.count < 15 && data.count > 0) {   
                        $('#load_more_data').hide();
                    }else if( data.count == 0){

                        $('#disblyarea').css("display", "block");
                        $('#load_more_data').hide();

                    }else{
                        $('#load_more_data').show();
                        $('#disblyarea').css("display", "none");
                    }
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
                page++;

            offset++;
           

        }
   
  

        function likepost(id) {

alert(id);
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

        $(".search-btn").click(function() {
            get_posts();
        
        });






 
  
       

            $('.cancel ,.count,.language,.objctive').click(function(e) {
                e.preventDefault()
                $(this).parent().parent().toggleClass('toggle')
            })
            
            $(".textcut").mouseenter(function() {
                $(".long").show();
                $(".small").hide();
            });
            $(".textcut").mouseleave(function() {
                $(".long").hide();
                $(".small").show();
            });
            $('[data-toggle="tooltip"]').tooltip();
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            // post jquery
            
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

    function hoverVideo(e) { $('video', this).get(0).play(); }

    function hideVideo(e) { $('video', this).get(0).pause(); }







    $('select').niceSelect();


    function sh(src1, src2) {
        $(src1).click(function() {
            $(src2).toggleClass('toggle')
        })
    }


    sh('.country', '.countries');

    sh('.lang', '.langs');

    sh('.Engagement', '.Engagements');

    sh('.objective', '.objectives');

    $('.cancel').click(function() {
        $(this).parent().parent().toggleClass('toggle')
    })

    $('.content span').click(function() {
        $(this).parent().parent().toggleClass('toggle')
    })


    function addTarget(src, src2) {
        $(src2).click(function() {

            $(src).text($(this).text());

        })
    }

    addTarget('.country .current', '.countries .row1 span');

    addTarget('.lang .current', '.langs .row1 span');

    addTarget('.Engagement .current', '.Engagements .row1 span');

    addTarget('.objective .current', '.objectives .row1 span');


    var val3 = {};

    function getInput(min, max, src) {

        if (min !== "" || max !== "") {

            $('.Engagement .current').text(parseInt(min) + "~" + parseInt(max))
            val3.one = min
            val3.two = max
            val3.three = $(src).parent().attr('id');

            get_posts();


        }
    }


    $('.OK').click(function() {
        getInput($('#like .min').val(), $('#like .max').val(), $('#like .max'));
        getInput($('#comment .min').val(), $('#comment .max').val(), $('#comment .max'));
        getInput($('#share .min').val(), $('#share .max').val(), $('#share .max'));

    })
    $('.cancel').click(function(e) {
        e.preventDefault()
        $(this).parent().parent().toggleClass('toggle')
    })

    $('.OK').click(function(e) {
        e.preventDefault()

        $(this).parent().parent().toggleClass('toggle')


    })


   
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    

    $('.fa-heart').click(function() {
        $(this).toggleClass('far');
        $(this).toggleClass('fas');

    })
    $('#post_type').on('change', function() {
        // alert('ff');
        get_posts();

    });
    $('#category').on('change', function() {
        // alert('ff');
        get_posts();

    });


    $('#daterange').on('change', function() {
        // alert('ssq');
        get_posts();

    });
    $('#sort_by').on('change', function() {
        // alert('ssq');
        get_posts();

    });



    $('#aBtnGroup button').on('click', function() {
        // alert('qwww');
        var thisBtn = $(this);

        thisBtn.addClass('active').siblings().removeClass('active');
        var btnText = thisBtn.text();
        var btnValue = thisBtn.val();
        get_posts();

    });


    if ($('.post-body').hasClass('blur')) {

        $('.over-lay-img').css('display', 'block')

    } else {
        $('.over-lay-img').css('display', 'none')

    }

    var val = {};

    function getdataIDPro(src1) {
        $(src1).click(function() {
            val.one = $(this).attr("id");

        })
    }
     
         getdataIDPro('.countries span')

        var checkVals={};
         var allval=[];
     


        
     

//         $('.countries  span').click(function() {

//             $(this).find('input')
//             console.log('yeaaa')
//        });

     function Tag(){
       $('.countries  span .check').each(function() {

        $(this).click(function() {

            let value = $(this).text();
            
        });

    });
     
     getdataIDPro('.countries span')
 $('.countries  span label').change(function(){
          
 
     
        	if(this.checked) {
            
        		console.log($(this).parent().text())
        		$( ".back .sort" ).prepend( `<p class="mb-0 text-primary border border-primary p-1 m-1 rounded closee " id="${$(this).parent().text()}" style="font-size:12px">${$(this).parent().parent().parent().parent().find('h3').text()} : ${$(this).parent().text()} <i class="fal fa-times ml-1 mr-1 "></i> </p>` ).find('p').addClass('cols');
        		checkVals.fval=$(this).parent().text();
        		checkVals.Secval=$(this).parent().parent().parent().find('h3').text();
        
        	
        	    allval.push(checkVals.fval);    

        
        	$('.cols').on( 'click', function(){
        		
        		$('span #'+$(this).attr('id')).prop("checked", false)
                    console.log('#'+$(this).attr('id'))

        		$(this).fadeOut(500);
            	
   			$('.country .current').text('country')
                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allval);
            allval=result
            console.log(result);
                    
			get_posts();
                
        		
        	})
        	}
        	
        	if(!this.checked) {
        		console.log($('.cols #'+$(this).attr('id')+''));
                		$('.sort  #'+$(this).attr('id')).fadeOut(500);
            
            
            

                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allval);
            allval=result
            console.log(result);
            
            $('.country .current').text('country')
            
        	}
    
        })
 
     
     
     }

    Tag()
    
       $('.count').on('click',function(){
 		get_posts();

        console.log('is goood')
        })
    
 
        
        
     // function remve
        
      
       
        var checkValsOgj={};
         var allvalObj=[];

     function TagObj(){
     
     
         
  $('.objectives  span .check').each(function() {

        $(this).click(function() {

            let value = $(this).text();
            
        });

    });
    getdataIDPro('.objectives span')


 $('.objectives  span .check').change(function(){
          
        	if(this.checked) {
        		console.log($(this).parent().text())
        		$( ".back .sort" ).prepend( `<p class="mb-0 text-primary border border-primary p-1 m-1 rounded closee " id="${$(this).parent().text().substring(0,3)}" style="font-size:12px">${$(this).parent().parent().parent().parent().find('.obj').text()} : ${$(this).parent().text()} <i class="fal fa-times ml-1 mr-1 "></i> </p>` ).find('p').addClass('cols');
        		checkValsOgj.fval=$(this).parent().text();
        		checkValsOgj.Secval=$(this).parent().parent().parent().find('h3').text();
        
        	
        	    
        			allvalObj.push(checkValsOgj.fval);
        			
        			 // get_posts();
        
        	$('.cols').on( 'click', function(){
        		
        		$('span #'+$(this).attr('id')).prop("checked", false)
                    console.log('#'+$(this).attr('id'))

        		$(this).fadeOut(500);
           		
   				 $('.objective .current').text('objective')

                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allvalObj);
            allvalObj=result
            console.log(result);
            $('.objective .current').text('objective')
            get_posts();        

                
        		
        	})
        	}
        	
        	if(!this.checked) {
        
                		$('.sort #'+$(this).attr('id')).fadeOut(500);

                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allvalObj);
            allvalObj=result
            console.log(result);
            // get_posts();
        	}
        })
 
     
     
     }


    

     
     TagObj();
     
     
           $('.objctive').on('click',function(){
 		    get_posts();

        console.log('is goood')
        })
    
        
      
             var checkValsLang={};
         var allvalLang=[];

     function TagLang(){
     
     
         
  $('.langs  span .check').each(function() {

        $(this).click(function() {

            let value = $(this).text();
            
        });

    });
    getdataIDPro('.langs span')


 $('.langs  span .check').change(function(){
          
        	if(this.checked) {
        		console.log($(this).parent().text())
        		$( ".back .sort" ).prepend( `<p class="mb-0 text-primary border border-primary p-1 m-1 rounded closee " id="${$(this).parent().text()}" style="font-size:12px">${$(this).parent().parent().parent().parent().find('h3').text()} : ${$(this).parent().text()} <i class="fal fa-times ml-1 mr-1 "></i> </p>` ).find('p').addClass('cols');
        		checkValsLang.fval=$(this).parent().text();
        		checkValsLang.Secval=$(this).parent().parent().parent().find('h3').text();
        
        	
        	    
        			allvalLang.push(checkValsLang.fval);
        			
        			 // get_posts();
        
        	$('.cols').on( 'click', function(){
        		
        		$('span #'+$(this).attr('id')).prop("checked", false)
                    console.log('#'+$(this).attr('id'))
        		$(this).fadeOut(500);
            	
   				$('.lang .current').text('language')
                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allvalLang);
            allvalLang=result
            console.log(result);
            $('.lang .current').text('language')
            get_posts();        

                
        		
        	})
        	}
        	
        	if(!this.checked) {
        
                		$('.sort #'+$(this).attr('id')).fadeOut(500);

                    var newArr= [];
            function removefromArr (str, strArray) {
                   newArr = [];
                strArray.map(item => {
                    !str.includes(item) ? newArr.push(item) : '';
                });
              return newArr;
            }
            
            var result = removefromArr($(this).attr('id'), allvalLang);
            allvalLang=result
            console.log(result);
            // get_posts();
        	}
        })
 
     
     
     }

     
     TagLang();
     
     
          
        $('.language').on('click',function(){
 		         			get_posts();

        console.log('is goood')
        })
//         var country2; 
     
//         console.log( allval.forEach(item =>{country2+=item} )
//)
$('#search_input').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		get_posts();
	}
});
        
    function get_posts() {
        offset = 0;
        page = 1;
        // let lang = val.one;
        let lang = allvalLang;

        // let country = $('.country .current').text();
        // var c
        // let country = allval.forEach(item =>c+=item[i] )
        // console.log(country)
        
        
        let country=allval

        // let obj = $('.objective .current').text();
        let obj = allvalObj;
        let enng = val2.one + " " + val2.two;
        let post_type = $('#post_type :selected').val();
        let sort_by = $('#sort_by :selected').val();
        var radioValue = $(".btn-default.active").val()
        var daterange = $("#daterange").val();
        let category = $('#category :selected').val();
        let min_max = val3.three + " " + val3.one + "~" + val3.two;
        let title = $('#search_input').val();
        let search_type = $('#ads_info').val();
        $('html, body').animate({
            scrollTop: $("#post-data").offset().top
        }, 1500);
        $.ajax({
            url: '/new_likes?page=' + page + '&offset=' + offset,
            type: 'get',
            data: {
                'enng': enng,
                'country': country,
                'lang': lang,
                "obj": obj,
                'post_type': post_type,
                "sort_by": sort_by,
                'radioValue': radioValue,
                'category': category,
                'min_max': min_max,
                "daterange": daterange,
                'title':title,
                'search_type':search_type,
            },
            success: function(data) {
                $("#post-data").empty();
                if (data.count < 15 && data.count > 0) {   
                        $('#load_more_data').hide();
                    }else if( data.count == 0){

                        $('#disblyarea').css("display", "block");
                        $('#load_more_data').hide();

                    }else{

                        $('#load_more_data').show();
                        $('#disblyarea').css("display", "none");
                    }
                    
                    $("#post-data").html(data.html);



            }
        });
        offset++;
        page++;
        }
        







    var val2 = {};


    function getTypeId(src1) {
        $(src1).click(function() {
            val2.one = $(this).parent().attr('id');
            val2.two = $(this).text()
        })
    }

    getTypeId('.Engagements span')




  
    
    



            
            
            
       
        $(window).on("load", function() {
            $('.wrapper-cover').fadeOut("slow"); 
            get_posts();

        });
        
     });
    </script>


    <script src="{{ asset('new_style/js/main.js') }}"></script>


</body>


</html>