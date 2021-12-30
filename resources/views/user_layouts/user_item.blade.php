@extends('user_layouts.user_master')
@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-9">
                    <!--
                    MAIN INFO
                    =============================================== -->
                    <div class="row shop-item-page">
                        
                        <!-- ITEM GALLERY BLOCK -->
                        <div class="col-sm-4 col-md-5 fix-height">
                            <div class="item-gallery float-block">
                               
                                <div class="owl-carousel image image-nav">
                                   
                                    @foreach ($produk->productimage as $produk_detail)
                                    <div class="item">
                                        <img src="{{ $produk_detail->image }}" alt="">
                                    </div>
                                    @endforeach
                                   
                                </div>

                            </div>

                        </div><!-- / ITEM GALLERY BLOCK -->
                        
                        <!-- CAPTION BLOCK -->
                        <div class="col-sm-8 col-md-7 get-height">
                            
                            <!-- Item header -->
                            <div class="row item-header">
                                
                                <div class="col-md-7">
                                   
                                    <h1 class="comp-header st-12 text-uppercase text-blue">
                                        {{ $produk->product_name}}
                                    </h1>
                                </div>
                                
                                <!-- Sale info -->
                                <div class="col-md-5 hidden-xs sale-info timer"
                                     data-timer-date="2018, 2, 5, 0, 0, 0">
                                    
                                     {{-- @foreach ($produk->diskon as $diskonbarang)
                                     <span class="sale-badge item-badge text-uppercase bg-red">
                                         Sale -{{ $diskonbarang->percentage }}%
                                     </span>
                                    @endforeach --}}
                                    @foreach ($produk->diskon as $diskonbarang)
                                    @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                    <span class="sale-info text-red"><span>Sale</span> -{{ $diskonbarang->percentage }}%</span>

                                    <!-- Timer -->
                                    <div class="timer-body">
                                        <span class="tdtimer-d"></span>expired date: {{ date("d F Y", strtotime($diskonbarang->end)) }}
                                        {{-- <span class="tdtimer-h"></span>h 
                                        <span class="tdtimer-m"></span>m 
                                        <span class="tdtimer-s"></span>s  --}}
                                    </div>
                                        
                                    @endif
                                    @endforeach



                                </div>
                                
                            </div>
                            
                            <!-- Divider -->
                            <div class="divider-dotted"></div>
                            
                            <!-- Price & rating panel -->
                            <div class="row price-pan">
                                
                                <!-- Price & rating -->
                                <!-- Price & rating -->
                                <div class="col-md-12">
    
                                    <span class="head">Price</span>
                                    
                                    <span class="price">

                                        @forelse ($produk->diskon as $diskonbarang)

                                        @if (date('Y-m-d')>= $diskonbarang->start && date('Y-m-d')< $diskonbarang->end)
                                        @php
                                            $nilaidiskon = ($diskonbarang->percentage / 100)* $produk->price
                                        @endphp

                                        <!-- Sale price -->
                                            <span class="sale text-red">
                                                Rp. <span>{{ number_format($produk->price) }}</span>
                                            </span>

                                        <!-- Price -->
                                        <span class="price">
    
                                            <!-- Currency -->
                                        <span class="curr">Rp. </span>
                                            {{ number_format($produk->price-$nilaidiskon) }}
                                        </span>
                                            
                                        @else
                                        <!-- Price -->
                                        <span class="price">
                                            
                                            <!-- Currency -->
                                            <span class="curr">Rp. </span>
                                                {{ number_format($produk->price) }}
                                            </span>
                                            
                                        @endif


                                    
                                        @empty
                                        <!-- Price -->
                                        <span class="price">
                                            
                                        <!-- Currency -->
                                        <span class="curr">Rp. </span>
                                            {{ number_format($produk->price) }}
                                        </span>

                                        @endforelse

                                    </span>
                                    
                                </div>
                                {{-- <div class="col-md-12">
                                    
                                    <span class="price">

                                        <!-- Price -->
                                        <span class="price">
                                            Rp.{{$produk->price}}
                                        </span>
                                    </span>
                                </div> --}}
                                
                                <!-- Badge & Favorite -->
                                <div class="col-md-12">
                                    
                                    <!-- Rate -->
                                    <div class="rate">

                                        <div class="rate-info">
                                            <span class="head">Rating</span>
                                        </div>

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

                                </div>

                                <div class="col-md-12 text-right" style="margin-top: 10px">
                                    
                                    <!-- Stock -->

                                    <div class="rate">
                                        <div class="rate-info">
                                            @if ($produk->stock == 0)
                                            <span class="head" style="color: red">Out of Stock</span>
                                            @else
                                            <span class="head">Stock : {{$produk->stock}} pcs</span>
                                                
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 text-right" style="margin-top: 10px">
                                    
                                    <!-- Berat -->
                                    <div class="rate">

                                        <div class="rate-info">
                                            <span class="head">Berat : {{$produk->weight}} gram </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                            <!-- Divider -->
                            <div class="divider-dotted"></div>
                            
                            <!-- Buy btn panel -->
                            {{-- <div class="row"> --}}
                                <div class="col-xs-12">
                                    
                                    <div class="buy-btn-panel bg-blue">
                                        
                                        <!-- Cart icon -->
                                        <div class="cart-icon" style="padding-top: 30px">
                                            <i class="icofont icofont-basket"></i>
                                        </div>
                                        
                                        <!-- Btns -->
                                        <div class="btns-wrap btn-material text-center">
                                            <form action="/cart/store" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $produk->id }}" name="id_produk">
                                                <button class="text-blue" style="width: 300px; padding-right: 41px" type="submit">Put in cart</button>
                                            </form>
                                        </div>
                                        
                                        <!-- Btns -->
                                        <div class="btns-wrap btn-material text-center">
                                            <form action="/produk/store/buynow" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $produk->id }}" name="id_produk">
                                                <button class="text-blue" style="width: 300px; padding-right: 41px" type="submit">Buy Now</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            {{-- </div> --}}

                            <!-- Description -->
                            <div class="row description">
                                <div class="col-xs-12">
                                    <h4 class="header">
                                        Description:
                                    </h4>
                                    <p>
                                        {{ $produk->description }}
                                    </p>
                                </div>
                            </div>
                            <!-- END:  Description -->

                            <!-- Kategori -->
                            <div class="row description">
                                <div class="col-xs-12">
                                    <h2 class="header">
                                        Kategori:
                                    </h2>
                                    @foreach ($produk->kategori as $daftar_kategori)
                                    <li>
                                        {{ $daftar_kategori->category_name }}
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- / CAPTION BLOCK -->
                        <!-- END:  Kategori -->
                        
                    </div>
                    <!-- END: MAIN INFO -->
                    
                    <!--
                    COMMENTS
                    =============================================== -->
                    <div class="row shop-item-info">
                        <div class="col-xs-12">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a class="text-uppercase">Review
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="comments" id="comments">
                                    
                                    <!-- Header -->
                                    <h3 class="header"></h3>

                                    <!-- Comments -->
                                    <ul class="media-list">

                                        <!-- 1 comments -->
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{ asset('pengguna/html/images/profile/profile-img.jpg') }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">John Doe</a>
                                                </h4>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem a alias aut, aspernatur veritatis eius eligendi! Nam laboriosam, cumque consequuntur corrupti, nisi iusto explicabo iure quia nostrum odio aperiam dolores?

                                                <span class="media-info">12 dec 2016 
                                                    <a href="#">
                                                        <i class="icofont icofont-reply"></i>
                                                    </a>
                                                </span>

                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="{{ asset('pengguna/html/images/profile/profile-img.jpg ') }}" alt="...">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">Anna Doe</a>
                                                        </h4>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem a alias aut, aspernatur veritatis eius eligendi! Nam laboriosam, cumque consequuntur corrupti, nisi iusto explicabo iure quia nostrum odio aperiam dolores?

                                                        <span class="media-info">12 dec 2016 
                                                            <a href="#">
                                                                <i class="icofont icofont-reply"></i>
                                                            </a>
                                                        </span>

                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <!-- 2 comments -->
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{ asset('pengguna/html/images/profile/profile-img.jpg ') }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">Mark Smith</a>
                                                </h4>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem a alias aut, aspernatur veritatis eius eligendi! Nam laboriosam, cumque consequuntur corrupti, nisi iusto explicabo iure quia nostrum odio aperiam dolores?

                                                <span class="media-info">12 dec 2016 
                                                    <a href="#">
                                                        <i class="icofont icofont-reply"></i>
                                                    </a>
                                                </span>

                                            </div>
                                        </li>

                                        <!-- 3 comments -->
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{ asset('pengguna/html/images/profile/profile-img.jpg ') }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">John Doe</a>
                                                </h4>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem a alias aut, aspernatur veritatis eius eligendi! Nam laboriosam, cumque consequuntur corrupti, nisi iusto explicabo iure quia nostrum odio aperiam dolores?

                                                <span class="media-info">12 dec 2016 
                                                    <a href="#">
                                                        <i class="icofont icofont-reply"></i>
                                                    </a>
                                                </span>

                                            </div>
                                        </li>
                                    </ul>

                                    <!-- Paginations -->
                                    <div class="row pagination-wrap">
                                        <div class="col-sm-11 col-sm-offset-1">
                                            <ul class="pagination">
                                                <li>
                                                    <a href="#" aria-label="Previous">
                                                        <i class="icofont icofont-curved-left"></i>
                                                    </a>
                                                </li>
                                                <li><a href="#">01</a></li>
                                                <li class="active"><a href="#">02</a></li>
                                                <li><a href="#">03</a></li>
                                                <li><a href="#">04</a></li>
                                                <li><a href="#">05</a></li>
                                                <li>
                                                    <a href="#" aria-label="Next">
                                                        <i class="icofont icofont-curved-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Form -->
                                    <div class="add-comment">

                                        <!-- Header -->
                                        <h3 class="header">Add new comments</h3>

                                        <form class="form-horizontal">

                                            <div class="form-group">
                                                <label for="inputText" class="col-sm-3 control-label">Enter your message</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="inputText" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-7">
                                                    <button type="submit" class="btn btn-primary btn-material">
                                                        <span class="body">Send message</span>
                                                        <i class="icon icofont icofont-check-circled"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: COMMENTS -->
                </div>

                <!-- Asside -->
                <div class="visible-lg col-md-4 col-lg-3 asside">

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
                    </div>
                    <!-- / Asside nav -->
                </div><!-- ./ Asside -->
            </div>
        </div>
    </div>
</div>
@endsection