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
        <title>Login | {{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/icomoon/style.css')}}" rel="stylesheet">
        <link href="{{url('assets/plugins/uniform/css/default.css')}}" rel="stylesheet"/>
        <link href="{{url('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        
        <link href="{{url('assets/css/space.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
                <!-- Page Inner -->
                <div class="page-inner login-page">
                    <div id="main-wrapper" class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 login-box">
                                <h4 class="login-title">Sign in to your account</h4>
                                <form action="{{ url('custom-login') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" value="{{ old('email') }}" name="email" required class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                                    </div>
                                    @if(old('email'))
                                    <div class="alert alert-danger" role="alert">
                                        Error! Invalid Credentials.
                                    </div>
                                    @endif
                                    <input type="submit" class="btn btn-primary" value="Login">
                                    <a href="#" class="btn btn-default">Register</a><br>
                                    <a href="#" class="forgot-link">Forgot password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
         <!-- Javascripts -->
        <script src="{{url('assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{url('assets/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="{{url('assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{url('assets/js/space.min.js')}}"></script>
    </body>
</html>