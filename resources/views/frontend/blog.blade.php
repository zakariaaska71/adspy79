@extends('layouts.front')
@section('title')
<title>{{ $blog->title  }}</title>
@endsection
@section('content')

<div class="contentPage">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top: 10px;">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item" ><a href="{{ route('blogs.front') }}">Blogs</a></li>
              <li class="breadcrumb-item " active aria-current="page">{{ $blog->title }}</li>
            </ol>
          </nav>
          <div class="row">
              <div class="col-8">
        <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$blog->image) }}" class="img-main">
    </div>  
        <div class="col-1"></div>
        <div class="col-3 ">
            @foreach ($relateds as $item)
                
       
        <aside>
            <h3>{{ $item->title }}</h3>
            <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.$item->image) }}" style="width: 100%;
            height: 130px;">
            <p>{!! $item->short_dec !!}</p>
            <a href="{{ route('blog.single',$item->slug) }}">read more</a>

        </aside>
        @endforeach
       
    </div>
    </div>

        <p class="card-text"><small class="text-muted">{{ $blog->updated_at->diffForHumans() }}</small></p>
        <p class="text">
        {!!  $blog->long_dec !!}
        </p>


       

    </div>


   
</div>


    
@endsection