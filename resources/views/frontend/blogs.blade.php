@extends('layouts.front')
@section('title')
<title>Blogs</title>
@endsection
@section('content')

<div class="hesderBolg">
    <div class="coverBlog">
    </div>
    <h2>blog</h2>

</div>



<div class="content">
  
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item" active="" aria-current="page">Blogs</li>
            </ol>
          </nav>
        <div class="card-deck row row-cols-1 row-cols-md-3 ">
            @foreach ($blogs as $item)
                
            
            <div class="card-blog col-sm-12 col-md-6 col-lg-4 mb-4">
                <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$item->image) }}" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('blog.single',$item->slug) }}">{{ $item->title }}</a></h5>
                    <p class="card-text"><small class="text-muted">{{ $item->updated_at->diffForHumans() }}</small></p>

                    <p class="card-text">{!! $item->short_dec !!}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pangate">
            {{$blogs->links()}}
        </div>
        

    </div>
</div>
@endsection