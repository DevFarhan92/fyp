<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> 5 &#9733; Ice Factory - Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{URL::asset('dashboard_css/images/favicon.png')}}">

        <link href="{{URL::asset('dashboard_css/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/style.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card card_bg">
                <div class="card-body card_bdy ">

                    <h3 class="text-center m-0 card_body" >
                        <a href="#" class="logo logo-admin"><img src="{{URL::asset('dashboard_css/images/logo.png')}}" height="120" style="width:120px; height:auto;" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <!-- <h4 class="text-muted font-18 m-b-5 text-center"> 5 STAR ICE FACTORY !</h4> -->
                       
                          @if ($alert = Session::get('alert-invalid'))
                <div class="alert alert-danger">
               {{ $alert }}
              </div>
            @endif

             @if(Session::get('admin_id'))
    <script>window.location="{{route('dashboard')}}";</script>
   @endif
                        <form class="form-horizontal m-t-30" action="{{route('admin.login')}}" method="POST">
                               {{ csrf_field() }}
                            <div class="form-group">
                                <label for="username"> <i class="fa  fa-user"></i><span class="ml-2">Username</span></label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required="">
                            </div>

                            <div class="form-group">
                                <label for="userpassword"> <i class="fa fa-key"></i><span class="ml-2">Password</span></label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required="">
                            </div>

                            <div class="form-group row m-t-30">
                                <!-- <div class="col-6">
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div> 
                                </div> -->
                                <div class="col-12 text-center button_sty">
                                    <button class="btn btn-primary w-md waves-effect waves-light " type="submit">
                                    <i class="fa fa-sign-in"></i> <span class="ml-2">Log In</span></button>
                                </div>
                            </div>

                         <!--    <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
               
                <p class="text-dark " style="font-weight:bold;">© 2022. Five <sup><i class="fa fa-star"></i></sup> Ice Factory.</p>
            </div>

        </div>

        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="{!!asset('dashboard_css/js/jquery.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/js/bootstrap.bundle.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/js/metisMenu.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/js/jquery.slimscroll.js')!!}"></script>
        <script src="{!!asset('dashboard_css/js/waves.min.js')!!}"></script>

        <script src="{!!asset('dashboard_css/plugins/jquery-sparkline/jquery.sparkline.min.js')!!}"></script>

        <!-- App js -->
        <script src="{!!asset('dashboard_css/js/app.js')!!}"></script>

    </body>

</html>