@extends('template.master')

@section('title_web')
    Detail Data Blog
@endsection

@section('title_content')
    Blog
@endsection

@section('breadcrumbs')
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Data Blog</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Detail Data Blog</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-10 col-10">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="font-weight-bold">DETAIL DATA BLOG</h1>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered text-dark shadow-sm">
                    <tr>
                        <th>NO ID CONTENT</th>
                        <td>{{ $details->id }}</td>
                    </tr>
                    <tr>
                        <th>TITLE CONTENT</th>
                        <td>{{ $details->title }}</td>
                    </tr>
                    <tr>
                        <th>CONTENT BLOG</th>
                        <td>{!! $details->content !!}</td>
                    </tr>
                    <tr>
                        <th>CREATED AT</th>
                        <td>{{ $details->created_at }}</td>
                    </tr>
                    <tr>
                        <th>IMAGE CONTENT</th>
                        <td><img src="{{ Storage::url('public/blogs/').$details->image }}" alt="Image Blog" width="200px"
                            class="shadow-sm rounded m-2" loading="lazy"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><a href="/blog" class="btn btn-primary m-3"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    fill="currentColor" class="bi bi-arrow-left-circle-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                </svg>&nbsp;&nbsp;KEMBALI</a>
                            </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection