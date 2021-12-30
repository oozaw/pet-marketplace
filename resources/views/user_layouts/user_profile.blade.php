@extends('user_layouts.user_master')
@section('content')
<div class="container">
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
                                Profil
                                <span>
                                    Biodata
                                </span>
                            </h1>
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="profile-main text-center">
                                    
                                    @if (Auth::user()->profile_image != null)
                                    <div class="image">
                                        <img src="{{ Auth::user()->image }}" class="img-circle main" width="170px" height="170px" alt="Avatar">
                                    </div>
                                        
                                    @endif

                                    <ul class="steps row">
                                        <h2 class="text-uppercase text-blue" style="font-weight: bolder">
                                            {{ Auth::user()->name }}
                                        </h2>
                                        {{-- <li class="active text-center">
                                            <span>
                                                Available 
                                            </span>
                                            <span>
                                                <i class="icofont icofont-check text-green"></i>
                                            </span>
                                        </li> --}}
                                    </ul>

                                    <!-- Data -->
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered " align="center">
                                            <tbody>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td class="text-uppercase">{{ Auth::user()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ Auth::user()->email }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th style="padding-top:20px;">Status</th>
                                                    <td>
                                                        <img style="width:40px; height:40px;margin-bottom:3px;margin-left:-12px;" src="https://cdn.clipart.email/0638765a3f2a64a229becd27379510f8_facebook-verified-logo-logodix_1024-1024.png" alt="">Verified
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                          </table>
                                    </div>
                                    <!-- / Tombol Edit Foto -->
                                    @if (Auth::user()->profile_image == null)
                                    <div class="form-group">

                                        
                                        <td class="text-center">
                                            <!-- info btn -->
                                            <a href="/edit_profile/{{Auth::user()->id}}" class=" btn btn-yellow btn-sm">
                                                <i class="">Edit Foto Profile</i>
                                            </a>
                                            {{-- <button type="button" class="btn  btn-primary">
                                                <i class="icofont icofont-stylish-right"></i>
                                            </button> --}}
                                        </td>

                                        {{-- <form action="/edit_profile/{{Auth::user()->id}}"> --}}
                                            
                                            {{-- <a href="/edit_profile/{{ Auth::user()->id }}">
                                                <button type="button" class="sdw-hover btn btn-material btn-yellow btn-lg ripple-cont">
                                                    <a href="edit_profile" style="color: black;">Edit Foto Profile</a>
                                                </button>
                                            </a> --}}
                                        
                                        {{-- </form> --}}
                                    </div>
                                        
                                    @endif
                                    <!-- /END: Tombol Edit Foto -->
                                </div>

                                <!-- Shopping Cart table -->
                                <div style="color:#333333;" class="table-responsive col-md-12 col-lg-12 ">
                                    <h1 align="center" class=" block none-padding-top" style="margin-top: 90px">Daftar Transaksi Produk</h1>
                    
                                    <table class="table product-table">
                                        <!-- Table head -->
                                        <thead>
                            
                                            <tr>
                                                <th class="font-weight-bold">
                                                <strong>Status</strong>
                                                </th>
                                
                                                <th class="font-weight-bold text-center">
                                                <strong>Shipping cost</strong>
                                                </th>

                                                <th class="font-weight-bold text-center" >
                                                    <strong style="margin-right: -40px">Product</strong>
                                                </th>
                                
                                                <th class="font-weight-bold text-center">
                                                <strong>Total Product Price</strong>
                                                </th>
                                    
                                                <th class="font-weight-bold text-center">
                                                <strong>Detail</strong>
                                                </th> 
                                
                                            </tr>
                            
                                        </thead>
                                        <!-- Table head -->
                            
                                        <!-- Table body -->
                                        <tbody>
                            
                                            <!-- First row -->
                                            @foreach ($data_transaksi as $transaksi)

                                            <tr>
                                                {{-- @php
                                                    $image = $cart->produk->getfirstimage();
                                                @endphp
                                                <th scope="row">
                                                    <img style="height:50px;" src="{{ $image->image }}" alt="" class="img-fluid z-depth-0">
                                                </th> --}}
                                                
                                
                                                <td>
                                                    <h5 class="mt-3">
                                                        @if ($transaksi->status=='success')
                                                        <strong class=" text-uppercase text-green">{{ $transaksi->status }}</strong>
                                                        @endif
                                                        @if ($transaksi->status=='expired')
                                                        <strong class=" text-uppercase text-red">{{ $transaksi->status }}</strong>
                                                        @endif
                                                        @if ($transaksi->status=='canceled')
                                                        <strong class=" text-uppercase text-grey-darkness">{{ $transaksi->status }}</strong>
                                                        @endif
                                                        @if ($transaksi->status=='delivered')
                                                        <strong class=" text-uppercase text-blue">{{ $transaksi->status }}</strong>
                                                        @endif
                                                        @if ($transaksi->status=='verified')
                                                        <strong class=" text-uppercase text-green">{{ $transaksi->status }}</strong>
                                                        @endif
                                                        @if ($transaksi->status=='unverified')
                                                        <strong class=" text-uppercase text-yellow">{{ $transaksi->status }}</strong>
                                                        @endif
                                                    </h5>
                                                </td>

                                                <td>
                                                    <h5 class="mt-3 text-center">
                                                        <strong class=" text-uppercase">{{ number_format($transaksi->shipping_cost) }}</strong>
                                                    </h5>
                                                </td>
                                                
                                                <td>
                                                    <h5 class="mt-3">
                                                        <strong class=" text-uppercase text-center">
                                                            @foreach ($transaksi->produk as $transaksi_produk)
                                                            <ol>
                                                                <a href="/produk/{{ $transaksi_produk->id }}/tampil">
                                                                    {{ $transaksi_produk->product_name}}
                                                                </a>
                                                            </ol>    
                                                            @endforeach
                                                        </strong>
                                                    </h5>
                                                </td>
                                                
                                                <td>
                                                    <h5 class="mt-3 text-center">
                                                        <strong class=" text-uppercase "> {{ number_format($transaksi->sub_total) }}</strong>
                                                    </h5>
                                                </td>

                                                <td class="text-center">
                                                    <!-- info btn -->
                                                    <a href="/produk/upload-pembayaran/{{ $transaksi->id}}" class=" btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <button type="button" class="btn  btn-primary">
                                                        <i class="icofont icofont-stylish-right"></i>
                                                    </button> --}}
                                                </td>
                                                

                                                {{-- @forelse ($cart->produk->diskon as $diskonbarang)

                                                @php
                                                $nilaidiskon = ($diskonbarang->percentage / 100)* $cart->produk->price
                                                @endphp

                                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                    <td>Rp
                                                        <span class="float-lef grey-text price0">
                                                            {{ number_format(($cart->produk->price-$nilaidiskon)*$cart->qty) }}
                                                        </span>
                                                        <input type="hidden" name="discount[]" value="{{ $diskonbarang->percentage }}">
                                                        <input type="hidden" name="selling_price[]" value="{{ ($cart->produk->price-$nilaidiskon)*$cart->qty ?? '0' }}">
                                                    </td>
                                                    
                                                @else
                                                    <td>Rp
                                                        <span class="float-lef grey-text price0">
                                                            {{ number_format(($cart->produk->price)*$cart->qty) }}
                                                        </span>
                                                        <input type="hidden" name="discount[]" value="0">
                                                        <input type="hidden" name="selling_price[]" value="{{ ($cart->produk->price)*$cart->qty ?? '0' }}">
                                                    </td>
                                                @endif


                                                @empty
                                                <td>Rp
                                                    <span class="float-lef grey-text price0">
                                                        {{ number_format(($cart->produk->price)*$cart->qty) }}
                                                    </span>
                                                    <input type="hidden" name="discount[]" value="0">
                                                    <input type="hidden" name="selling_price[]" value="{{ ($cart->produk->price)*$cart->qty ?? '0' }}">
                                                </td>

                                                @endforelse

                                                <td class="text-center text-md-left">
                                                    <p class="text-danger" style="display:none" id="notif0"></p>
                                                    <span class="qty0">{{ number_format($cart->qty) }}</span>
                                                </td>     --}}
                                            </tr>

                                            @endforeach
                                        </tbody>
                                        <!-- Table body -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT -->
</div>

@endsection