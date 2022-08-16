<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <span><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" width="100" height="50" alt=""></span>
                {!! general('dec') !!}
            </div>
            <div class="col">
                <h2>links</h2>
                <div class="col">
                    <ul class="list-unstyled">
                 @foreach($footers_menus as $footer)
    
               <li > <a href="{{route('page.page',$footer->slug)}}"> {{$footer->title}}</a></li>
                 @endforeach
                    </ul>
                </div>
            </div>

            <div class="col">
                <h2>contact us</h2>
                <p class="address"> {!! general('palestine') !!}</p>
                <p class="phone">phone :  <a href="tel:{!! general('phone') !!}">{!! general('phone') !!}</a></p>
                <p class="email">email <a href = "{!! general('email') !!}">{!! general('email') !!}</a></p>
            </div>

        </div>
    </div>
</div>
