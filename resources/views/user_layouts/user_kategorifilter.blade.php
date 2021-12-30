@extends('user_layouts.user_master')
@section('content')

<div class="container-fluid block bg-grey-lightness">
    <div class="row">
        <div class="container">
            
            <div class="row">
                
                <!-- Asside -->
                <div class="col-md-4 col-lg-3 asside">
                    <!-- Asside nav -->
                    <div class="asside-nav bg-white hidden-xs">
                        <div class="header text-uppercase text-white bg-blue">
                            Category
                        </div>

                        <ul class="nav-vrt bg-white">
                            @foreach ($data_kategori as $listkategori)
                            <li class="active">
                                <a href="/kategori/{{ $listkategori->id }}" class="btn-material">{{ $listkategori->category_name }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </div><!-- / Asside nav -->
                    
                    <!-- List categories for mobile -->
                    <div class="inblock padding-none visible-xs">
                        <div class="mobile-category nav-close">
                            
                            <!-- Header -->
                            <div class="header bg-blue">
                                <span class="head">Category</span>
                                <span class="btn-swither" >
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <ul class="nav-vrt bg-white">
                                @foreach ($data_kategori as $listkategori)
                                <li class="active">
                                    <a href="/kategori/{{ $listkategori->id }}" class="btn-material">{{ $listkategori->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- ./ Asside -->
                
                <div class="col-md-8 col-lg-9 shop-items-set">
                    
                    {{-- <!-- Paginations -->
                    <div class="row pagination-block hidden-xs">
                        <div class="col-xs-12">
                            
                            <div class="wrap">
                                
                                <!-- Pagination -->
                                <ul class="pagination">

                                    <li>
                                        <a href="#">
                                            <span><i class="icofont icofont-rounded-left"></i></span>
                                        </a>
                                    </li>

                                    <li><a href="#">01</a></li>
                                    <li class="active"><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">05</a></li>

                                    <li>
                                        <a href="#">
                                            <span><i class="icofont icofont-rounded-right"></i></span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Switch style on shop item -->
                                <ul class="swither">
                                    <li class="cols active">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    
                    
                    <!-- Item list -->
                    <div class="row item-wrapper">
                        
                        <!-- Shop item 1 / timer -->

                        @foreach ($filterkategori as $produk)

                        <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 shop-item hover-sdw timer"
                        data-timer-date="2018, 2, 5, 0, 0, 0">

                            <div class="wrap">

                                <!-- Image & Caption -->
                                <div class="body">

                                    <!-- Header -->
                                    <div class="comp-header st-4 text-uppercase">

                                        {{ $produk->product_name }} 
                                        {{-- <span>
                                            fake Brand
                                        </span> --}}

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
                                                <li class="active">
                                                    <i class="icofont icofont-star"></i>
                                                </li>
                                                <li>
                                                    <i class="icofont icofont-star"></i>
                                                </li>
                                            </ul>

                                        </div>

                                        <!-- Badge Sale-->
                                        @foreach ($produk->diskon as $diskonbarang)
                                            @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                <span class="sale-badge item-badge text-uppercase bg-red">
                                                    Sale -{{ $diskonbarang->percentage }}%
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>

                                    @php
                                        $foto_counter = 0;
                                    @endphp

                                    @foreach ($produk->productimage as $image)
                                    <!-- Image -->
                                    @php
                                        
                                        $foto_counter++;
                                    @endphp
                                    @if ($foto_counter==1)
                                        <div class="image" style="height: 410px">
                                            <img class="main" src="{{ $image->image }}" alt="">
                                        </div>
                                        
                                    @endif
                                        
                                    @endforeach


                                    <!-- Caption -->
                                    <div class="caption">
                                        <!-- Description -->
                                        <div class="row description">
                                            <div class="col-xs-12">
                                                <h5 class="header">
                                                    Description:
                                                </h5>
                                                
                                                <p>
                                                    {{ Str::limit($produk->description, 30, $end='...') }}
                                                </p>
                                                
                                            </div>
                                        </div>

                                        {{-- <!-- Timer -->
                                        <div class="timer-body">
                                            <span class="sale text-red">Sale</span>
                                            <span class="tdtimer-d"></span>d 
                                            <span class="tdtimer-h"></span>h 
                                            <span class="tdtimer-m"></span>m 
                                            <span class="tdtimer-s"></span>s 
                                        </div> --}}

                                    </div>
                                </div>


                                <!-- Buy btn & more link -->
                                <div class="info">

                                    <!-- Buy btn -->
                                    <a href="/produk/{{ $produk->id }}/tampil" class="btn-material btn-price">

                                        <!-- Price -->
                                        <span class="price" style="margin-left: -20px">

                                            @forelse ($produk->diskon as $diskonbarang)

                                                @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                                    @php
                                                    $nilaidiskon = ($diskonbarang->percentage / 100)* $produk->price
                                                    @endphp

                                                    <!-- Sale price -->
                                                    <span class="sale">
                                                        Rp. <span>{{ number_format($produk->price) }}</span>
                                                    </span>

                                                    <!-- Price -->
                                                    <span class="price">
                                                        Rp. {{ number_format($produk->price-$nilaidiskon) }}
                                                    </span>    
                                                @else
                                                    <!-- Price -->
                                                    <span class="price">
                                                        Rp. {{ number_format($produk->price) }}
                                                    </span>
                                                @endif

                                            
                                            @empty
                                                <!-- Price -->
                                                <span class="price">
                                                    Rp. {{ number_format($produk->price) }}
                                                </span>

                                            @endforelse
                                        </span>

                                        <!-- Icon card -->
                                        <span class="icon-card">
                                            <i class="icofont icofont-cart-alt"></i>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                            
                        @endforeach

                        <!-- / Shop item -->

                        <!-- Paginations -->
                        <div class="row hidden-xs text-center">
                            <div class="col-xs-12">
                                <div class="wrap">
                                    {{ $filterkategori->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ Item list -->
                </div>
            </div>
        </div>
    </div><!-- / Parallax wrapper -->
</div>

@endsection