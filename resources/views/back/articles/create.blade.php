@extends('back.index')

@section('title')
مطلب جدید
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مطلب جدید</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->


        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('back.messages')
                        <form action="{{route('admin.articles.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">نام مطلب</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">نام مستعار - slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                                    value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">محتوای مطلب</label>
                                <textarea id="editor" type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">وضعیت</label>
                                <select class="form-control" name="status">
                                    <option value="0">منتشر نشده</option>
                                    <option value="1">منتشر شده</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">انتخاب دسته بندی</label>
                                <div id="output"></div>
                                <select class="chosen-select" name="categories[]" multiple style="width:400px">
                                    @foreach ($categories as $cat_id => $cat_name)
                                    <option value="{{$cat_id}}">{{$cat_name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">نویسنده : {{Auth::user()->name}}</label>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
                                <a href="{{route('admin.articles')}}" class="btn btn-warning"> انصراف </a>
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