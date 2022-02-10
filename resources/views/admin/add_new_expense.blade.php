<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
       @if(Session::get('admin_id'))
<title>5 STAR Ice Factory
  - Add New Expense</title>

@else

    <script>window.location="{{route('/')}}";</script>

@endif
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                    <h4 class="page-title">Add New Expense</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">5 STAR Ice Factory
Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Add New Expense</li>
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
            
                                            <h4 class="mt-0 header-title">Add New Expense</h4>
                                            <p class="text-muted m-b-30">Add the following details to add a new expense</p>
                                     <form action="{{route('expense.add')}}" method="POST" enctype="multipart/form-data">
                                         {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="date" id="example-text-input" name="date" placeholder="Date" required="">
                                                </div>
                                            </div>
                                          
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-sm-2 col-form-label">Expense Description</label>
                                                <div class="col-sm-10">
                                                   
                                                    <input type="text" class="form-control" name="expense_discription" placeholder="Expense Description" required="">
                                                </div>
                                            </div>

                                             


                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Expense Amount</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" name="expense_amount" placeholder="Expense Amount" id="example-email-input" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Expense Type</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="expense_type" required="">
                                                      <option value="">-Select One-</option>
                                                      <option value="Local">Local</option>
                                                      <option value="Company">Company</option>
                                                      <option value="Electricity Bill">Electricity Bill</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Expense Attachment</label>
                                                <div class="col-sm-10">
                                                 <input type="file" class="form-control" name="expense_attachment" accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Paid Through</label>
                                                <div class="col-sm-10">
                                                  <select class="form-control" name="paid_through" required="">
                                                    <option value="">-Select One-</option>
                                                      <option value="Cash">Cash</option>
                                                      <option value="Pay Order">Pay Order</option>
                                                      <option value="Cheque-Meezan">Cheque </option>
                                                      
                                                  </select>
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label" style="display: none" id="cheque_number1">Cheque Number</label>
                                                <div class="col-sm-10" style="display: none" id="cheque_number2">
                                                    <input class="form-control" type="text" name="cheque_number" placeholder="Cheque Number" id="example-email-input">
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

         <script type="text/javascript">
     function DisplayCheque() {
 $("select[name=paid_through]").change(function(){
   
   
  var paid_through=$("select[name=paid_through]").val();
  
  if(paid_through=="Cheque")
  {
   var x = document.getElementById("cheque_number1");
   var y = document.getElementById("cheque_number2");
    x.style.display = "block";
    y.style.display = "block";
  }

  else if(paid_through=="Cash")
  {
    var x = document.getElementById("cheque_number1");
   var y = document.getElementById("cheque_number2");
    x.style.display = "none";
    y.style.display = "none";
  }

  else if(paid_through=="Pay Order")
  {
    var x = document.getElementById("cheque_number1");
   var y = document.getElementById("cheque_number2");
    x.style.display = "none";
    y.style.display = "none";
  }
   
    

   
   
    
    
});
}


$(document).ready(function(){
  // we call the function
  DisplayCheque();
  
});
                                            </script>
    
    </body>

</html>