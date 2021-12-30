<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!--link rel="icon" href="#"-->

        <title>WELCOME</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('pengelola/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('pengguna/html/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
        
        <!-- Icons -->
        <link href="{{ asset('pengguna/html/assets/fonts/icofont/icofont.min.css') }}" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="{{ asset('pengguna/html/css/theme.min.css') }}" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body>
        
        <!-- 
        NAVBAR
        =============================================== -->
        @include('user_layouts.user_navbar')
        <!-- END: NAVBAR -->
        
        <!-- 
        CONTENT
        =============================================== -->
        @yield('content')

        <!-- END: CONTENT -->

        <!-- FOOTER
        =============================================== -->
        @include('user_layouts.user_footer')
        <!-- END: FOOTER -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('pengguna/html/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('pengguna/html/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('pengguna/html/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('pengguna/html/assets/js/owl.carousel.min.js') }}"></script><!-- OWL Carousel -->
        <script src="{{ asset('pengguna/html/assets/js/lv-ripple.jquery.min.js') }}"></script><!-- BTN Material effects --> 
        <script src="{{ asset('pengguna/html/assets/js/SmoothScroll.min.js') }}"></script><!-- SmoothScroll -->
        <script src="{{ asset('pengguna/html/assets/js/jquery.TDPageEvents.min.js') }}"></script><!-- Page Events -->
        <script src="{{ asset('pengguna/html/assets/js/jquery.TDParallax.min.js') }}"></script><!-- Parallax -->
        <script src="{{ asset('pengguna/html/assets/js/jquery.TDTimer.min.js') }}"></script><!-- Timer -->
        <script src="{{ asset('pengguna/html/assets/js/selectize.min.js') }}"></script><!-- Select customize -->
        <script src="{{ asset('pengguna/html/js/main.min.js') }}"></script>
        <script src="{{ asset('pengguna/source/main.js') }}"></script>

        <script>
    
            function read(id) {
                $.ajax({
                    url : '/user/read-notif/'+id,
                    method : 'GET',
                    success : function (response) {
                        console.log(response);
                    }
                });
            }
        </script>
        

        @yield('after-script')

    </body>
</html>
