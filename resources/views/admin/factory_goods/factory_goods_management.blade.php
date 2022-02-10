<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
         @if(Session::get('admin_id'))
<title>Pak Indus Ice Factory- Factory Goods Management</title>

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
                                    <h4 class="page-title">Factory Goods Management</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pak Indus Ice Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active">Factory Goods Management</li>
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

                     
                             
            <h4 class="mt-0 header-title">Add New good</h4>
            <br>
            <form action="{{route('add.new.good')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-1 col-form-label">Name</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" type="text" id="example-text-input" name="good_name" placeholder="Name" required="">
                                                </div>
                                                <label for="example-text-input" class="col-sm-1 col-form-label">Quantity</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" type="number" id="example-text-input" name="good_quantity" placeholder="Quantity" required="">
                                                </div>
                                                <label for="example-text-input" class="col-sm-1 col-form-label">Date Added</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" type="date" id="example-text-input" name="date" placeholder="date" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-left: 115px">
                                               <button type="submit" class="btn btn-primary"  >Save</button>
                                            </div>

                                            </form>
                                           
                                            <br><br>
                                            <h4 class="mt-0 header-title">Currently Present Goods</h4>
                                            <p class="text-muted m-b-30">This is all the goods which are currently present.</p>
            
                                           

                                              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                   
                                                    <th>Quantity</th>
                                                    <th>Date Added/Removed</th>
                                                    <th>Add Quantity</th>
                                                    <th>Subtract Quantity</th>
                                                </tr>

                                                </thead>
    
    
                                                <tbody>
                                                  @foreach($factory_goods as $fg)
                                                <tr>
                                                    <td>{{$fg->id}}</td>
                                                    <td>{{$fg->good_name}}</td>
                                                    
                                                   
                                                    <td>
                                               
                                                   {{$fg->good_quantity}}</td>
                                                    <td>
                                                    {{date('d-m-Y', strtotime($fg->date_updated))}} 
                                                 </td>
                                                    <td>
                                                    <form action="{{route('update.goods.quantity')}}" method="POST">
                                                    {{ csrf_field() }}
                                                     <input type="hidden" name="good_id" value="{{$fg->id}}">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                     <input type="number" class="form-control" name="add_quantity" placeholder="Add Amount" required=""></input>
                                                     </div>
                                                     <div class="col-sm-6">
                                                     <input type="date" name="date_added" class="form-control" required="">
                                                    </div>
                                                     </div>
                                                     <br>
                                                     <div style="text-align:center">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                    </td>

                                                    <td>
                                                    <form action="{{route('subtract.goods.quantity')}}" method="POST">
                                                    {{ csrf_field() }}
                                                     <input type="hidden" name="good_id" value="{{$fg->id}}">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                     <input type="number" class="form-control" name="subtract_quantity" placeholder="Subtract Amount" required=""></input>
                                                     </div>
                                                     <div class="col-sm-6">
                                                     <input type="date" name="date_added" class="form-control" required="">
                                                    </div>
                                                     </div>
                                                     <br>
                                                     <div style="text-align:center">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                    </td>
                                                  
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