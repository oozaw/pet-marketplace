@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Tambah Produk -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Kurir</h6>
            </div>
            <div class="card-body">
                <form action="/admin/kurir/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kurir</label>
                        <input type="text" class="form-control" name="courier" id="exampleFormControlInput1" placeholder="Nama Kurir">
                        @error('courier')
                        <span class="text-danger mt-2">
                            Nama kurir harus diisi dan unik
                        </span> 
                        @enderror
                    </div>
                    <!-- Tombol Tambah -->
                    <button type="submit" class="btn btn-primary">Add Courier</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->

@endsection