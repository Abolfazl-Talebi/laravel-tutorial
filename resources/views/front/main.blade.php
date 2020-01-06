@extends('front.index')
@section('content')

@include('front.intro')

<main id="main">
    @include('front.messages')
    <!--==========================
        About Us Section
      ============================-->
    @include('front.about')


    @include('front.services')
    @include('front.whyus')
    @include('front.calltoaction')
    @include('front.features')
    @include('front.portfolio')
    @include('front.testimonials')
    @include('front.team')
    @include('front.clients')
    @include('front.pricing')
    @include('front.faq')








</main>

@endsection