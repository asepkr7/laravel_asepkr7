@extends('tamplate.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Edit Data Pasien</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Pasien</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-edit"></i>
                        Form Edit Data Pasien
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $pasien->nama) }}" id="nama" name="nama"
                                        placeholder="Masukkan Nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" placeholder="Masukkan Alamat"
                                        value="{{ old('alamat', $pasien->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rumah_sakit_id">Rumah Sakit</label>
                                    <select name="rumah_sakit_id" id="rumah_sakit_id"
                                        class="form-control select2 @error('rumah_sakit_id') is-invalid @enderror">
                                        <option value="">-Pilih Rumah Sakit-</option>
                                        @foreach ($rumahSakits as $rumahSakit)
                                            <option value="{{ $rumahSakit->id }}"
                                                {{ old('rumah_sakit_id', $pasien->rumah_sakit_id) == $rumahSakit->id ? 'selected' : '' }}>
                                                {{ $rumahSakit->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('rumah_sakit_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                        name="telepon" placeholder="Masukkan Nomor Telepon"
                                        value="{{ old('telepon', $pasien->telepon) }}">
                                    @error('telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <button type="button" onclick="window.history.back()" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
