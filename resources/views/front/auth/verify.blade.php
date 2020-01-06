@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>

<main class="container main2">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bgcolor">
      <li class="breadcrumb-item"><a href="#">خانه</a></li>
      <li class="breadcrumb-item active" aria-current="page">فعالسازی حساب کاربری</li>
    </ol>
  </nav>




  @include('front.messages')

  <div class="d-flex justify-content-center">


    <div class="card">
      برای فعالسازی حساب کاربری خود روی دکمه زیر کلیک نمایید تا ایمیل فعالسازی برای شما ارسال شود
      <hr>
      @if (session('resent'))

      <div class="alert alert-success">یک ایمیل برای فعالسازی حساب کاربری شما ارسال شد.ایمیل خود را بررسی و روی لینک
        فعالسازی حساب کاربری کلیک نمایید</div>

      @endif
      <form action="{{route('verification.resend')}}" method="POST">
        @csrf
        <button>ارسال ایمیل فعالسازی</button>
      </form>

    </div>


  </div>
</main>
@endsection