@extends('back.index')

@section('title')
ویرایش نظر
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">ویرایش نظر</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->


        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('back.messages')
                        <form action="{{route('admin.comments.update',$comment->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">نام</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{$comment->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">ایمیل</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{$comment->email}}">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">محتوای نظر</label>
                                <textarea type="text" class="form-control @error('body') is-invalid @enderror"
                                    name="body">{{$comment->body}}</textarea>
                                @error('body')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">وضعیت</label>
                                <select class="form-control" name="status">
                                    <option value="0">منتشر نشده</option>
                                    <option value="1" <?php if($comment->status==1) echo 'selected';?>>منتشر شده
                                    </option>
                                </select>
                            </div>




                            <div class="form-group">
                                <label for="title"></label>
                                <button type="submit" class="btn btn-success">ذخیره</button>
                                <a href="{{route('admin.comments')}}" class="btn btn-warning"> انصراف </a>
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