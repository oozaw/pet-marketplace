@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Tambah Produk -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <form form action="/admin/kategori/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kategori</label>
                        <input type="text" class="form-control" name="category_name" id="exampleFormControlInput1" placeholder="Nama Kategori">
                        @error('category_name')
                        <span class="text-danger mt-2">
                            Kategori barang harus diisi dan lebih dari 5 karakter
                        </span> 
                        @enderror
                    </div>
                    <!-- Tombol Tambah -->
                    <button type="submit" class="btn btn-primary">Add Categories</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->

@endsection