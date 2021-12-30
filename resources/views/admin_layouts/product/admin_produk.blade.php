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
                <h6 class="m-0 font-weight-bold text-primary text-center">List Produk</h6>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <!-- Tombol Tambah -->
                    <a href="/admin/produk/buat" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
                    </a>
                </div>
                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stock</th>
                                {{-- <th class="text-center">Diskon</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_produk as $no => $produk)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $produk->product_name }}</td>
                                <td style="max-width: 290px">{{ Str::limit($produk->description),35,$end="..." }}</td>
                                <td>Rp.{{ number_format($produk->price) }}</td>
                                <td>{{ $produk->stock }}</td>
                                {{-- <td class="text-center">
                                    <a href="/admin/produk/{{ $produk->id }}/discount" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-percent"></i>
                                    </a>
                                </td> --}}
                                <td class="text-center">
                                    <a href="/admin/produk/{{ $produk->id }}/view" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/admin/produk/{{ $produk->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a>
                                        <form action="/admin/produk/{{ $produk->id }}/delete" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Yakin mau dihapus?') ">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> 
                                    </a>
                                    {{-- <a href="/admin/produk/{{ $produk->id }}/hapus" class="btn btn-danger btn-circle btn-sm " onclick="return confirm('Anda yakin ingin menghapus data ini?')">
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

    <!-- Modal -->
    {{-- <div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="close b-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form form action="/admin/produk/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Produk</label>
                            <input type="text" class="form-control" name="product_name" id="exampleFormControlInput1" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Satuan</label>
                            <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Harga Satuan">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stock</label>
                            <input type="number" class="form-control" name="stock" id="exampleFormControlInput1" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Berat Produk</label>
                            <input type="number" class="form-control" name="weight" id="exampleFormControlInput1" placeholder="Berat Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="" selected disabled>Kategori</option>
                                <option>Peralatan Dapur</option>
                                <option>peralatan Kamar Mandi</option>
                                <option>Peralatan Kebun</option>
                                <option>Peralatan Tukang</option>
                                <option>Electronik Dapur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Pilih Foto</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <!-- Tombol Add Product -->
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


@endsection