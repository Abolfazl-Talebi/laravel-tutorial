@extends('back.index')

@section('title')
پنل مدیریت - مدیریت نظرات
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت نظرات</h4>

                </div>

            </div>

        </div>
        <!-- Page Title Header Ends-->


        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        @include('back.messages')

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>خلاصه نظر</th>
                                    <th>نویسنده</th>
                                    <th>برای مطلب</th>
                                    <th>تاریخ ثبت</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $comment)

                                @switch($comment->status)
                                @case(1)
                                @php
                                $url = route('admin.comments.status',$comment->id);
                                $status = '<a href="'.$url.'" class="badge badge-success">فعال</a>' @endphp
                                @break
                                @case(0)
                                @php
                                $url = route('admin.comments.status',$comment->id);
                                $status = '<a href="'.$url.'" class="badge badge-warning">غیر فعال</a>' @endphp
                                @break
                                @default
                                @endswitch




                                <tr>
                                    <td>{!! mb_substr($comment->body,0,50) !!}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->article->name}}</td>
                                    <td>{!! jdate($comment->created_at)->format('%Y-%m-%d') !!}</td>
                                    <td>{!!$status!!}</td>
                                    <td>
                                        <a href="{{route('admin.comments.edit',$comment->id)}}"
                                            class="badge badge-success">ویرایش</a>
                                        <a href="{{route('admin.comments.destroy',$comment->id)}}"
                                            onclick="return confirm('آیا آیتم مورد نظر حذف شود');"
                                            class="badge badge-warning"> حذف </a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    {{$comments->links()}}
                </div>
            </div>


        </div>




    </div>
    <!-- content-wrapper ends -->
    @include('back.footer')
</div>
@endsection