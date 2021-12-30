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
                
                {{-- <!-- Header -->
                <div class="list-header text-uppercase">

                    <div class="check hidden-xs hidden-sm">
                        <div class="checkbox vers-2">
                            <input type="checkbox" id="checkAll">
                            <label for="checkAll">
                                <i class="icofont icofont-check-alt"></i>
                            </label>
                        </div>
                    </div>

                    <div class="product">
                        Product
                    </div>

                    <div class="price hidden-xs hidden-sm">
                        Price
                    </div>

                    <div class="qnt hidden-xs hidden-sm">
                        Quantity
                    </div>

                    <div class="total hidden-xs hidden-sm">
                        Total
                    </div>

                    <div class="rmv hidden-xs hidden-sm">
                        Remove
                    </div>
                </div><!-- / Header --> --}}
                
                <!-- List body -->
                <div class="list-body">
                    <table class="table table-striped table-bordered " align="center">
                        <thead>
                            <tr>
                                <th class="">Product</th>
                                <th class="">Price</th>
                                <th class="">Quantity</th>
                                <th class="">Total</th>
                                <th class="">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_cart as $cart)
                            <tr>
                                <td class="product">
                                    @php
                                    $image = $cart->produk->getfirstimage();
                                    @endphp
                                    <a href="#">
                                        <img src="{{ $image->image }}" alt="">
                                    </a>
                                    <a class="comp-header st-8 text-uppercase">
                                        {{ $cart->produk->product_name }}
                                    </a>
                                </td>

                                <td class="product-price" data-title="Price">
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
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="qty-label">Quantiy:</span>
                                        <div class="control">
                                            <div>
                                                <input type="hidden" name="id[]" value="{{$cart->id}}">

                                                <button id="btn_minus" class="dec button btn-number qtyplus quantity-minus" type="button" value="-">
                                                    <i class="icofont icofont-minus"></i>
                                                </button>

                                                <span name="qty" id="quantity" class="input">
                                                    <input type="text" value="1">
                                                </span>

                                                {{-- <div class="dec button btn-number qtyplus quantity-minus">
                                                    -
                                                </div> --}}
                
                                                @forelse ($cart->produk->diskon as $diskonbarang)
                
                                                <input type="text" class="incdec input-qty input-text"
                                                    name="qty[]" id="value{{$cart->id}}" value="{{$cart->qty}}" data-price="{{$cart->produk->price-$nilaidiskon }}"/>

                                                @empty
                
                                                <input type="text" class="incdec input-qty input-text"
                                                name="qty[]" id="value{{$cart->id}}" value="{{$cart->qty}}" data-price="{{$cart->produk->price }}"/>

                                                @endforelse
                
                                                {{-- <div class="inc button btn-number qtyplus quantity-plus">
                                                    +
                                                </div> --}}
                                                <button id="btn_plus" class="inc button btn-number qtyplus quantity-plus" type="button" value="+">
                                                    <i class="icofont icofont-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-price" data-title="Price">
                                    <span class="kobolg-Price-amount amount subtotal">
                                        {{-- @if($is_discount)
                                        {{"Rp " . number_format(($cart->products->price-$diskon)*$cart->qty,0,',','.')}}@else
                                        {{"Rp " . number_format($cart->products->price*$cart->qty,0,',','.')}}@endif --}}

                                    </span>
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="actions">
                                    <button type="button" id="submit" class="button" name="update_cart"
                                        value="Update cart">Update cart
                                    </button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    {{-- <!-- Item -->
                    @foreach ($data_cart as $cart)
                    <div class="item">
                        
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
                    </div>
                    @endforeach --}}
                    
                </div><!-- / List body -->
                
                <!-- Footer -->
                <div class="list-footer bg-blue">
                    <button href="/cardpage_2" class="btn btn-default btn-material">
                        <i class="icofont icofont-cart-alt"></i>
                        <span class="body">Make a purchase</span>
                    </button>
                    {{-- <a href="cardpage_1" class="btn btn-text-white">
                        <span class="body">remove selected</span>
                    </a> --}}
                </div><!-- / Footer -->
            </div>
        </div>
    </div>
</div>
<!-- END: CONTENT -->
</div>

{{-- <script>
    function format2(n, currency) {
        return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1.");
    }

    function sum() {
        var input = 1;
        var plus = document.getElementById('btn_plus').value;
        var minus = document.getElementById('btn_minus').value;
        // var tiga = document.getElementById('txt3').value;
        var result = parseInt(input)+(parseInt(plus) + parseInt(minus));

        if (!isNaN(result)) {
            var hasil = format2(result,"Rp. ");
            document.getElementById('total').value = hasil;
        }
    }
</script> --}}

{{-- <script>

    $(document).ready(function(){
        update_amounts();
        $('qty, .price').on('keyup keypress blur change',
        function(e){
            update_amounts();
        });
            
    });
    function update_amounts(){
        var sum = 0.0;
        $('#banyak_barang > span').each(function(){
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var total = (qty*price)
            sum+=total;
            $(this).find('.total').text(''+total);
        });
        $('.total').text(sum);
    }
    var incrementQty;
    var decrementQty;
    var plusBtn  = $(".cart-qty-plus");
    var minusBtn = $(".cart-qty-minus");
    var incrementQty = plusBtn.click(function() {
        var $n = $(this)
        .parent(".button-container")
        .find(".qty");
        $n.val(Number($n.val())+1 );
        update_amounts();
    });
    var decrementQty = minusBtn.click(function() {
        var $n = $(this)
        .parent(".button-container")
        .find(".qty");
        var QtyVal = Number($n.val());
        if (QtyVal > 0) {
            $n.val(QtyVal-1);
        }
        update_amounts();
    });

</script> --}}



@endsection

