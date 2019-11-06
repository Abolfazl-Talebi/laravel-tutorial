@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>

<main class="container main2">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bgcolor">
      <li class="breadcrumb-item"><a href="#">خانه</a></li>
      <li class="breadcrumb-item active" aria-current="page">ثبت نام</li>
    </ol>
  </nav>




  @include('front.messages')

  <div class="d-flex justify-content-center">
    <form action="{{route('login')}}" method="POST">
      @csrf


      <div class="form-group">
        <label for="title">ایمیل</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
          value="{{old('email')}}">
        @error('email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="title">رمز ورود</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="title">مرا بخاطر بسپار</label>
        <input type="checkbox" class="form-check-input" name="remember">

      </div>

      <div class="form-group">
        <label for="title"></label>
        <button type="submit" class="btn btn-success">ورود</button>
      </div>

    </form>


  </div>
</main>
@endsection