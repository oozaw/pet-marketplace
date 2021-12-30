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
        <div class="col-xs-12">
            
            <div class="product-list">
                <div class="wrap bg-white">
                    
                    <!-- Header -->
                    <div class="list-header text-uppercase">

                        {{-- <div class="check hidden-xs hidden-sm">
                            <div class="checkbox vers-2">
                                <input type="checkbox" id="checkAll">
                                <label for="checkAll">
                                    <i class="icofont icofont-check-alt"></i>
                                </label>
                            </div>
                        </div> --}}

                        <div class="product text-center">
                            Product
                        </div>

                        <div class="price hidden-xs hidden-sm text-center">
                            Price
                        </div>

                        <div class="qnt hidden-xs hidden-sm text-center">
                            Quantity
                        </div>

                        <div class="total hidden-xs hidden-sm text-center">
                            Total
                        </div>

                        <div class="rmv hidden-xs hidden-sm ">
                            Remove
                        </div>
                    </div><!-- / Header -->
                    
                    <!-- List body -->
                    <div class="list-body">               
                        <!-- Item -->
                        @foreach ($data_cart as $cart)
                        <div class="item">
                            
                            <!-- Checkbox -->
                            {{-- <div class="check hidden-xs">
                                <div class="checkbox vers-2">
                                    <input type="checkbox" id="item-check-1">
                                    <label for="item-check-1">
                                        <i class="icofont icofont-check-alt"></i>
                                    </label>
                                </div>
                            </div> --}}
                            
                            @php
                                $image = $cart->produk->getfirstimage();
                            @endphp
                            <div class="product">
                                <img src="{{ $image->image }}" alt="">
                                
                                <span class="comp-header st-8 text-uppercase">
                                    {{ $cart->produk->product_name }}
                                </span>
                            </div>

                            {{-- <div class="price hidden-xs">
                                <span class="price">
                                    <span class="prc" >
                                        <span name="price">Rp.{{ number_format($cart->produk->price) }}</span>
                                    </span>
                                </span>
                            </div> --}}

                            <div class="price hidden-xs">

                                @foreach ($cart->produk->diskon as $diskonbarang)
                                    @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                        <span class="disclam hidden-sm">Sale -{{ $diskonbarang->percentage }}%</span>
                                    @endif
                                @endforeach

                                @forelse ($cart->produk->diskon as $diskonbarang)

                                @php
                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $cart->produk->price
                                @endphp

                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                    <span class="price">
                                        <span class="prc" >
                                            <i>Rp.</i>
                                            <span name="price">{{ number_format($cart->produk->price-$nilaidiskon) }}</span>
                                        </span>
                                    </span>

                                    <span class="old hidden-xs hidden-sm">
                                        <i>Rp.</i>
                                        <span>
                                            {{ number_format($cart->produk->price) }}
                                        </span>
                                    </span>
                                    
                                @else
                                    <!-- Currency -->
                                    <span class="price">
                                        <span class="prc" >
                                            <i>Rp.</i>
                                            <span name="price">{{ number_format($cart->produk->price) }}</span>
                                        </span>
                                    </span>
                                    
                                @endif
                            
                                @empty
                                    
                                <!-- Currency -->
                                <span class="price">
                                    <span class="prc" >
                                        <i>Rp.</i>
                                        <span name="price">{{ number_format($cart->produk->price) }}</span>
                                    </span>
                                </span>

                                @endforelse

                            </div>

                            <div class="qnt text-center" id="banyak_barang">

                                <div id="inc{{ $cart->id }}" class=" btn-number qtyplus quantity-plus">
                                    <span type="button" onclick="addQty('{{ $cart->id }}')">
                                        <i class="icofont icofont-caret-up"></i>
                                    </span>
                                </div>

                                @forelse ($cart->produk->diskon as $diskonbarang)

                                <input type="text" class="incdec input-qty input-text"
                                    name="qty[]" id="qty{{$cart->id}}" value="{{$cart->qty}}"/>

                                @empty

                                <input type="text" class="incdec input-qty input-text"
                                name="qty[]" id="qty{{$cart->id}}" value="{{$cart->qty}}"/>

                                @endforelse

                                <div id="dec{{ $cart->id }}" class=" btn-number qtyplus quantity-minus">
                                    <span type="button" onclick="minusQty('{{ $cart->id }}')">
                                        <i class="icofont icofont-caret-down"></i>
                                    </span>
                                </div>

                            </div>

                            <div name="total" class="total">
                                @forelse ($cart->produk->diskon as $diskonbarang)
                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                    <i>Rp.</i>
                                    <span id="hargadiskon{{ $cart->id }}" class="total">
                                        {{ number_format(($cart->produk->price-$nilaidiskon)*$cart->qty) }}
                                    </span>
                                    
                                @else
                                    <i>Rp.</i>
                                    <span id="hargadiskon{{ $cart->id }}" class="total">
                                        {{ number_format(($cart->produk->price)*$cart->qty) }}
                                    </span>
                                    
                                @endif
        
                                @empty
                                
                                    <i>Rp.</i>
                                    <span id="harga{{ $cart->id }}" name="price" class="total">
                                        {{ number_format(($cart->produk->price)*$cart->qty) }}
                                    </span>

                                @endforelse
                            </div>

                            <div class="rmv">
                                <form action="/produk/buynow/{{ $cart->id }}/hapusbuynow" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="remove-btn" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                                            <i class="icofont icofont-close-line"></i>
                                        </button>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="item">
                            
                            @php
                                $image = $cart->produk->getfirstimage();
                            @endphp
                            <div class="product">
                                <img src="{{ $image->image }}" alt="">
                                
                                <span class="comp-header st-8 text-uppercase">
                                    {{ $cart->produk->product_name }}
                                </span>
                            </div>

                            <div class="price hidden-xs">

                                @foreach ($cart->produk->diskon as $diskonbarang)
                                    <span class="disclam hidden-sm">Sale -{{ $diskonbarang->percentage }}%</span>
                                @endforeach

                                @forelse ($cart->produk->diskon as $diskonbarang)

                                @php
                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $cart->produk->price
                                @endphp

                                <span class="price">
                                    <span class="prc" >
                                        <i>Rp.</i>
                                        <span name="price">{{ number_format($cart->produk->price-$nilaidiskon) }}</span>
                                    </span>
                                </span>

                                <span class="old hidden-xs hidden-sm">
                                    <i>Rp.</i>
                                    <span>
                                        {{ number_format($cart->produk->price) }}
                                    </span>
                                </span>
                            
                                @empty
                                    
                                <!-- Currency -->
                                <span class="price">
                                    <span class="prc" >
                                        <i>Rp.</i>
                                        <span name="price">{{ number_format($cart->produk->price) }}</span>
                                    </span>
                                </span>

                                @endforelse

                            </div>

                            <div>

                                <div>
                                    <input type="hidden" name="id[]" value="{{$cart->id}}">

                                    <div class="dec button btn-number qtyplus quantity-minus">
                                        -
                                    </div>

                                    @forelse ($cart->produk->diskon as $diskonbarang)

                                    <input type="text" class="incdec input-qty input-text"
                                        name="qty[]" id="value{{$cart->id}}" value="{{$cart->qty}}" data-price="{{$cart->produk->price-$nilaidiskon }}"/>
                                    @empty

                                    <input type="text" class="incdec input-qty input-text"
                                    name="qty[]" id="value{{$cart->id}}" value="{{$cart->qty}}" data-price="{{$cart->produk->price }}"/>
                                    @endforelse

                                    <div class="inc button btn-number qtyplus quantity-plus">
                                        +
                                    </div>

                                    <div name="total" >
                                        @forelse ($cart->produk->diskon as $diskonbarang)
        
                                        <i>Rp.</i>
                                        <span class="total">{{ number_format($cart->produk->price-$nilaidiskon) }}</span>
        
                                        @empty
                                        
                                        <i>Rp.</i>
                                        <span name="price" class="total">{{ number_format($cart->produk->price) }}</span>
        
                                        @endforelse
        
                                    </div>
                                </div>

                            
                            </div>

                            <div class="rmv text-center">
                                <form action="/produk/cart/{{ $cart->id }}/deletecart" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="remove-btn" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                                            <i class="icofont icofont-close-line"></i>
                                        </button>
                                </form>
                            </div>
                        </div> --}}
                        @endforeach
                        
                    </div>
                    <!-- / List body -->
                    
                    <!-- Footer -->
                    <div class="list-footer bg-blue">
                        
                        {{-- <a href="/produk/checkout" class="btn btn-default btn-material">
                            <i class="icofont icofont-cart-alt"></i>
                            <span class="body">Make a purchase</span>
                        </a> --}}
                        {{-- <button href="" class="btn btn-text-white">
                            <span class="body">Update Cart</span>
                        </button> --}}
                        <div class="asside-btn text-right">
                            <a href="/produk/buynow" class="btn btn-primary btn-material"> 
                                <span class="body">Update order</span>
                                <i class="icon icofont icofont-check-circled"></i>
                            </a>
                        </div>
                    </div><!-- / Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT -->

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
                                <span class="sub">Rp.{{ number_format($sub_price) }}</span>
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
                            <a href="/produk/buynow" class="btn btn-primary btn-material"> 
                                <span class="body">Confirm order</span>
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

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    incrementVar = 0;

    $('.inc.button').click(function(){
        var cart_id = $(this).attr('id').substring(3);
        // console.log(cart_id);
        var max = $(this).data("max");
            var $this = $(this),
            $input = $this.next('input'),
            $parent = $input.closest('div'),
            newValue = parseInt($input.val())+1;
        $parent.find('.inc').addClass('a'+newValue);
        $input.val(newValue);
        price = $(this).next('input').data('price'); 
        incrementVar += newValue;
        total = price * newValue;
        console.log(newValue);
        $(`#hargadiskon${cart_id}`).html(formatRupiah(total.toString()));
        $(`#harga${cart_id}`).html(formatRupiah(total.toString()));
    });

    $('.dec.button').click(function(){
        var cart_id = $(this).attr('id').substring(3);
        // console.log(cart_id);

        var min = $(this).data("min");
            var $this = $(this),
            $input = $this.prev('input'),
            $parent = $input.closest('div'),
            newValue = parseInt($input.val());
        $parent.find('.dec').addClass('a'-newValue);

        if (newValue <= 1) {
            price = $(this).prev('input').data('price');
            total = price * 1;
            console.log(price);

            $(`#hargadiskon${cart_id}`).html(formatRupiah(price.toString()));
            $(`#harga${cart_id}`).html(formatRupiah(price.toString()));
        } else {
            $input.val(newValue-1);
            price = $(this).prev('input').data('price');
            total = price * (newValue-1);

            $(`#hargadiskon${cart_id}`).html(formatRupiah(total.toString()));
            $(`#harga${cart_id}`).html(formatRupiah(total.toString()));
        }

        // console.log(newValue);
    });
    //newValue merupakan variabel quantity barang\

    function addQty(id){
        var url = '/produk/addqty/'+id;
        $.ajax({
            url:url,
            method : 'POST',
            success: function(response) {
                if(response.status == 0){
                    alert('Stock barang habis');
                }else{
                    $('#qty'+id).val(response.qty);
                    $('#hargadiskon'+id).html(response.nilaidiskon);
                    $('#harga'+id).html(response.nilaidiskon);
                }
            }
        })
    }

    function minusQty(id){
        var url = '/produk/minusqty/'+id;
        $.ajax({
            url:url,
            method : 'POST',
            success: function(response) {
                if(response.status == 0){
                    alert('Kuantitas barang tidak boleh 0');
                }else{
                    $('#qty'+id).val(response.qty);
                    $('#hargadiskon'+id).html(response.nilaidiskon);
                    $('#harga'+id).html(response.nilaidiskon);
                }
            }
        })
    }

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