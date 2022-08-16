<div class="pricingTable" id="pricing">
    <h2>pricing table</h2>
    <div class="container">
        <div class="row">
            @foreach ($prices as $item)
                
       
            <div class="price-card col-sm-12 col-md-6 col-lg-3 text-center wow animate__flipInY" data-wow-offset="400">
                <h3>{{ $item->name }}</h3>
                <p><sup>$</sup>{{ $item->price }}<span>per month</span></p>
                {!! $item->dec !!}
                <button class="btn btn-primary">get started</button>
            </div>
            @endforeach
          
        </div>
    </div>
</div>