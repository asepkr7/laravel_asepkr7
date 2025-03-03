@extends('tamplate.main')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Rumah Sakit</h1>
    <div class="section-header mb-3">
        <a href="{{ route('rumah-sakit.create') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('delete') }}
            </div>
        </div>
    @endif
    @if (session()->has('edit'))
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('edit') }}
            </div>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rumah Sakit</h6>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($rumahSakits->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @else
                                @foreach ($rumahSakits as $index => $rs)
                                    <tr id="row-{{ $rs->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $rs->nama }}</td>
                                        <td>{{ $rs->alamat }}</td>
                                        <td>{{ $rs->email }}</td>
                                        <td>{{ $rs->telepon }}</td>
                                        <td>
                                            <a href="{{ route('rumah-sakit.edit', $rs->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deleteData({{ $rs->id }})">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/rumah-sakit/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire('Terhapus!', response.success, 'success');
                            $('#row-' + id).fadeOut(300, function() {
                                $(this).remove();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Gagal menghapus data.', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
