 @extends('tamplate.main')
 @section('content')
     <h1 class="h3 mb-2 text-gray-800">Data Rumah Sakit</h1>
     <div class="section-header mb-3">
         <a href="{{ route('pasien.create') }}" class="btn btn-outline-secondary btn-sm">
             <i class="fas fa-plus"></i> Tambah
         </a>
     </div>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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

         <div class="card-body">
             <div class="col-12">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>Nama</th>
                                 <th>Alamat</th>
                                 <th>Email</th>
                                 <th>Telepon</th>
                                 <th>Rumah Sakit</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>

                         <tbody>
                             @if ($rumahSakits->isEmpty())
                                 <tr>
                                     <td colspan="5" class="text-center">Data Kosong</td>
                                 </tr>
                             @else
                                 @foreach ($rumahSakits as $rs)
                                     <tr>
                                         <td>{{ $rs->nama }}</td>
                                         <td>{{ $rs->alamat }}</td>
                                         <td>{{ $rs->email }}</td>
                                         <td>{{ $rs->telepon }}</td>
                                         <td>
                                             <button class="btn btn-warning btn-sm">Edit</button>
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
     @endsection
