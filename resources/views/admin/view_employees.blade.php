<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
         @if(Session::get('admin_id'))
<title>5 STAR Ice Factory
 Factory- View Employees</title>

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
                                    <h4 class="page-title">View Employees</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">5 STAR Ice Factory
 Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active">View Employees</li>
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
            
                                            <h4 class="mt-0 header-title">View Employees</h4>
                                            <p class="text-muted m-b-30">These are all the added Employees.</p>
            
                                           

                                              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Employee Name</th>
                                                    <th>Cnic</th>
                                                    <th>Post</th>
                                                    <th>Phone</th>
                                                    <th>Salary (Rs)</th>
                                                    <th>Salary Status</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                
    
    
                                                <tbody>
                                                     @foreach($employees as $e)
                                                <tr id="{{$e->employee_id}}">
                                                    <td>{{$e->employee_id}}</td>
                                                    <td>{{$e->employee_name}}</td>
                                                    <td>{{$e->cnic}}</td>
                                                    <td>{{$e->employee_post}}</td>
                                                    <td>{{$e->phone}}</td>
                                                    <td>
                                                    <form action="{{route('update.employee.salary')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                    <div class="col-sm-1">
                                                    <label for="" style="margin-top:9px">Rs</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                    <input type="hidden" name="employee_id" value="{{$e->employee_id}}">
                                                    <input type="number" class="form-control" name="salary" value="{{$e->salary}}" required>
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <div class="row" style="margin-left:110px">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                    </td>
                                                    <td> 
                                                     <?php
                    $currentMonth = date('m');
$employee_salary_status = \App\expenses::select('*')->where('expense_discription','=',$e->employee_id)->whereRaw('MONTH(date) = ?',[$currentMonth])->count();
?>
                                                       @if($employee_salary_status>0)
                                                       <h4 style="text-align: center;">Paid</h4>
                                                       @else
                                                     <form action="{{route('pay.employee.salary')}}" method="POST">
                                                    {{ csrf_field() }} 
                                                     <div class="row">
                                                     <input type="hidden" name="employee_id" value="{{$e->employee_id}}">
                                                     <input type="hidden" name="expense_amount" value="{{$e->salary}}">
                                                     <div class="col-sm-4">
                                                    <input placeholder="Date" type="text" onfocus="(this.type='date')" class="form-control" name="date"  required="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                    <select class="form-control" name="paid_through" required="">
                                                        <option value="">-Paid Through-</option>
                                                        <option value="Cash">Cash</option>
                                                         <option value="Cheque">Cheque</option>
                                                     
                                                    </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                    <button class="btn btn-primary" type="submit">Pay</button>
                                                    </div>
                                                    </div>
                                                    </form>
                                                    @endif
                                                    </td>
                                                     <td>
                                                         <button class="btn btn-primary remove" style="background-color: red; width:80px" id="show_confirm" >Delete</button>
                                                        
                                                      </td>
                                                  
                                                </tr>
                                                 @endforeach
                                               
                                                </tbody>
                                            </table>
              <script type="text/javascript" src="{!!asset('dashboard_css/js/jquery_new.min.js')!!}"></script>
                                                      <script type="text/javascript">
    $(".remove").click(function(){


        var id = $(this).parents("tr").attr("id");
        

        if(confirm('Are you sure to delete this employee record ?'))
        {
            $.ajax({
               url: '{{route('delete.employee')}}',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Employee Record deleted successfully");  
               }
            });
        }
    });


</script>
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