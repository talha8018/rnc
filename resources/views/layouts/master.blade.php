<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Royal National College">
        <meta name="keywords" content="rnc,college">
        <meta name="author" content="Muhammad Talha">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>@yield('title') | {{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/icomoon/style.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/uniform/css/default.css')}}" rel="stylesheet"/>
        <link href="{{url('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        @yield('css')
        <!-- Theme Styles -->
        <link href="{{url('assets/css/space.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
    </head>
    <body>
    
    <!-- Page Container -->
    <div class="page-container">
        @include('includes.sidebar')
        <!-- Page Content -->
        <div class="page-content">            
            @include('includes.page-header')            
            <!-- Page Inner -->
            <div class="page-inner">
                        @yield('content')
                <div class="page-footer">
                    <p>Code with <i class="fa fa-heart"></i> by talha8018</p>
                </div>
            </div><!-- /Page Inner -->

        </div><!-- /Page Content -->
    </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="{{url('assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{url('assets/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="{{url('assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{url('assets/js/space.js')}}"></script>
        @yield('js')

        <script>
          
        </script>
    </body>
</html>