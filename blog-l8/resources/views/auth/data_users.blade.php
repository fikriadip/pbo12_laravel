@extends('template.master')

@section('title_web')
Data Users
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
        <a href="#">Table Users</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DATATABLE USERS
                    <button type="button" data-toggle="modal" data-target="#ModalUsers"
                        class="btn btn-primary float-right text-white"><i class="fas fa-user-plus mr-2"></i> TAMBAH
                        USERS</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableUsers" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($users as $usr)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $usr->username }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->role }}</td>
                                    <td align="center"><img
                                        src="{{ asset('images/users/'.$usr->photo) }}"
                                            alt="Image Users" width="140px" class="shadow-sm rounded m-2"
                                            loading="lazy"></td>
                                    <td>{{ $usr->created_at }}</td>
                                    <td align="center">
                                        <a class="btn btn-danger btn-sm m-1 text-white delete-user"
                                            data-id="{{ $usr->id }}" style="font-size: 16px"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="ModalUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">TAMBAH USER BARU</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                    id="data-users">
                    @csrf
                    <div class="form-group">
                        <label for="username">Masukkan Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                        @error('username')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Masukkan Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Masukkan Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Masukkan Role</label>
                        <select class="custom-select form-control" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="admin">ADMIN</option>
                            <option value="creator">CREATOR</option>
                        </select>
                        @error('role')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass">Masukkan Password</label>
                        <input type="password" class="form-control" id="pass" name="password">
                        @error('password')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass-confirm">Masukkan Konfirmasi Password</label>
                        <input type="password" class="form-control" id="pass-confirm" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="foto">Masukkan Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="photo" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                        </div>
                        @error('photo')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        <img id="previewImg" src="" alt="" style="max-width: 180px; margin-top: 20px;">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btn_close"><svg
                                xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z">
                                </path>
                            </svg>&nbsp;&nbsp;BATALKAN</button>
                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                height="22" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z" />
                            </svg>&nbsp;&nbsp;SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableUsers').DataTable();
        });

        $(document).on("click", "#btn_close", function () {
            $("#data-users").trigger("reset");
        });

        $('.delete-user').click(function () {
            var userid = $(this).attr('data-id');
            swal({
                    title: "Yakin Ingin Menghapus?",
                    text: "Anda Akan Menghapus Data User Dengan ID : " + userid + "",
                    icon: "warning",
                    buttons: ["BATAL", "OK"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/hapus/" + userid + ""
                        swal("Data User Berhasil Dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi Dihapus!");
                    }
                });
        });
    </script>
@endpush
@endsection