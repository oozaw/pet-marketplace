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

                <li class="active col-sm-4 col-md-4 col-lg-3">
                    <div class="icon number bg-blue">
                        2
                    </div>
                    <span>
                        Checkout
                    </span>
                    your address

                    <span class="dir-icon">
                        <i class="icofont icofont-stylish-right text-yellow"></i>
                    </span>
                </li>

                <li class="hidden-xs col-sm-4 col-md-4 col-lg-3">
                    <div class="icon number bg-grey">
                        3
                    </div>
                    <span>
                        Select
                    </span>
                    payment method
                    
                    <span class="dir-icon hidden-sm hidden-md">
                        <i class="icofont icofont-stylish-right"></i>
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
        
        <div class="col-xs-12 col-md-8 col-lg-9 get-height">
            <div class="sdw-block">
                <div class="wrap bg-white">
                    
                    <!-- Authirize form -->
                    <div class="row auth-form">
                        
                        <!-- Header & nav -->
                        <div class="col-md-12">
                            
                            <!-- Header -->
                            <h1 class="header text-uppercase">
                                Billing Address 
                                <span>
                                    Enter your address info
                                </span>
                            </h1>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                
                                <div class="panel-group" id="accordion">

                                    <div class="panel panel-default">
                                        <div id="collapseTwo" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                {{-- <div class="col-md-9 col-md-offset-1">
                                                    <form>
                                                        <!-- Name -->
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail2">Name</label>
                                                            <input type="text" class="form-control checkout_input" id="exampleInputEmail1" placeholder="Nama">
                                                        </div>
                                                        <!-- Email -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Email</label>
                                                            <input type="email" class="form-control checkout_input" id="exampleInputPassword2" placeholder="Email">
                                                        </div>
                                                        <!-- Phone no -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Phone no</label>
                                                            <input type="tel" class="form-control checkout_input" id="exampleInputPassword2" placeholder="Phone no">
                                                        </div>
                                                        <!-- Province -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Province</label>
                                                            <input type="password" class="form-control checkout_input" id="exampleInputPassword2" placeholder="Province">
                                                        </div>
                                                        <!-- Province -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Province</label>
                                                            <select name="province" id="provinsi" class="form-control dropdown_item_select checkout_input cekongkir" require="required">
                                                                <option>Provinsi*</option>
                                                                    <option value="1">Bali</option>
                                                                    <option value="2">Bangka Belitung</option>
                                                                    <option value="3">Banten</option>
                                                                    <option value="4">Bengkulu</option>
                                                                    <option value="5">DI Yogyakarta</option>
                                                                    <option value="6">DKI Jakarta</option>
                                                                    <option value="7">Gorontalo</option>
                                                                    <option value="8">Jambi</option>
                                                                    <option value="9">Jawa Barat</option>
                                                                    <option value="10">Jawa Tengah</option>
                                                                    <option value="11">Jawa Timur</option>
                                                                    <option value="12">Kalimantan Barat</option>
                                                                    <option value="13">Kalimantan Selatan</option>
                                                                    <option value="14">Kalimantan Tengah</option>
                                                                    <option value="15">Kalimantan Timur</option>
                                                                    <option value="16">Kalimantan Utara</option>
                                                                    <option value="17">Kepulauan Riau</option>
                                                                    <option value="18">Lampung</option>
                                                                    <option value="19">Maluku</option>
                                                                    <option value="20">Maluku Utara</option>
                                                                    <option value="21">Nanggroe Aceh Darussalam (NAD)</option>
                                                                    <option value="22">Nusa Tenggara Barat (NTB)</option>
                                                                    <option value="23">Nusa Tenggara Timur (NTT)</option>
                                                                    <option value="24">Papua</option>
                                                                    <option value="25">Papua Barat</option>
                                                                    <option value="26">Riau</option>
                                                                    <option value="27">Sulawesi Barat</option>
                                                                    <option value="28">Sulawesi Selatan</option>
                                                                    <option value="29">Sulawesi Tengah</option>
                                                                    <option value="30">Sulawesi Tenggara</option>
                                                                    <option value="31">Sulawesi Utara</option>
                                                                    <option value="32">Sumatera Barat</option>
                                                                    <option value="33">Sumatera Selatan</option>
                                                                    <option value="34">Sumatera Utara</option>
                                                                </select>
                                                        </div>
                                                        <!-- Address -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Address</label>
                                                            <select name="regency" id="kota" class="form-control dropdown_item_select checkout_input cekongkir" require="required">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                        <!-- Courier -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Courier</label>
                                                            <select name="courier" id="kurir" class="form-control dropdown_item_select checkout_input cekongkir">
                                                                <option>Kurir*</option>
                                                                <option value="1">JNE</option>
                                                                <option value="2">POS</option>
                                                                <option value="3">TIKI</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group text-center">
                                                            <div class="col-sm-offset-3 col-sm-8">
                                                                <span class="sdw-wrap">
                                                                    <a href="cardpage_3" class="sdw-hover btn btn-material btn-yellow btn-lg ripple-cont">Submit</a>
                                                                    <span class="sdw"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> --}}

                                                <form action="/produk/checkout-produk" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="alamat_user" name="address" aria-describedby="emailHelp" required>
                                                    </div>
                                                    <div class="mb-3 form-check">
                                                        <label class="form-check-label" for="exampleCheck1">Province</label>
                                                    </div>
                                                    <select class=" form-control" style="padding: 0px " aria-label="Default select example" id="provinsi_user" name="province">
                                                        <option selected disabled>--PILIH--</option>
                                                        @foreach ($data_provinsi as $daftar_provinsi)
                                                            <option data-provinsi="{{ $daftar_provinsi->province_id }}" value="{{$daftar_provinsi->name}}">{{ $daftar_provinsi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="mb-3 form-check">
                                                        <label class="form-check-label" for="exampleCheck1">City</label>
                                                    </div>
                                                    <select class=" form-control" style="padding: 0px " aria-label="Default select example" id="kota_user" name="regency">
                                                        <option selected disabled>--PILIH--</option>
                                                        @foreach ($data_kota as $daftar_kota)
                                                            <option data-kota="{{ $daftar_kota->city_id }}" value="{{$daftar_kota->name}}">{{ $daftar_kota->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="mb-3 form-check">
                                                        <label class="form-check-label" for="exampleCheck1">Courier</label>
                                                    </div>
                                                    <select class=" form-control" style="padding: 0px " aria-label="Default select example" id="pilihan_kurir" name="courier_id">
                                                        <option selected>--PILIH--</option>
                                                        @foreach ($data_kurir as $daftar_kurir)
                                                            <option data-kurir="{{ $daftar_kurir->code }}" value="{{ $daftar_kurir->id }}">{{ $daftar_kurir->courier}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select class=" form-control" style="padding: 0px " name="shipping_cost" id="layanan" required>
                                                        <option value="" selected disabled>Pilih Layanan</option>
                                                    </select>

                                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                                {{-- </form> --}}
                                                {{-- <form class="form-horizontal">
                                                    
                                                    <!-- Authocompille -->
                                                    <div class="form-group pd-none">
                                                        <label for="route" class="col-sm-3 control-label text-darkness">Province</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                   class="form-control"
                                                                   id="route">
                                                        </div>
                                                    </div>

                                                    <div class="form-group pd-none">
                                                        <label for="locality" class="col-sm-3 control-label text-darkness">Regency</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                   class="form-control"
                                                                   id="locality">
                                                        </div>
                                                    </div>

                                                    <div class="form-group pd-none">
                                                        <label for="administrative_area_level_1" class="col-sm-3 control-label text-darkness">Address</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                   class="form-control"
                                                                   id="administrative_area_level_1">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="deliveryComp" class="col-sm-3 control-label text-darkness">Courier</label>
                                                        <div class="col-sm-8">
                                                            <select id="deliveryComp" class="select" data-placeholder="TIKI"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-8">
                                                            <span class="sdw-wrap">
                                                                <a href="card-page-step-3.html" class="sdw-hover btn btn-material btn-yellow btn-lg ripple-cont">Go to next step</a>
                                                                <span class="sdw"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3 fix-height asside hidden-xs hidden-sm">
            <div class="product-list float-block">
                <div class="wrap bg-white">
                        <!-- Asside nav -->
                    <div class="asside-nav bg-grey-lightness hidden-xs">
                        <div class="header text-uppercase text-white bg-blue section_title">Your order</div>
                        
                        <ul class="list-2">
                            <li>
                                <span class="head">Subtotal</span>
                                <span class="sub">Rp.{{ number_format($total) }}</span>
                            </li>
                            <li>
                                <span class="head">Total Weight</span>
                                <span id="berat_total" data-berat="{{ $berat_total }}" class="sub">
                                    {{ number_format($berat_total) }} gram
                                </span>
                            </li>
                            {{-- <li>
                                <span class="head">Total price:</span>
                                <span class="sub">
                                    Rp.12000000
                                </span>
                            </li> --}}
                        </ul>
                        
                        {{-- <div class="asside-btn text-center">
                            <a href="/produk/cart" class="btn btn-primary btn-material"> 
                                <span class="body">View order</span>
                                <i class="icon icofont icofont-check-circled"></i>
                            </a>
                        </div> --}}
                    </div><!-- / Asside nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="row block none-padding-top">
        
        <div class="get-height">
            <div class="sdw-block">
                <div class=" bg-white">
                    <div class="container ganti">
                        <section class="section my-5 pb-5">
                          <!-- Shopping Cart table -->
                            <div style="color:#333333;" class="table-responsive col-md-12 col-lg-12">
                                <h1 align="center">Rincian Produk</h1>
                
                                <table class="table product-table">
                                    <!-- Table head -->
                                    <thead>
                        
                                        <tr>
                            
                                            <th></th>
                            
                                            <th class="font-weight-bold">
                                            <strong>Product</strong>
                                            </th>
                            
                                            <th class="font-weight-bold">
                                            <strong>Price</strong>
                                            </th>
                            
                                            <th class="font-weight-bold text-center">
                                            <strong>QTY</strong>
                                            </th>  
                            
                                        </tr>
                        
                                    </thead>
                                    <!-- Table head -->
                        
                                    <!-- Table body -->
                                    <tbody>
                        
                                        <!-- First row -->
                                        @foreach ($data_cart as $cart)

                                        <tr>
                                            @php
                                                $image = $cart->produk->getfirstimage();
                                            @endphp
                                            <th scope="row">
                                                <img style="height:50px;" src="{{ $image->image }}" alt="" class="img-fluid z-depth-0">
                                            </th>
                            
                                            <td>
                                                <h5 class="mt-3">
                                                    <strong>{{ $cart->produk->product_name }}</strong>
                                                </h5>
                                            </td>

                                            @forelse ($cart->produk->diskon as $diskonbarang)

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
                                            </td>    
                                        </tr>

                                        @endforeach
                                    </tbody>
                                    <!-- Table body -->
                                </table>
                            </form>
                            </div>
                          <!-- Shopping Cart table -->
                  
                        </section>
                        <input id="signup-token" name="_token" type="hidden" value="srPVAqI4zzowBlSsZ4TjXE1UDkhAjmeUrb4ZyFtw">
                        <input type="hidden" value="100" id="weight">
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection

@section('after-script')
<script>
    jQuery(document).ready(function() {       
        jQuery.ajaxSetup({        
            headers: {            
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')        
            }    
        });    
    });

    $('#pilihan_kurir').on('change', function() {
        
        var kurir =$('#pilihan_kurir').find('option:selected').data("kurir");
        var kota = $('#kota_user').find('option:selected').data("kota");
        var berat = $('#berat_total').data('berat');
        var html_option = '';
        console.log(kurir);
        console.log(kota);
        console.log(berat);
        $.ajax({
            url: '/produk/cekongkir',
            type: 'post',
            data: {
                kurir: kurir,
                kota: kota,
                berat: berat
                },
            success:function(data){
                $('select[name="shipping_cost"]').html('<option value="" selected>Tidak ada layanan</option>');
            
                // looping data result nya
                $.each(data, function(key, value){
                    // looping data layanan misal jne reg, jne oke, jne yes
                    $.each(value.costs, function(key1, value1){
                        // untuk looping cost nya masing masing
                        $.each(value1.cost, function(key2, value2){
                            html_option +='<option value="'+ value2.value +'">' + value1.service + '-' + value1.description + '- Rp.' +value2.value+ '</option>';
                            $('select[name="shipping_cost"]').html( html_option);
                        });

                        loadSubOngkir();
                        loadtotals();
                    });
                });
            }
        });
    });

    

</script>
    
@endsection