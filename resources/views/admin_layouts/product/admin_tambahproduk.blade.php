@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Produk</h6>
            </div>
            <div class="card-body">
                <form form action="/admin/produk/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" id="exampleFormControlInput1" placeholder="Nama Produk">
                        @error('product_name')
                        <span class="text-danger mt-2">
                            Nama produk harus diisi dan unik
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Harga Satuan</label>
                        <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Harga Satuan">
                        @error('price')
                        <span class="text-danger mt-2">
                            Harga produk harus diisi
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stock</label>
                        <input type="number" class="form-control" name="stock" id="exampleFormControlInput1" placeholder="Stock">
                        @error('stock')
                        <span class="text-danger mt-2">
                            Banyak stock produk harus diisi
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Berat Produk</label>
                        <input type="number" class="form-control" name="weight" id="exampleFormControlInput1" placeholder="Berat Produk">
                        @error('weight')
                        <span class="text-danger mt-2">
                            Berat produk harus diisi
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control select2" name="pilih_kategori[]" id="pilih_kategori" multiple>
                            @foreach ($data_kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('description')
                        <span class="text-danger mt-2">
                            Deskripsi produk harus diisi
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Pilih Foto (jpg/.jpeg/.png)</label>
                        <input type="file" class="form-control-file" name="pilih_foto[]" multiple id="exampleFormControlFile1">
                    </div>
                    <!-- Tombol Add Product -->
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>

</div>
    <!-- /.container-fluid -->
<!-- /.container-fluid -->

@endsection