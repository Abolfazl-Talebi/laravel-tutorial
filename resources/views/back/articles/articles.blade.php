@extends('back.index')

@section('title')
پنل مدیریت - مدیریت مطالب
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت مطالب</h4>

                </div>
                <div class=" float-right">
                    <a href="{{route('admin.articles.create')}}" class="btn btn-success btn-fw  ">مطلب جدید</a>
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
                                    <th>نام</th>
                                    <th>نا مستعار - Slug</th>
                                    <th>نویسنده</th>
                                    <th>دسته بندی</th>
                                    <th>بازدید</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($articles as $article)

                                @switch($article->status)
                                @case(1)
                                @php
                                $url = route('admin.articles.status',$article->id);
                                $status = '<a href="'.$url.'" class="badge badge-success">فعال</a>' @endphp
                                @break
                                @case(0)
                                @php
                                $url = route('admin.articles.status',$article->id);
                                $status = '<a href="'.$url.'" class="badge badge-warning">غیر فعال</a>' @endphp
                                @break
                                @default
                                @endswitch




                                <tr>
                                    <td>{{$article->name}}</td>
                                    <td>{{$article->slug}}</td>
                                    <td>{{$article->user->name}}</td>
                                    <td>
                                        @foreach ($article->categories()->pluck('name') as $category)
                                        <span class="badge badge-warning">{{$category}}</span>
                                        @endforeach



                                    </td>
                                    <td>{{$article->hit}}</td>
                                    <td>{!!$status!!}</td>
                                    <td>
                                        <a href="{{route('admin.articles.edit',$article->id)}}"
                                            class="badge badge-success">ویرایش</a>
                                        <a href="{{route('admin.articles.destroy',$article->id)}}"
                                            onclick="return confirm('آیا آیتم مورد نظر حذف شود');"
                                            class="badge badge-warning"> حذف </a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    {{$articles->links()}}
                </div>
            </div>


        </div>




    </div>
    <!-- content-wrapper ends -->
    @include('back.footer')
</div>
@endsection