<div class="aboutUs" id="about">
    <h2 class="text-center">{{ $section3->title_section }}</h2>
    <div class="container">
        <div class="right float-left wow animate__bounceInLeft" data-wow-offset="300">
            <h3>{{ $section3->title }}</h3>
            {!! $section3->dec !!}
        </div>
        <div class="left float-right wow  animate__bounceInRight" data-wow-offset="300" data-wow-delay=".6s">
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$section3->image ) }}" alt="{{ $section3->title_section }}">
        </div>
    </div>
</div>