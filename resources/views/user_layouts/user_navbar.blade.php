        <!-- 
        NAVBAR
        =============================================== -->
        <nav class="navbar navbar-default">
            
            <div class="container">
               
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('pengguna/html/images/pop3.png') }}" alt="" class="brand">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    <!-- Top panel / search / phone -->
                    <div class="top-panel">
                       
                        <div class="phone text-blue">
                            <i class="icofont icofont-phone-circle"></i>
                            +62 85 536 553 596
                        </div>
                        
                        {{-- <form class="search bg-grey-light btn-material">
                            <input type="text" class="search-form" id="top-search">
                            <label for="top-search">search</label>
                        </form> --}}
                        
                        <ul class="list-btn-group navbar-right">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        Guest
                                    @endif

                                </a>

                                
                                @if (Auth::check())
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @else
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/login">
                                        {{-- {{ __('Logout') }} --}}Login
                                    </a>

                                    {{-- <form id="login-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                                </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                    
                    <ul class="nav navbar-nav navbar-right info-panel">

                        @if (Auth::check())
                        {{-- @php
                            echo(Auth::user()->id);
                        @endphp --}}
                        <!-- Nav Item - Notifikasi -->
                        
                        <li>
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">

                                    @if ($notif->count() == 5)
                                        {{ $notif->count() }}+
                                    @else
                                        {{ $notif->count() }}
                                    @endif
                                </span>
                            </a>
                            <ul class="dropdown-menu">

                                @foreach ($notif as $item)
                                @php
                                    $data = json_decode($item->data);
                                @endphp
                                    
                                    <li>
                                        <a href="/produk/sukses-bayar/{{$data->id}}" onclick="read('{{$item->id}}')">
                                            <div class="mr-3">
                                                <i class="fas fa-bell fa-fw"></i>
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">{{ $data->nama }} {{ $data->massage}}</div>
                                                <div class="small">{{ date("d F Y", strtotime($item->created_at)) }}</div>
                                            </div>
                                        </a>
                                    </li>

                                @endforeach

                                @if (isset($notif))
                                    <li><a href="/notifikasi" class="text-center small">Read More Notification</a></li>
                                    
                                @endif

                            </ul>
                        </li>

                        <!-- Nav Item - Pesan -->
                        {{-- <li>
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/pesan">
                                        <div class="mr-3">
                                            <i class="fas fa-envelope fa-fw"></i>
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                            <div class="small">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/pesan">
                                        <div class="mr-3">
                                            <i class="fas fa-flag fa-fw"></i>
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                            <div class="small">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/pesan">
                                        <div class="mr-3">
                                            <i class="fas fa-address-book fa-fw"></i>
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                            <div class="small">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="/pesan" class="text-center small">Read More Messages</a></li>
                            </ul>
                        </li> --}}
                        @else

                        @endif

                        <!-- Profile -->
                        <li class="profile">
                            <span class="wrap">
                                
                                <!-- Image -->
                                <span class="image bg-white">
                                    
                                    <!-- New message badge -->
                                    {{-- <span class="badge bg-blue hidden-xs hidden-sm">5</span> --}}
                                   
                                    <span class="icon">
                                        <i class="icofont icofont-user-alt-4 text-blue"></i>
                                    </span>

                                </span>
                                
                                <!-- Info -->
                                <span class="info">
                                    <!-- Name -->
                                    @if (Auth::check())
                                        <span class="name text-uppercase">{{ Auth::user()->name }}</span>
                                        <a href="/profile">see profile</a>
                                    @else
                                        <span class="name text-uppercase">Guest</span>
                                        <a href="/login">Login</a>
                                    @endif
                                    
                                </span>
                            </span>
                        </li>
                        
                        <!-- Cart -->
                        <li class="cart">

                            @if (Auth::check())
                                <li class="more-btn sdw ">
                                    <a href="/produk/cart" class="btn btn-primary">
                                        Shopping Cart
                                        <i class="icofont icofont-cart-alt"></i>
                                    </a>
                                </li>
                            @else

                            @endif
                            
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="{{ request()->is('welcome','/') ? 'active' : '' }}">
                            <a href="/welcome">
                                Home
                            </a>
                        </li>
                        <li class="{{ request()->is('kategori') ? 'active' : '' }}">
                            <a href="/kategori">
                                Product Category
                            </a>
                        </li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}">
                            <a href="/about">
                                About Us
                            </a>
                        </li>
                    </ul>
                
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- END: NAVBAR -->



