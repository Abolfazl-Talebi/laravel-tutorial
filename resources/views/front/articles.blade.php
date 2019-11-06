@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>

<main class="container main2">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bgcolor">
      <li class="breadcrumb-item"><a href="#">خانه</a></li>
      <li class="breadcrumb-item active" aria-current="page">مطالب</li>
    </ol>
  </nav>






  <div class="d-flex justify-content-center">

    <div class="row">

      @foreach ($articles as $article)
      <div class="col-sm-3">
        <img src="<?php echo '/photos/1/thumbs/'.basename($article->image)?>" alt="">
        <h3><a href="{{route('article',$article->slug)}}">{{$article->name}}</a></h3>
        <div>
          <ul>
            <li>نویسنده:{{$article->user->name}}</li>
            <li>تاریخ: {!! jdate($article->created_at)->format('%d-%m-%Y') !!}</li>
            <li>بازدید: {{$article->hit}}</li>
          </ul>

        </div>
        <p><?php echo mb_substr(strip_tags($article->description),0,200,'UTF8').'. . .' ; ?></p>
      </div>
      @endforeach




    </div>



  </div>
  {{$articles->links()}}
</main>
@endsection