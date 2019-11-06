@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>

<main class="container main2">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bgcolor">
      <li class="breadcrumb-item"><a href="#">خانه</a></li>
      <li class="breadcrumb-item" aria-current="page">مطالب</li>
      <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>
    </ol>
  </nav>






  <div class="d-flex justify-content-center">

    <div class="container">

      <div>
        <h1>{{$article->name}}</h1>
      </div>
      <div>

        <ul>
          <li>نویسنده:{{$article->user->name}}</li>
          <li>تاریخ: {!! jdate($article->created_at)->format('%d-%m-%Y') !!}</li>
          <li>بازدید: {{$article->hit}}</li>
        </ul>
      </div>
      <p>
        {!! $article->description !!}
      </p>

    </div>



  </div>

  <div>
    @include('front.messages')
    <hr>
    <form action="{{route('comment.store',$article->slug)}}" class="form-group" method="POST">
      @csrf
      <div class="form-row">

        @auth
        <div class="form-group col-md-6">
          <label for="name">نام:</label>
          <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="name">ایمیل:</label>
          <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}" readonly>
        </div>
      </div>
      @else
      <div class="form-group col-md-6">
        <label for="name">نام:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="form-group col-md-6">
        <label for="name">ایمیل:</label>
        <input class="form-control" type="text" name="email">
      </div>
  </div>
  @endauth



  <div class="form-group">
    <label for="body">متن نظر شما</label>
    <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="recaprcha">تصویر امنیتی</label>
    {!! htmlFormSnippet() !!}

  </div>




  <button class="btn btn-primary" type="submit">ارسال نظر</button>

  </form>
  </div>

  <div>
    @foreach ($comments as $comment)
    <div>
      <ul>
        <li>نویسنده: {{$comment->name}}</li>
        <li>ایمیل: {{$comment->email}}</li>

      </ul>
      <div>
        متن نظر{{$comment->body}}
      </div>
    </div>
    <hr>
    @endforeach
  </div>
</main>
@endsection