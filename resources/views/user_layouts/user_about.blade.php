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
                    <div class="row blog-item-page">
                        
                        <div class="col-md-12">
                            
                            <!-- Image -->
                            <div class="image">
                                <img src="{{ asset('pengguna/html/images/blog/img-01-big.jpg') }}" alt="">
                            </div>
                            
                            <!-- Info panel -->
                            <div class="info-panel">
                                <ul>
                                    <li>12 december 2017</li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">John Doe</a></li>
                                </ul>
                            </div>
                            
                            <!-- Header -->
                            <div class="header">
                                <h1>
                                    Aliquam earum eum expedita quo quasi?
                                </h1>
                            </div>
                            
                            <!-- Item body -->
                            <div class="item-body">
                               
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam veniam quas beatae, provident facilis, voluptatibus accusamus alias eveniet. Id cupiditate commodi sed quis ex totam illo sint nesciunt explicabo quidem molestias inventore dolor, exercitationem ratione dignissimos laborum quam iure nisi, eaque quibusdam aspernatur rem doloremque dolores vitae. Minima saepe, rem assumenda natus tenetur non facere sed voluptatibus eligendi aperiam hic, quam dolor itaque modi autem enim dolore eum iure adipisci necessitatibus magni accusantium odio, molestiae deleniti! Tempora, corporis quibusdam ea voluptatum temporibus animi asperiores quisquam beatae modi id doloribus quod consequatur, reprehenderit maiores quidem velit neque, voluptas sapiente! Omnis quasi quas nihil natus illum.
                                </p>
                                
                                <p>
                                    Nam voluptatibus atque adipisci, similique fuga nulla cum sequi eius! A suscipit, dolores illum animi ratione et sed dolor sequi quis illo error pariatur eligendi, nemo, voluptates quae, neque voluptas ut vitae! Quidem eum veritatis, tempore ab incidunt dolore quas sint deleniti pariatur, animi quod! Optio odio repellendus veritatis officiis unde illo porro aspernatur expedita ipsum. Dolores aliquam ea illo odit sunt, repellat temporibus non autem officiis harum provident ducimus architecto commodi rem impedit, suscipit quos, reprehenderit perferendis. Provident obcaecati ullam ex, tempore qui corporis doloremque. Perferendis vitae non blanditiis quod quisquam, numquam. Nostrum, eaque, dicta?
                                </p>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END: MAIN INFO -->
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