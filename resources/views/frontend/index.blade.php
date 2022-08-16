@extends('layouts.front')
@section('title')
<title>{{ general('title')  }}</title>
@endsection
@section('content')


      
@include('frontend.header')

</div>


<div class="content" data-spy="scroll" data-target="#navbar" data-offset="400">




@include('frontend.video')


@include('frontend.about')


@include('frontend.about2')

@include('frontend.about3')


@include('frontend.price')



@include('frontend.contactus')




@include('frontend.footer')

    
@endsection