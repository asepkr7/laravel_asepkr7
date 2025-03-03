@extends('tamplate.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Pengguna</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Form Tambah Pengguna
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('rumah-sakit.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md 6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" id="name" name="name" placeholder="Enter name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" placeholder="Masukkan Username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control select2bs4 @error('role') is-invalid @enderror"
                                        name="role" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option value="">Pilih Role</option>
                                        <option {{ old('role') == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                        <option {{ old('role') == 'user' ? 'selected' : '' }} value="user">User</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Enter password" required
                                        oninput="toggleShowPasswordButton('password', 'showPassword')">
                                    <button type="button" id="showPassword"
                                        class="btn badge badge-light toggle-password mt-2" style="display: none;"
                                        onclick="togglePasswordVisibility('password', 'showPasswordIcon')">
                                        <i id="showPasswordIcon" class="fas fa-eye"></i>Show Password
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" placeholder="Enter password"
                                        required
                                        oninput="toggleShowPasswordButton('password_confirmation', 'showPasswordConfirmation')">
                                    <button type="button" id="showPasswordConfirmation"
                                        class="btn badge badge-light toggle-password mt-2" style="display: none;"
                                        onclick="togglePasswordVisibility('password_confirmation', 'showPasswordConfirmationIcon')">
                                        <i id="showPasswordConfirmationIcon" class="fas fa-eye"></i> Show Password
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-save"></i> Save
                    </button>
                    <button type="button" onclick="window.history.back()" class="btn  btn-outline-secondary">
                        <i class="fas fa-save"></i> Cancel
                    </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
