<div class="aboutUs" id="about">
    <h2 class="text-center">{{ $about->title_section }}</h2>
    <div class="container">
        <div class="right float-right wow animate__bounceInRight" data-wow-offset="300">
            <h3>{{ $about->title }}</h3>
            {!! $about->dec !!}
        </div>
        <div class="left float-left wow animate__bounceInLeft" data-wow-offset="300" data-wow-delay=".6s">
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$about->image ) }}" alt="{{ $about->title_section }}">
        </div>
    </div>
</div>