<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
       @if(Session::get('admin_id'))
<title>5 STAR Ice Factory
- Add New Sale</title>

@else

    <script>window.location="{{route('/')}}";</script>

@endif
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{URL::asset('dashboard_css/images/favicon.png')}}">

        <link href="{{URL::asset('dashboard_css/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{route('dashboard')}}" class="logo">
                        <span>
                            <img src="{{URL::asset('dashboard_css/images/logo.png')}}" alt="" height="74" style="width:80px">
                        </span>
                        <i>
                            <img src="{{URL::asset('dashboard_css/images/logo.png')}}" alt="" height="22">
                        </i>
                    </a>
                </div>

                  <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                       

                     
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{URL::asset('dashboard_css/images/users/user-4.jpg')}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="{{route('dashboard')}}"><i class="mdi mdi-account-circle m-r-5"></i> Dashboard</a>
                                   
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                      
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('navigation.navigation')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add New Sale</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">5 STAR Ice Factory
 Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Add New Sale</li>
                                    </ol>
            
                                  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                             @if ($errors->has(''))
                 <div class="alert alert-success">
                 @foreach ($errors->all() as $error)
                     {{ $error }}<br>        
                   @endforeach
                  </div>
                 @endif
                                          @if ($alert = Session::get('alert-success'))
                <div class="alert alert-success">
               {{ $alert }}
              </div>
            @endif   

              @if ($alert = Session::get('alert-invalid'))
                <div class="alert alert-danger">
               {{ $alert }}
              </div>
            @endif   
            
                                            <h4 class="mt-0 header-title">Add New Sale</h4>
                                            <p class="text-muted m-b-30">Add the following details to add a new sale</p>
                                     <form action="{{route('sale.add')}}" method="POST">
                                         {{ csrf_field() }}

                                         <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="date" id="example-text-input" name="date" placeholder="Date" required="">
                                                </div>
                                            </div>

                                         <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Dealer Name</label>
                                                <div class="col-sm-10">
                                                   <select class="form-control" name="dealer_name" required="">
                                                       <option value="">-Select Dealer-</option>
                                                       @foreach($dealers as $d)
                                                        <option value="{{$d->dealer_id}}">{{$d->dealer_name}}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Tank Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="example-text-input" name="tank_number" placeholder="Tank Number" required="">
                                                </div>
                                            </div>
                                         


                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">No. of blocks</label>
                                                <div class="col-sm-4">
                                                   <input type="number" class="form-control" name="no_of_blocks" required="">
                                                </div>

                                                 <label for="example-email-input" class="col-sm-2 col-form-label">Per Unit Price (Rs)</label>
                                                <div class="col-sm-4">
                                                   <input type="number" class="form-control" name="per_unit_price" required="">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Total Price (Rs)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" name="total_price" id="example-tel-input"  required="" readonly="">
                                                </div>
                                            </div>

                                            

                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Payment Received (Rs)</label>
                                                <div class="col-sm-4">
                                                   <input type="number" class="form-control" name="payment_recieved" required="">
                                                </div>

                                                 <label for="example-email-input" class="col-sm-2 col-form-label">Payment Pending (Rs)</label>
                                                <div class="col-sm-4">
                                                   <input type="number" class="form-control" name="payment_pending" readonly="" required="">
                                                </div>
                                            </div>

                                           

                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Truck Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="truck_number" id="example-tel-input"  required="">
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Driver</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="driver_name" id="example-tel-input"  required="">
                                                </div>
                                            </div>

                                              <div class="form-group row" >
                                                <button class="btn btn-primary" style="margin-left: 190px" type="submit">Submit</button>
                                            </div>
                                        </form>
                                          
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <footer class="footer">
                © 2022 5Star Ice Factory 
                </footer>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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
    


   <script>

        function CalculateTotalPrice() {
  $("input[name=no_of_blocks],input[name=per_unit_price]").change(function(){
   
  var no_of_blocks=$("input[name=no_of_blocks]").val();
  
   
    var per_unit_price=$("input[name=per_unit_price]").val();
    
    
    var total_price= no_of_blocks*per_unit_price;
    

   
   
    $('input[name=total_price]').val(total_price); 
    
});
}


function CalculateBalance() {
 $("input[name=payment_recieved],input[name=total_price]").change(function(){
   
  var payment_recieved=$("input[name=payment_recieved]").val();
  
   
    var total_price=$("input[name=total_price]").val();
    
    
    var payment_pending= total_price-payment_recieved;
    

   
   
    $('input[name=payment_pending]').val(payment_pending); 
    
});
}


$(document).ready(function(){
  // we call the function
  CalculateTotalPrice();
  CalculateBalance();
});
</script>



    </body>

</html>