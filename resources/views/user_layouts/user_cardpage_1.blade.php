@extends('user_layouts.user_master')
@section('content')
<div class="container">
<!-- 
STEPS
=============================================== -->
<div class="row block none-padding-top">
    <div class="col-xs-12">
        
        <ul class="steps row">
            <li class="active active col-xs-12 col-sm-4 col-md-4 col-lg-3">
                <div class="icon number bg-blue">
                    1
                </div>
                <span>
                    Confirm 
                </span>
                Shopping cart
                
                <span class="dir-icon hidden-xs">
                    <i class="icofont icofont-stylish-right text-yellow"></i>
                </span>
            </li>

            <li class="hidden-xs col-sm-4 col-md-4 col-lg-3">
                <div class="icon number bg-grey">
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
                


                @if ($data_cart->count()==0)
                <!-- List body -->              
                <!-- Item -->
                <div class="list-body">   
                    <div class="profile-main text-center">
                        <ul class="steps row">
                            <h2 class="text-uppercase text-blue" style="font-weight: bolder">
                                Tidak Terdapat Barang di dalam Cart
                            </h2>
                        </ul>
                    </div>
                </div>
                <!-- / List body -->
                <!-- Footer -->
                <div class="list-footer bg-blue">
                    <a class="btn btn-default btn-material">
                        <i class="icofont icofont-cart-alt"></i>
                        <span class="body" onclick="return confirm('Anda tidak memiliki barang utnuk transaksi')">Make a purchase</span>
                    </a>
                </div>
                <!-- / Footer -->
                @else

                <!-- List body -->              
                <!-- Item -->
                <div class="list-body"> 

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
                            <form action="/produk/cart/{{ $cart->id }}/deletecart" method="post">
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
                    <!-- / List body -->
                    @endforeach
                    
                </div>
                <!-- Footer -->
                <div class="list-footer bg-blue">
                    
                    <a href="/produk/checkout" class="btn btn-default btn-material">
                        <i class="icofont icofont-cart-alt"></i>
                        <span class="body">Make a purchase</span>
                    </a>
                    {{-- <button href="" class="btn btn-text-white">
                        <span class="body">Update Cart</span>
                    </button> --}}
                </div>
                <!-- / Footer -->
                    
                @endif
            </div>
        </div>
    </div>
</div>
<!-- END: CONTENT -->
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

</script>
    
@endsection

