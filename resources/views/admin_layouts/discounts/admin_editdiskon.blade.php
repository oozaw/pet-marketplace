@extends('admin_layouts.admin_master')
@section('admin_content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Edit Diskon</h6>
            </div>
            <div class="card-body">
                <form action="/admin/diskon/{{ $data_diskon->id }}/updatediskon" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precentage</label>
                        <input type="text" class="form-control" name="percentage" id="exampleFormControlInput1" placeholder="Banyak Presentase" value="{{ $data_diskon->percentage }}">
                        @error('percentage')
                        <span class="text-danger mt-2">
                            Presentase diskon harus diisi dan unik
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Start Discount</label>
                        <input type="date" class="form-control" name="start" id="exampleFormControlInput1" value="{{ $data_diskon->start }}">
                        @error('start')
                        <span class="text-danger mt-2">
                            Tanggal mulai diskon harus diisi dan unik
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">End Discount</label>
                        <input type="date" class="form-control" name="end" id="exampleFormControlInput1" value="{{ $data_diskon->end }}">
                        @error('end')
                        <span class="text-danger mt-2">
                            Tanggal selesai diskon harus diisi dan unik
                        </span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Daftar Barang</label>
                        <select class="form-control" name="id_product" id="id_product">
                            @if (is_null($data_diskon->produk))
                                <option selected disabled>--Pilih--</option>
                            @else
                                <option selected disabled value="{{ $data_diskon->produk->id }}">{{ $data_diskon->produk->product_name }}</option>
                            @endif

                            
                            @foreach ($data_produk as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                    
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Anda yakin ingin mengedit data ini?')">Edit Discount</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->

@endsection