<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
       @if(Session::get('admin_id'))
<title>Pak Indus Ice Factory- Single Cheque Details</title>

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
                                    <h4 class="page-title">Single Cheque Details</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pak Indus Ice Factory</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Single Cheque Details</li>
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
            
                                            <h4 class="mt-0 header-title">Cheque Reciept</h4>
                                          @foreach($cheque_details as $cd)    @endforeach
                                    
                                        

                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Date.</label>
                                                <div class="col-sm-4">
                                                  <input type="date" class="form-control" disabled="" value="{{$cd->date}}" name="">
                                                </div>

                                                <label for="example-text-input" class="col-sm-2 col-form-label">Clearing Date</label>
                                                <div class="col-sm-4">
                                                  <input type="date" class="form-control" disabled="" value="{{$cd->clearing_date}}" name="">
                                                </div>
                                            </div>

                                         <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Dealer Name</label>
                                                <div class="col-sm-4">
                                                   <input type="text" class="form-control" disabled="" value="{{$cd->dealer_name}}" name="">
                                                </div>
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Dealer Type</label>
                                                <div class="col-sm-4">
                                                   <input type="text" class="form-control" disabled="" value="{{$cd->dealer_type}}" name="">
                                                </div>
                                            </div>
                                           
                                         


                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Cheque Number</label>
                                                <div class="col-sm-4">
                                                   <input type="text" class="form-control" name="no_of_blocks"  disabled="" value="{{$cd->cheque_number}}">
                                                </div>

                                                 <label for="example-email-input" class="col-sm-2 col-form-label">Cheque Amount (Rs)</label>
                                                <div class="col-sm-4">
                                                   <input type="number" class="form-control" name="per_unit_price"  disabled="" value="{{$cd->cheque_amount}}">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Attachment</label>
                                                <div class="col-sm-10">
                                                <a href="{{ asset("attachments/cheque/{$cd->cheque_attachment}") }}"> {{$cd->cheque_attachment}}</a>
                                                </div>
                                            </div>

                                            

                                            

                                           

                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Cheque Type</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="truck_number" id="example-tel-input"  required="" disabled="" value="{{$cd->cheque_type}}">
                                                </div>
                                            </div>

                                            
                                            <br>

                                             <div>
                                                <div id="print_report" style="display: none">
                                                 <table>
                                                     <tr>
                                                        <td><b>Date: {{date('d-m-Y', strtotime($cd->date))}}</b>&nbsp &nbsp &nbsp</td> 
                                                         <td><b>Clearing Date: {{date('d-m-Y', strtotime($cd->clearing_date))}}</b>&nbsp &nbsp &nbsp</td> 
                                                     </tr>
                                                     <tr>
                                                        <td><b>Dealer Name:</b> &nbsp &nbsp {{$cd->dealer_name}}</td> 
                                                        <td><b>Dealer Type:</b> &nbsp &nbsp {{$cd->dealer_type}}</td> 
                                                         
                                                     </tr>

                                                      <tr>
                                                          <td><b>Cheque Number</b>&nbsp &nbsp &nbsp {{$cd->cheque_number}} </td> 
                                                       <td><b>Cheque Amount</b> &nbsp &nbsp &nbsp Rs {{$cd->cheque_amount}} </td> 
                                                       
                                                     </tr>
                                                     
                                              
                                               <tr>
                                                        <td colspan="2"><b>Cheque Type:</b>&nbsp &nbsp {{$cd->cheque_type}} </td> 
                                                         
                                                     </tr>

                                                     

                                                   
                                                     

                                                 </table>
                                             </div>
                                             </div> 
                                      

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
    
    newWin.document.write("<img src='{{URL::asset('dashboard_css/images/logo.png')}}' style='height:60px;width:60px; margin-left:50px'><h3 align='center' style='margin-top:-60px'>Pak Indus Ice Factory </h3>");
    newWin.document.write("<h4 align='center'>Plot No. DP-34 Sector 6D North Karachi Industrial Area, Karachi  </h4>");
    newWin.document.write("<h5 align='center'>Payment Voucher</h5>");
    newWin.document.write(htmlToPrint);
    newWin.document.write("<h4 align='left'>Mob: 0333-1600600, 0313-9234600</h4>");
    newWin.document.write("<h5 align='left'>______________________&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp______________________</h5>");
    newWin.document.write("<h5 align='left'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAuthorised By &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Received By</h5>");
    newWin.print();
    newWin.close();
    x.style.display = "none";
    }
      </script>
                                          
                                        </div>

                                        <div style="text-align: center" >

                                                <button class="btn btn-primary" onclick="printDiv();">Print Receipt</button>

                                            </div>
                                            <br><br>
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