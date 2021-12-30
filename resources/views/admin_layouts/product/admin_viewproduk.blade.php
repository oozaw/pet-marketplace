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
                                    <td>{{ $data_produk->product_name }}</td>
                                </tr>
                                <tr>
                                    <th>Rating Produk</th>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $data_produk->stock }}</td>
                                </tr>
                                <tr>
                                    <th>Berat</th>
                                    <td>{{ $data_produk->weight }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp.{{number_format($data_produk->price) }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td style="max-width: 350px">{{ $data_produk->description }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>
                                        @foreach ($daftarkategori as $kategori)
                                        <li>
                                            {{ $kategori}}
                                        </li>    
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>
                                        @foreach ($daftardiskon as $diskon)
                                        <li>
                                            {{$diskon->percentage}}%
                                        </li>    
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Circle Buttons (Default) -->
                    <a href="/admin/produk/{{ $data_produk->id }}/edit" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit Produk</span>
                    </a>
                    <a href="/admin/produk/{{ $data_produk->id }}/buatfoto" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Foto Produk</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Foto Produk -->
        <h1 class="h2 mb-2 text-gray-800 text-center">Foto Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <!-- Image & Caption -->
                <div class="body">

                    <!-- Set up your HTML -->
                    {{-- <div class="owl-carousel">
                        <div> Your Content </div>
                        <div> Your Content </div>
                        <div> Your Content </div>
                        <div> Your Content </div>
                        <div> Your Content </div>
                        <div> Your Content </div>
                        <div> Your Content </div>
                    </div> --}}

                    <div class="table">
                        <div class="row text-center owl-carousel">
                            @foreach ($data_produk->productimage as $image)
                                <div class="thumbnail">
                                    <img class="img-fluid-left img-thumbnail" src="{{ $image->image }}" alt="light" style="height:200px;">
                                    <form action="/admin/produk/{{$image->id}}/deletegambar" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin mengedit data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <img src="{{ asset('pengguna/html/images/shop/img-02.jpg') }}" class="img-thumbnail" alt="..."> --}}

                    {{-- <!-- Header -->
                    <div class="comp-header st-4 text-uppercase">

                        Jacket
                        <span>
                            fake Brand
                        </span>

                        <!-- Rate -->
                        <div class="rate">

                            <ul class="stars">
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li>
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li>
                                    <i class="icofont icofont-star"></i>
                                </li>
                            </ul>

                            <div class="rate-info">
                                124 members rate it
                            </div>
                        </div>

                        <!-- Badge -->
                        <!--span class="sale-badge item-badge text-uppercase bg-green">
                            New
                        </span-->
                    </div>

                    <!-- Image -->
                    <div class="image">
                        <img class="main" src="{{ asset('pengguna/html/images/shop/img-02.jpg') }}" alt="">
                    </div>

                    <!-- Caption -->
                    <div class="caption">
                        <!-- Rate -->
                        <div class="rate">

                            <ul class="stars">
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li class="active">
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li>
                                    <i class="icofont icofont-star"></i>
                                </li>
                                <li>
                                    <i class="icofont icofont-star"></i>
                                </li>
                            </ul>

                            <div class="rate-info">
                                124 members
                                <span>like it</span>
                            </div>
                        </div>

                        <!-- Timer -->
                        <div class="timer-body">
                            <span class="sale text-red">Sale</span>
                            <span class="tdtimer-d"></span>d 
                            <span class="tdtimer-h"></span>h 
                            <span class="tdtimer-m"></span>m 
                            <span class="tdtimer-s"></span>s 
                        </div>

                        <!-- Features list -->
                        <ul class="features">
                            <li>
                                <i class="icofont icofont-shield"></i>
                                <span>24 days. Money Back Guarantee</span>
                            </li>
                            <li>
                                <i class="icofont icofont-ship"></i>
                                <span>Free shipping</span>
                            </li>
                            <li>
                                <i class="icofont icofont-hand"></i>
                                <span>Free help and setup</span>
                            </li>
                        </ul>

                        <!-- Text -->
                        <p class="text">
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                        </p>
                    </div> --}}

                </div>

                {{-- <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Diskon</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Sapu lidi</td>
                                <td>Peralatan rumah, bersih-bersih</td>
                                <td class="text-center">
                                    <a href="diskon_produk" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-percent"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="view_produk" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="edit_produk" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}

            </div>
        </div>

        <!-- Review Produk -->
        <h1 class="h2 mb-2 text-gray-800 text-center">Review Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Review</th>
                                <th class="text-center">Respone</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Budhi</td>
                                <td>1</td>
                                <td>kere</td>
                                <td>oke gan</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                </td>
                            </tr>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset disabled>
                        <div class="form-group">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->name }}">
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Respon</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Respon">
                    </div>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary mr-2 float-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection