@extends('user_layouts.user_master')
@section('content')
    
<div class="container">
    <!-- 
    STEPS
    =============================================== -->
    <div class="row block none-padding-top">
        <div class="col-xs-12">
            
            <ul class="steps row">
                <li class="hidden-xs col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="icon number bg-blue">
                        1
                    </div>
                    <span>
                        Confirm 
                    </span>
                    Shopping cart
                    
                    <span class="dir-icon hidden-xs">
                        <i class="icofont icofont-stylish-right"></i>
                    </span>
                </li>

                <li class="hidden-xs col-sm-4 col-md-4 col-lg-3">
                    <div class="icon number bg-blue">
                        2
                    </div>
                    <span>
                        Checkout
                    </span>
                    your address

                    <span class="dir-icon">
                        <i class="icofont icofont-stylish-right"></i>
                    </span>
                </li>

                <li class="active col-sm-4 col-md-4 col-lg-3">
                    <div class="icon number bg-blue">
                        3
                    </div>
                    <span>
                        Confirmation
                    </span>
                    proof of payment
                    
                    <span class="dir-icon hidden-sm hidden-md">
                        <i class="icofont icofont-stylish-right text-yellow"></i>
                    </span>
                </li>

                <li class="hidden-xs col-lg-3 hidden-sm hidden-md">
                    <div class="icon number bg-grey">
                        4
                    </div>
                    <span>
                        Confirm
                    </span>
                    your order
                </li>
            </ul>
        </div>
    </div>
    <!-- END: STEPS -->

    <!-- 
    CONTENT
    =============================================== -->
    <div class="row block none-padding-top">
        <div class="col-xs-12 col-md-12 col-lg-12 get-height">
            <div class="sdw-block">
                <div class="wrap bg-white">
                    
                    <!-- Authirize form -->
                    <div class="row auth-form">
                        
                        <!-- Header & nav -->
                        <div class="col-md-12">
                            
                            <!-- Header -->
                            <h1 class="header text-uppercase">
                                Upload Bukti Pembayaran 
                                <span>
                                    Foto/Screenshot bukti transfer
                                </span>
                            </h1>
                            <div class="list-body">   
                                <div class="profile-main text-center">
                                    @if ($data_transaksi->status == 'canceled' || $data_transaksi->status == 'expired' || $data_transaksi->status == 'verified' || $data_transaksi->status == 'delivered'  || $data_transaksi->status == 'success' )
                                        @if ($data_transaksi->status == 'verified' || $data_transaksi->status == 'delivered'  || $data_transaksi->status == 'success' )
                                        <h1 class="text-uppercase text-blue" style="font-weight: bolder; padding-bottom: 70px; font-size: 100px">
                                            Pembayaran Berhasil
                                        </h1>

                                        @else
                                        <h1 class="text-uppercase text-blue" style="font-weight: bolder; padding-bottom: 70px; font-size: 100px">
                                            Pembayaran gagal
                                        </h1>
                                        @endif
                                    @else
                                        <h1 class="text-uppercase text-blue" style="font-weight: bolder; padding-bottom: 70px; font-size: 100px">
                                            {{ $deadline }}
                                        </h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @if ($data_transaksi->status == 'canceled' || $data_transaksi->status == 'expired' || $data_transaksi->status == 'verified' || $data_transaksi->status == 'delivered'  || $data_transaksi->status == 'success' )
                            @if ($data_transaksi->status == 'verified' || $data_transaksi->status == 'delivered' || $data_transaksi->status == 'success' )
                            <span class="btn-panel col-md-4" >
                                <form action="/kategori">
                                    <button type="submit" class="sdw-wrap btn-primary">
                                        <a  class="sdw-hover btn btn btn-material btn-view" style="color: white"><i class="icon icofont icofont-check-circled"></i><span class="body" >Kembali ke halaman utama</span></a>
    
                                    </button> 
                                </form>
                            </span>
                            <span class="btn-panel col-md-4" >
                                <div class="form-group">
                                    <button type="submit" class="sdw-wrap btn-success">
                                        <a  href="/produk/sukses-bayar/{{ $data_transaksi->id }}" class="sdw-hover btn btn btn-material btn-success" style="color: white"><i class="icon icofont icofont-vehicle-delivery-van"></i><span class="body" >Tracking Barang</span></a>
    
                                    </button> 
                                </div>
                            </span>

                            @else
                            <span class="btn-panel col-md-4" >
                                <form action="/kategori">
                                    <button type="submit" class="sdw-wrap btn-primary">
                                        <a  class="sdw-hover btn btn btn-material btn-view" style="color: white"><i class="icon icofont icofont-check-circled"></i><span class="body" >Kembali ke halaman utama</span></a>
    
                                    </button> 
                                </form>
                            </span>
                            @endif
                        {{-- <tr></tr> --}}
                        {{-- verified --}}
                        {{-- <span class="btn-panel col-md-2" >
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-7">
                                    <a href="#" class="sdw-hover btn btn-material btn-yellow ripple-cont">Tracking Barang</a>
                                </div>
                            </div>
                        </span> --}}
                        {{-- <span class="btn-panel col-md-2">
                            <form action="/produk/sukses-bayar/{{ $data_transaksi->id }}">
                                <span class="sdw-wrap btn-success" >
                                    <a  class="sdw-hover btn btn btn-material btn-success" style="color: white"><i class="icon icofont icofont-vehicle-delivery-van"></i><span class="body" >Tracking Barang</span></a>
                                </span> 
                            </form>
                        </span> --}}
                            
                        @else

                        <form action="/produk/uploadpembayaran/{{$data_transaksi->id}}" method="POST"  enctype="multipart/form-data">
                            <div class="">
                                <div class="form-group ">
                                    <input type="file" class="form-control" placeholder="Enter your promocode" name="foto_pembayaran[]" required>
                                </div>
                            </div>
                            <span class="btn-panel col-md-2">
                                    @csrf
                                    <button type="submit" class="sdw-wrap btn-primary" >
                                        <a  class="sdw-hover btn btn btn-material btn-primary">
                                            {{-- <i class="icon icofont icofont-check-circled"></i> --}}
                                            <span class="body" >Submit</span></a>

                                    </button> 
                            </span>
                        </form>

                        <span class="btn-panel text-left">
                            <form action="/produk/cancel/{{$data_transaksi->id}}" method="POST">
                                @csrf
                                <button class="sdw-wrap btn-danger" >
                                    <a  class="sdw-hover btn btn btn-material btn-danger">
                                        {{-- <i class="icon icofont icofont-close-circled"></i> --}}
                                        <span class="body">canceled</span></a>

                                </button> 
                            </form>
                        </span>
                            
                        @endif

                        {{-- <div class="col-md-6">
                            <a href="cardpage_4" class="btn btn-primary btn-material"> 
                                <span class="body">Submit</span>
                                <i class="icon icofont icofont-check-circled"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="cardpage_4" class="btn btn-primary btn-material"> 
                                <span class="body">Canceled</span>
                                <i class="icon icofont icofont-check-circled"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT -->

</div>

@endsection