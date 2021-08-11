@extends('template.master')

@section('title_web')
Tambah Data Blog
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
        <a href="#">Tambah Data Blog</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">TAMBAH BLOG BARU
                    <a href="/blog" class="btn btn-primary float-right text-white mr-3"><i class="fas fa-hand-point-left mr-2"></i> KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        
                    @csrf

                    <div class="form-group">
                        <label for="image" class="font-weight-bold">MASUKKAN GAMBAR BLOG</label>
                        <input type="file" id="image" class="form-control input-custom @error('image') is-invalid @enderror" name="image" onchange="previewFile(this)">
                        <!-- ERROR MESSAGE IMAGE -->
                        @error('image')
                        <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <img id="previewImg" style="max-width: 180px; margin-top: 20px;">
                    </div>

                    <div class="form-group">
                        <label for="title" class="font-weight-bold">MASUKKAN JUDUL BLOG</label>
                        <input type="text" id="title" class="form-control input-custom @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        <!-- ERROR MESSAGE TITLE -->
                        @error('title')
                        <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="content" class="font-weight-bold">MASUKKAN KONTEN BLOG</label>
                        <textarea id="content" class="form-control @error('konten') is-invalid @enderror" name="konten" rows="5" placeholder="Masukkan Konten Blog">{{ old('konten') }}</textarea>
                        <!-- ERROR MESSAGE CONTENT -->
                        @error('konten')
                        <div class="alert alert-danger font-weight-bold alert-dismissible fade show mt-2" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    </div>

                    <center>
                        <button type="reset" class="btn btn-danger font-weight-bold m-1"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                            <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
                            <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
                          </svg>&nbsp;&nbsp;RESET</button>
                    <button type="submit" name="simpan_data"
                        class="btn btn-primary font-weight-bold m-1"><svg
                            xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                            fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z" />
                        </svg>&nbsp;&nbsp;SIMPAN BLOG</button>
            </center>

                </form> 
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        CKEDITOR.replace( 'konten' );
    </script>
@endpush
@endsection