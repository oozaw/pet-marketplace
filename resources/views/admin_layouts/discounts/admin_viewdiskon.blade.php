@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Detail Produk -->
        <h1 class="h2 mb-2 text-gray-800 text-center">Detail Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Data -->
                    <div class="form-group">
                        <table class="table table-striped table-bordered " align="center">
                            <tbody>
                                <tr>
                                    <th>Nama Produk</th>
                                    <td>{{ $data_diskon->percentage }}</td>
                                </tr>
                                <tr>
                                    <th>Rating Produk</th>
                                    <td>{{ $data_diskon->start }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $data_diskon->end }}</td>
                                </tr>
                                <tr>
                                    <th>Daftar Barang</th>
                                    <td>
                                        {{ $data_diskon->produk->product_name ?? 'Tidak Ada Barang' }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>Harga</th>
                                    <td>Rp{{ $data_diskon->price }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $data_produk->description }}</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th>Kategori</th>
                                    <td>
                                        @foreach ($daftarkategori as $kategori)
                                        <li>
                                            {{ $kategori}}
                                        </li>    
                                        @endforeach
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Circle Buttons (Default) -->
                    <a href="/admin/diskon/{{ $data_diskon->id }}/editdiskon" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit Diskon</span>
                    </a>
                    {{-- <a href="/admin/produk/{{ $data_produk->id }}/buatfoto" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Foto Produk</span>
                    </a> --}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->



@endsection