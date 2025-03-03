@extends('tamplate.main')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Pasien</h1>
    <div class="section-header mb-3">
        <a href="{{ route('pasien.create') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="mb-3">
        <label for="filterRumahSakit">Filter Rumah Sakit:</label>
        <select id="filterRumahSakit" class="form-control">
            <option value="">Semua</option>
            @foreach ($rumahSakits as $rs)
                <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
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
                                <th>Telepon</th>
                                <th>Rumah Sakit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pasienTableBody">
                            @if ($pasiens->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @else
                                @foreach ($pasiens as $index => $pasien)
                                    <tr id="row-{{ $pasien->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->telepon }}</td>
                                        <td>{{ $pasien->rumahSakit->nama }}</td>
                                        <td>
                                            <a href="{{ route('pasien.edit', $pasien->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deleteData({{ $pasien->id }})">Hapus</button>
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        document.getElementById('filterRumahSakit').addEventListener('change', function() {
            let rumahSakitId = this.value;
            fetch(`/pasien/filter/${rumahSakitId}`)
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById('pasienTableBody');
                    tableBody.innerHTML = '';
                    if (data.length === 0) {
                        tableBody.innerHTML =
                            '<tr><td colspan="6" class="text-center">Tidak ada data pasien</td></tr>';
                    } else {
                        data.forEach((pasien, index) => {
                            tableBody.innerHTML += `
                                <tr id="row-${pasien.id}">
                                    <td>${index + 1}</td>
                                    <td>${pasien.nama}</td>
                                    <td>${pasien.alamat}</td>
                                    <td>${pasien.telepon}</td>
                                    <td>${pasien.rumah_sakit.nama}</td>
                                    <td>
                                        <a href="/pasien/${pasien.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteData(${pasien.id})">Hapus</button>
                                    </td>
                                </tr>`;
                        });
                    }
                });
        });

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
                        url: '/pasien/' + id,
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
