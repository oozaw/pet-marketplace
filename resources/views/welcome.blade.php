@extends('user_layouts.user_master')
@section('content')
<!-- 
SLIDESHOW
=============================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="clearfix">
            <div class="owl-carousel slideshow">
                <!-- Item -->
                <div class="item">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-5 hidden-xs hidden-sm">
                                
                                <!-- Header -->
                                <h2 class="header text-uppercase text-blue">{{ $produk_1->product_name }}</h2>
                                
                                <!-- Text -->
                                <p>
                                    {{ $produk_1->description }}
                                </p>
                                
                                <!-- Buttons -->
                                <span class="btn-panel">
                                        
                                        {{-- <span class="sdw-wrap">
                                            <a href="/produk/buynow" class="sdw-hover btn btn-lg btn-material btn-default"><span class="body">Buy Now</span></a>
                                            <span class="sdw"></span>
                                        </span> --}}
                                        
                                        <span class="hor-divider"></span>
                                        
                                        <span class="sdw-wrap">
                                            <a href="/produk/{{ $produk_1->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i><span class="body">See Detail</span></a>
                                            <span class="sdw"></span>
                                        </span> 
                                </span>
                            </div>
                            
                            <div class="col-xs-10 col-xs-offset-1 col-md-7 col-md-offset-0">
                                
                                <!-- Image -->
                                <div class="img">
                                    <img src="{{ asset('pengguna/html/images/slideshow/img-01.png') }}" alt="">
                                </div>
                                
                                {{-- <!-- Badge Sale -->
                                <span class="sale-badge bg-green text-uppercase">
                                    new
                                </span> --}}
                                @foreach ($produk_1->diskon as $diskonbarang)
                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                <span class="sale-badge item-badge text-uppercase bg-red">
                                    <small>
                                        Sale
                                    </small>
                                    -{{ $diskonbarang->percentage }}%
                                </span>
                                    
                                @endif
                                @endforeach
                                
                                <!-- Price -->
                                <span class="price hidden-xs">
                                    @forelse ($produk_1->diskon as $diskonbarang)

                                        @php
                                            $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_1->price
                                        @endphp                                        

                                        <!-- Price -->

                                        {{-- <strike class="wrap text-red">
                                            Rp. {{ number_format($produk_2->price) }}
                                        </strike> --}}

                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_1->price-$nilaidiskon) }}
                                        </span>
                                    
                                    @empty
                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_1->price) }}
                                        </span>

                                    @endforelse
                                    {{-- <span class="wrap text-red">
                                        Rp.{{ number_format($produk_2->price) }}
                                    </span> --}}
                                </span>
                                
                                <!-- Mobile button -->
                                <span class="text-center visible-xs">
                                    <span class="sdw-wrap">
                                        <a href="/produk/{{ $produk_1->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i>
                                            <span class="body">
                                                @forelse ($produk_1->diskon as $diskonbarang)

                                                @php
                                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_1->price
                                                @endphp 

                                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                    
                                                    <!-- Price -->
            
                                                    {{-- <strike class="wrap text-red">
                                                        Rp. {{ number_format($produk_2->price) }}
                                                    </strike> --}}
            
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_1->price-$nilaidiskon) }}
                                                    {{-- </span> --}}
                                                @else
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_1->price) }}
                                                    {{-- </span> --}}
                                                    
                                                @endif

        
                                            
                                                @empty
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_1->price) }}
                                                    {{-- </span> --}}
            
                                                @endforelse
                                                {{-- <span class="wrap text-red">
                                                    Rp.{{ number_format($produk_2->price) }}
                                                </span> --}}
                                            </a>
                                        <span class="sdw"></span>
                                    </span> 
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Item -->
                <div class="item">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-5 hidden-xs hidden-sm">
                                
                                <!-- Header -->
                                <h2 class="header text-uppercase text-blue">{{ $produk_2->product_name }}</h2>
                                
                                <!-- Text -->
                                <p>
                                    {{ $produk_2->description }}
                                </p>
                                
                                <!-- Buttons -->
                                <span class="btn-panel">
                                        
                                        {{-- <span class="sdw-wrap">
                                            <a href="/produk/buynow" class="sdw-hover btn btn-lg btn-material btn-default"><span class="body">Buy Now</span></a>
                                            <span class="sdw"></span>
                                        </span> --}}
                                        
                                        <span class="hor-divider"></span>
                                        
                                        <span class="sdw-wrap">
                                            <a href="/produk/{{ $produk_2->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i><span class="body">See Detail</span></a>
                                            <span class="sdw"></span>
                                        </span> 
                                </span>
                            </div>
                            
                            <div class="col-xs-10 col-xs-offset-1 col-md-7 col-md-offset-0">
                                
                                <!-- Image -->
                                <div class="img">
                                    <img src="{{ asset('pengguna/html/images/slideshow/img-02.png') }}" alt="">
                                </div>
                                
                                <!-- Badge Sale-->
                                {{-- <span class="sale-badge bg-red text-uppercase">
                                    Hot!
                                </span> --}}
                                @foreach ($produk_2->diskon as $diskonbarang)
                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                <span class="sale-badge item-badge text-uppercase bg-red">
                                    <small>
                                        hAI
                                    </small>
                                    -{{ $diskonbarang->percentage }}%
                                </span>
                                @endif
                                @endforeach

                                <!-- Price -->
                                <span class="price hidden-xs">
                                    @forelse ($produk_2->diskon as $diskonbarang)

                                        @php
                                            $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_2->price
                                        @endphp
                                        
                                        @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                            <!-- Price -->

                                            {{-- <strike class="wrap text-red">
                                                Rp. {{ number_format($produk_2->price) }}
                                            </strike> --}}

                                            <!-- Price -->
                                            <span class="wrap text-red">
                                                Rp. {{ number_format($produk_2->price-$nilaidiskon) }}
                                            </span>
                                        
                                        @else
                                            <!-- Price -->
                                            <span class="wrap text-red">
                                                Rp. {{ number_format($produk_2->price) }}
                                            </span>
                                            
                                        @endif
                                    
                                    @empty
                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_2->price) }}
                                        </span>

                                    @endforelse
                                    {{-- <span class="wrap text-red">
                                        Rp.{{ number_format($produk_2->price) }}
                                    </span> --}}
                                </span>
                              
                                <!-- Mobile button -->
                                <span class="text-center visible-xs">
                                    <span class="sdw-wrap">
                                        <a href="/produk/{{ $produk_2->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i>
                                            <span class="body">
                                                @forelse ($produk_2->diskon as $diskonbarang)
                                                @php
                                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_2->price
                                                @endphp                                        

                                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                    
                                                <!-- Price -->
        
                                                {{-- <strike class="wrap text-red">
                                                    Rp. {{ number_format($produk_2->price) }}
                                                </strike> --}}
        
                                                <!-- Price -->
                                                <span style="color: red">
                                                    Rp. {{ number_format($produk_2->price-$nilaidiskon) }}
                                                </span>
                                                @else

                                                     <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_2->price) }}
                                                    {{-- </span> --}}
                                                    
                                                @endif

        
                                            
                                                @empty
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_2->price) }}
                                                    {{-- </span> --}}
            
                                                @endforelse
                                                {{-- <span class="wrap text-red">
                                                    Rp.{{ number_format($produk_2->price) }}
                                                </span> --}}
                                            </span>
                                        </a>
                                        <span class="sdw"></span>
                                    </span> 
                                </span>        
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Item -->
                <div class="item">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-5 hidden-xs hidden-sm">
                                
                                <!-- Header -->
                                <h2 class="header text-uppercase text-blue">{{ $produk_3->product_name }}</h2>
                                
                                <!-- Text -->
                                <p>
                                    {{ $produk_3->description }}
                                </p>
                                
                                <!-- Buttons -->
                                <span class="btn-panel">
                                        
                                    {{-- <form action="/produk/buynow">
                                        <button class="sdw-wrap">
                                            <a class="sdw-hover btn btn-lg btn-material btn-default"><span class="body">Buy Now</span></a>
                                            <span class="sdw"></span>
                                        </button>
                                        
                                    </form> --}}
                                        
                                        <span class="hor-divider"></span>
                                        
                                        <span class="sdw-wrap">
                                            <a href="/produk/{{ $produk_3->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i><span class="body">See Detail</span></a>
                                            <span class="sdw"></span>
                                        </span> 
                                </span>
                            </div>
                            
                            <div class="col-xs-10 col-xs-offset-1 col-md-7 col-md-offset-0">
                                
                                <!-- Image -->
                                
                                <div class="img">
                                    <img src="{{ asset('pengguna/html/images/slideshow/img-03.png') }}" alt="">
                                </div>

                                @foreach ($produk_3->diskon as $diskonbarang)
                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                <span class="sale-badge item-badge text-uppercase bg-red">
                                    <small>
                                        Sale
                                    </small>
                                    -{{ $diskonbarang->percentage }}<small>%</small>
                                </span>
                                    
                                @endif

                                @endforeach
                                
                                <!-- Badge -->
                                <!--span class="sale-badge bg-green text-uppercase">
                                    new
                                </span-->

                                <!-- Price -->
                                <span class="price hidden-xs">
                                    @forelse ($produk_3->diskon as $diskonbarang)

                                        @php
                                            $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_3->price
                                        @endphp                                
                                        
                                        @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                            
                                        <!-- Price -->

                                        {{-- <strike class="wrap text-red">
                                            Rp. {{ number_format($produk_2->price) }}
                                        </strike> --}}

                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_3->price-$nilaidiskon) }}
                                        </span>
                                        @else
                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_3->price) }}
                                        </span>
                                            
                                        @endif

                                    
                                    @empty
                                        <!-- Price -->
                                        <span class="wrap text-red">
                                            Rp. {{ number_format($produk_3->price) }}
                                        </span>

                                    @endforelse
                                    {{-- <span class="wrap text-red">
                                        Rp.{{ number_format($produk_2->price) }}
                                    </span> --}}
                                </span>
                                
                                <!-- Mobile button -->
                                <span class="text-center visible-xs">
                                    <span class="sdw-wrap">
                                        <a href="/produk/{{ $produk_3->id }}/tampil" class="sdw-hover btn btn-lg btn-material btn-primary"><i class="icon icofont icofont-basket"></i>
                                            <span class="body">
                                                @forelse ($produk_3->diskon as $diskonbarang)

                                                @php
                                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $produk_3->price
                                                @endphp       
                                                
                                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                    
                                                <!-- Price -->
        
                                                {{-- <strike class="wrap text-red">
                                                    Rp. {{ number_format($produk_2->price) }}
                                                </strike> --}}
        
                                                <!-- Price -->
                                                {{-- <span class="wrap text-red"> --}}
                                                    Rp. {{ number_format($produk_3->price-$nilaidiskon) }}
                                                {{-- </span> --}}
                                            
                                                @else
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_3->price) }}
                                                    {{-- </span> --}}
                                                    
                                                @endif
        
                                                @empty
                                                    <!-- Price -->
                                                    {{-- <span class="wrap text-red"> --}}
                                                        Rp. {{ number_format($produk_3->price) }}
                                                    {{-- </span> --}}
            
                                                @endforelse
                                                {{-- <span class="wrap text-red">
                                                    Rp.{{ number_format($produk_2->price) }}
                                                </span> --}}
                                            </span>
                                        </a>
                                        <span class="sdw"></span>
                                    </span> 
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: SLIDESHOW -->
    
<!-- END: LATEST ON BLOG -->
@endsection