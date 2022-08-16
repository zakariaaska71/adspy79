<div class="aboutUs" id="about">
    <h2 class="text-center">{{ $section2->title_section }}</h2>
    <div class="container">
           <div class="left float-right wow animate__bounceInRight" data-wow-offset="300" data-wow-delay=".6s">
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$section2->image ) }}" alt="{{ $section2->title_section }}">
        </div>
        <div class="right float-left wow animate__bounceInLeft" data-wow-offset="300">
            <h3>{{ $section2->title }}</h3>
            {!! $section2->dec !!}
        </div>
     
    </div>
</div>