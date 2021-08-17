@extends('template.master')

@section('title_web')
Update Profile
@endsection

@section('title_content')
All Users
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
        <a href="#">Data Users</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Update Your Profile</a>
    </li>
</ul>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                <div class="card-body mt-3">

                    <form action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="username" class="form-label h6 font-weight-bold">Edit Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user ml-1"></i>
                                    </div>
                                </div>
                                <input type="text" id="username" class="form-control input-custom" name="username"
                                    value="{{ $user->username }}" />
                            </div>
                            @error('username')
                                <div class="alert alert-danger font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label h6 font-weight-bold">Edit Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-card m-1"></i>
                                    </div>
                                </div>
                                <input type="text" id="name" class="form-control input-custom" name="name"
                                    value="{{ $user->name }}" />
                            </div>
                            @error('name')
                                <div class="alert alert-danger font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label h6 font-weight-bold">Edit Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope ml-1"></i>
                                    </div>
                                </div>
                                <input type="email" id="email" class="form-control input-custom" name="email"
                                    value="{{ $user->email }}" />
                            </div>
                            @error('email')
                                <div class="alert alert-danger font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto_user" class="form-label h6 font-weight-bold">Edit Foto User</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-image ml-1"></i>
                                    </div>
                                </div>
                                <input type="file" name="photo" class="form-control input-custom" id="foto_user"
                                    onchange="previewFile(this)">
                            </div>
                            @error('photo')
                                <div class="alert alert-danger font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <img id="previewImg" style="max-width: 180px; margin-top: 20px;">
                        </div>

                        <center>
                            <input type="reset"
                                class="btn btn-sm btn-reset text-white btn-block font-weight-bold mb-3 mt-4"
                                style="font-size: 18px" value="Batalkan">

                            <input type="submit"
                                class="btn btn-sm btn-save text-white btn-block font-weight-bold mb-3 mt-4"
                                style="font-size: 18px" value="Simpan Perubahan">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection