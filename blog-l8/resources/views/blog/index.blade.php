@extends('template.master')

@section('title_web')
Data Blog
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
        <a href="#">DataTable Blog</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DATATABLE BLOG
                    <a href="/blog/create" class="btn btn-primary float-right text-white mr-3"><i class="fas fa-plus mr-2"></i> TAMBAH BLOG BARU</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableBlog" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($blogs as $data)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td align="center"><img src="{{ Storage::url('public/blogs/').$data->image }}" alt="Image Blog" width="140px"
                                        class="shadow-sm rounded m-2" loading="lazy"></td>
                                    <td>{{ $data->title }}</td>
                                    <td>{!! $data->content !!}</td>
                                    <td align="center">
                                        <form action="blog/{{$data->id}}" method="POST" style="text-align: center">
                                            <a href="{{ route('blog.show', $data->id)}}" class="btn btn-info btn-sm m-1" style="font-size: 16px"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('blog.edit', $data->id)}}" class="btn btn-primary btn-sm m-1" style="font-size: 16px"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm m-1" style="font-size: 16px"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger font-weight-bold">
                                    Data Blog Masih Kosong!
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $blogs->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#tableBlog').DataTable();
        });
    </script>
@endpush
@endsection