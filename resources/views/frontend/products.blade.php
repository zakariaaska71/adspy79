<div class="products" id="products">
    <div class="container">
        <h2 class="text-center">our products</h2>
        <div class="row">
            @foreach ($products as $item)
                
           
            <div class="product col-sm-12 col-md-6 col-lg-4 text-center wow animate__bounceInUp" data-wow-offset="350">
                <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$item->image) }}" alt="{{ $item->title }}">
                <h3>{{ $item->title }}</h3>
                <p>{!! $item->dec !!}</p>

            </div>
            @endforeach
        

            
        </div>
    </div>
</div>