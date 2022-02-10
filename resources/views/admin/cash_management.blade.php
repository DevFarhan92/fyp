<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
         @if(Session::get('admin_id'))
<title>Pak Indus Ice Factory- Cash Management</title>

@else

    <script>window.location="{{route('/')}}";</script>

@endif
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Table css -->
        <link href="{{URL::asset('dashboard_css/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" media="screen">

        <link href="{{URL::asset('dashboard_css/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('dashboard_css/css/style.css')}}" rel="stylesheet" type="text/css">


          <!-- DataTables -->
        <link href="{{URL::asset('dashboard_css/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('dashboard_css/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{URL::asset('dashboard_css/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
                                    <h4 class="page-title">Cash Management</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pak Indus Ice Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active">Cash Management</li>
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

                      @foreach($cash_details as $cd)   @endforeach
                             <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    
                                                    <th colspan="2">Cash In Factory</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    
                                                    <td><p style="font-size: 24px"><b>Rs {{$cd->cash_in_factory}}</b></p></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('add.cash.in.factory')}}" method="POST">
                                                    {{ csrf_field() }} 
                                                    <input type="number" class="form-control" name="add_cash" placeholder="Enter Amount to Add" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="Deposit Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Add Cash</button>
                                                    </form>
                                                    </div>
                                                    

                                                    
                                                    
                                                    
                                                    </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    
                                                    <td></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    

                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('subtract.cash.in.factory')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="number" class="form-control" name="subtract_cash" placeholder="Enter Amount to Subtract" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="WithDraw Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Subtract Cash</button>
                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                    </td>
                                                </tr>
                                               
                                                </tbody>
                                            </table>

                                            <br><br>
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    
                                                    <th colspan="2">Cash In Meezan Bank</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    
                                                    <td><p style="font-size: 24px"><b>Rs {{$cd->cash_in_meezan}}</b></p></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('add.cash.in.meezan.bank')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="number" class="form-control" name="add_cash" placeholder="Enter Amount to Add" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="Deposit Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Add Cash</button>
                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                    </td>
                                                    </tr>
                                                     <tr>
                                                     <td></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('subtract.cash.in.meezan.bank')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="number" class="form-control" name="subtract_cash" placeholder="Enter Amount to Subtract" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="WithDraw Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Subtract Cash</button>
                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                    </td>
                                                </tr>
                                               
                                                </tbody>
                                            </table>
                                               <br><br>
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    
                                                    <th colspan="2">Cash In Soneri Bank</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    
                                                    <td><p style="font-size: 24px"><b>Rs {{$cd->cash_in_soneri}}</b></p></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('add.cash.in.soneri.bank')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="number" class="form-control" name="add_cash" placeholder="Enter Amount to Add" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="Deposit Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Add Cash</button>
                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                    </td>
                                                    </tr>
                                                     <tr>
                                                     <td></td>
                                                    <td>
                                                    <div class="row">
                                                    
                                                    <div class="col-sm-5">
                                                    <form action="{{route('subtract.cash.in.soneri.bank')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="number" class="form-control" name="subtract_cash" placeholder="Enter Amount to Subtract" min=0 required="">
                                                    </div>
                                                    <div class="col-sm-5">
                                                    <input placeholder="WithDraw Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Subtract Cash</button>
                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                    </td>
                                                </tr>
                                               
                                                </tbody>
                                            </table>
                                               <br>
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <th><p style="font-size: 24px"><b>Total Cash in Banks: Rs {{$cd->cash_in_meezan + $cd->cash_in_soneri}}</b></p></th>
                                                </thead>
                                            </table>
                                            <br><br>
                                            <h4 class="mt-0 header-title">Cash Deposit/WithDraw History</h4>
                                            <p class="text-muted m-b-30">This is all the cash deposit and withdraw history.</p>
            
                                           

                                              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                   
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                    <th>Transaction type</th>
                                                </tr>

                                                </thead>
    
    
                                                <tbody>
                                                @foreach($cash_deposit_history as $cdh)    
                                                <tr>
                                                    <td>{{$cdh->id}}</td>
                                                    <td>{{date('d-m-Y', strtotime($cdh->date))}}</td>
                                                    <td>{{$cdh->amount}}</td>
                                                    <td>{{$cdh->action}}</td>
                                                    <td>{{$cdh->transaction_type}}</td>
                                                </tr>
                                                @endforeach 
                                               
                                                </tbody>
                                            </table>
            
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

        <!-- Responsive-table-->
        <script src="{!!asset('dashboard_css/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')!!}"></script>

         <!-- Required datatable js -->
        <script src="{!!asset('dashboard_css/plugins/datatables/jquery.dataTables.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/dataTables.bootstrap4.min.js')!!}"></script>
        <!-- Buttons examples -->
        <script src="{!!asset('dashboard_css/plugins/datatables/dataTables.buttons.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/buttons.bootstrap4.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/jszip.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/pdfmake.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/vfs_fonts.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/buttons.html5.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/buttons.print.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/buttons.colVis.min.js')!!}"></script>
        <!-- Responsive examples -->
        <script src="{!!asset('dashboard_css/plugins/datatables/dataTables.responsive.min.js')!!}"></script>
        <script src="{!!asset('dashboard_css/plugins/datatables/responsive.bootstrap4.min.js')!!}"></script>

        <!-- Datatable init js -->
        <script src="{!!asset('dashboard_css/pages/datatables.init.js')!!}"></script>

        <!-- App js -->
        <script src="{!!asset('dashboard_css/js/app.js')!!}"></script>

        <script>
            $(function() {
                $('.table-responsive').responsiveTable({
                    addDisplayAllBtn: 'btn btn-secondary'
                });
            });
        </script>


    </body>

</html>