<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
         @if(Session::get('admin_id'))
<title>Pak Indus Ice Factory- View Arrears Fisheries</title>

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
                                    <h4 class="page-title">View Arrears Fisheries</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pak Indus Ice Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active">View Arrears Fisheries</li>
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
            
                                            <h4 class="mt-0 header-title">View Arrears Fisheries</h4>
                                            <p class="text-muted m-b-30">These are all the arrears of fisheries.</p>
            
                                          
                                              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Balance</th>
                                                    <th>Amount Paid</th>
                                                    
                                                </tr>

                                                </thead>
    
    
                                                <tbody>
                                                  @foreach($fisheries_arrears as $fa)   
                                                <tr>
                                                <?php
                                                $currentMonth = date('m');
$current_month_balance = \App\sales::select('total_price')->whereRaw('MONTH(date) = ?',[$currentMonth])->where('dealer_id','=',$fa->dealer_id)->sum('total_price');
?>

                                                    <td>{{$fa->dealer_name}}</td>
                                                    <td>
                                                        @if($fa->new_balance-$current_month_balance>0)
                                                        Rs {{$fa->new_balance-$current_month_balance}}
                                                        @else 0
                                                        @endif
                                                       </td>
                                                    <td>
                                                         <form action="{{route('add.dealer.amount')}}" method="POST">
                                         {{ csrf_field() }}
                                                          <div class="row">
                                                            <div class="col-sm-5">
                                                                <input type="hidden" value="{{$fa->dealer_id}}" name="dealer_id">
                                                        <input type="number" class="form-control" name="amount_paid" placeholder="Enter Amount">

                                                    </div>
                                                    <div class="col-sm-5">
                                                    <select class="form-control" name="paid_through" required="">
                                                        <option value="">-Paid Through-</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque-Meezan">Cheque (Meezan Bank)</option>
                                                      <option value="Cheque-Soneri">Cheque (Soneri Bank)</option>
                                                    </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                         <button class="btn btn-primary" type="submit" style="width:80px">Add</button>
                                                     </div>
                                                     </div>
                                                    </form></td>

                                                  
                                                </tr>
                                                 @endforeach
                                               
                                                </tbody>
                                            </table>

                                             <br>
                                            
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    
                                                    <th>TOTAL BALANCE</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    
                                                    <td><b>@if($total_arears>0) Rs {{$total_arears}} @else 0 @endif</b></td>
                                                    
                                                </tr>
                                               
                                                </tbody>
                                            </table>

                     <div id="print_report" style="display: none;">
                <table>
                                                <thead>
                                                <tr>
                                                    
                                                    <th style="width:100px">Name</th>
                                                    <th style="width:100px">Balance</th>
                                                    
                                                    
                                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                                     @foreach($fisheries_arrears as $fa) 
                                                      <?php
                                                $currentMonth = date('m');
$current_month_balance = \App\sales::select('total_price')->whereRaw('MONTH(date) = ?',[$currentMonth])->where('dealer_id','=',$fa->dealer_id)->sum('total_price');
?> 
                                                <tr>
                                                    <td>{{$fa->dealer_name}}</td>
                                                    <td>
                                                       @if($fa->new_balance-$current_month_balance>0)
                                                        Rs {{$fa->new_balance-$current_month_balance}}
                                                        @else 0
                                                        @endif
                                                       </td>
                                                     
                                                  
                                                </tr>
                                                 @endforeach
                                               <tr>
                                                <td colspan="2"></td>
                                               </tr>
                                               <tr>
                                                <td><b>Total Balance:</b></td>
                                                <td><b>@if($total_arears>0) Rs {{$total_arears}} @else 0 @endif</b></td>
                                               </tr>
                                                
                                                </tbody>
                                            </table>

           </div>
                                             <br><br>

                                                <script type="text/javascript">
    
function printDiv() {
    var x = document.getElementById("print_report");
    x.style.display = "block";
    

    var divToPrint = document.getElementById('print_report');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<img src='dashboard_css/images/logo.png' style='height:100px;width:100px;'><h1 align='center' style='color:#1b81ec; margin-top:-110px'>Pak Indus Ice Factory </h1>");
    newWin.document.write("<h4 align='center' style='color:#1b81ec'>Plot No. DP-34 Sector 6D North Karachi Industrial Area, Karachi  </h4>");
    newWin.document.write("<h4 align='center' style='color:#1b81ec'>Cell #: 0333-1600600, 0313-9234600</h4>");

    newWin.document.write("<h3 align='center'>Arrears: Fisheries");
    

    newWin.document.write(htmlToPrint);
    
    newWin.print();
    newWin.close();
    x.style.display = "none";
    }
      </script>
                                     <div style="text-align: center" >

                                                <button class="btn btn-primary" style="width:100px" onclick="printDiv();">Print Report</button>

                                            </div>



                                                        
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