@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">List Kategori</h6>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <!-- Tombol Tambah -->
                    <a href="/admin/kategori/buat" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Kategori</span>
                    </a>
                    <!-- Tombol Delete -->
                    {{-- <a href="#" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                    </a> --}}
                </div>
                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kategori</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kategori as $no => $kategori)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $kategori->category_name }}</td>
                                <td class="text-center">
                                    <a href="/admin/kategori/{{ $kategori->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a>
                                        <form action="/admin/kategori/{{ $kategori->id }}/delete" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Yakin mau dihapus?') ">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> 
                                    </a>
                                    {{-- <a href="/admin/kategori/{{ $kategori->id }}/hapus" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->

@endsection