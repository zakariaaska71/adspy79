<div class="contactUs" id="contactUs">
    <div class="container">
        <h2>{{ @$contact->title }}</h2>
        <div class="left float-left wow animate__bounceInLeft" data-wow-offset="500">
            <p style="visibility: hidden;"> We are happy when you contact We are happy when you contact </p>
            {!! @$contact->dec !!}
            <form method="">
                <input class="form-control mb-3" type="text" placeholder="Name">
                <input class="form-control mb-3" type="email" placeholder="Gmail">
                <textarea class="form-control mb-3" rows="4" placeholder="Message"></textarea>
                <button class="btn btn-primary">send</button>
            </form>
        </div>

        <div class="right float-right wow animate__bounceInRight" data-wow-offset="500" data-wow-delay=".6s">
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'. @$contact->image) }}" alt="" >
        </div>
    </div>
</div>