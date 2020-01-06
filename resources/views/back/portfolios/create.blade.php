@extends('back.index')

@section('title')
نمونه کار جدید
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">نمونه کار جدید</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->


        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('back.messages')
                        <form action="{{route('admin.portfolios.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">نام آیتم</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">لینک</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link"
                                    value="{{old('link')}}">
                                @error('link')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">تگ</label>
                                <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag"
                                    value="{{old('tag')}}">
                                @error('tag')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">توضیحات</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a href="#" id="lfm" data-input="image" data-preview="holder"
                                        class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> انتخاب
                                    </a>
                                </span>
                                <input id="image" class="form-control" type="text" name="image">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                            <hr>


                            <div class="form-group">
                                <label for="title"></label>
                                <button type="submit" class="btn btn-success">ذخیره</button>
                                <a href="{{route('admin.portfolios')}}" class="btn btn-warning"> انصراف </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('back.footer')
</div>
@endsection