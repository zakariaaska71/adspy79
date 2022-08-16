<div class="cover" id="home">

<div class="container">
    <div class="header">
        <div class="textContent animate__bounceIn">
            <h2 class="">{{ $firstsection->title }}</span></h2>
            <p> {!! $firstsection->dec !!} </p>
            @if($firstsection->text_button != null)
            <a class="btn btn-primary" href="{{ $firstsection->button }}">{{ $firstsection->text_button }}</a>

            @endif
        </div>

        <div class="imgContent animate__bounceIn">
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'. $firstsection->image) }}" alt="{{ $firstsection->title }}">
        </div>
    </div>
    </div>