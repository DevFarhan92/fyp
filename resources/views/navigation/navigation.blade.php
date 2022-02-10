 <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{route('dashboard')}}" class="waves-effect">
                                    <i class="mdi mdi-home"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-network"></i><span> Dealers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('add.new.dealer')}}">Add New</a></li>
                                    <li><a href="{{route('view.dealers.local')}}">View Local Dealers</a></li>
                                     <li><a href="{{route('view.dealers.fisheries')}}">View Fisheries</a></li>
                                  
                                </ul>
                            </li>


                              <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash"></i><span> Sales <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('add.new.sale')}}">Add New</a></li>
                                    <li><a href="{{route('view.overall.sales')}}">View Overall Sales</a></li>
                                  
                                </ul>
                            </li>

                               <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash"></i><span> Expenses <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('add.new.expense')}}">Add New</a></li>
                                    <li><a href="{{route('view.expenses')}}">View Overall Expenses</a></li>
                                  
                                </ul>
                            </li>

                               

                               <!-- <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash"></i><span> Arrears <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('view.arrears.local.dealer')}}">Local Dealers</a></li>
                                    <li><a href="{{route('view.arrears.fisheries')}}">Fisheries</a></li>
                                  
                                </ul>
                            </li> -->

                             <!-- <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document-box"></i><span> Reports <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('view.general.report')}}">General Report</a></li>
                                    <li><a href="{{route('view.dealerwise.report')}}">Dealer wise report</a></li>
                                     <li><a href="{{route('view.expense.report')}}">Expense Report</a></li>
                                     <li><a href="{{route('view.arrears.report')}}">Arrears Report</a></li>
                                     <li><a href="{{route('view.factory.goods.report')}}">Factory Goods Report</a></li>
                                  
                                </ul>
                            </li> -->
                              
                              <!-- <li>
                                <a href="{{route('cash.management')}}" class="waves-effect">
                                    <i class="mdi mdi-cash"></i><span> Cash Management </span>
                                </a>
                            </li> -->

                              <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-card-details"></i><span> Employees <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('add.new.employee')}}">Add New</a></li>
                                    <li><a href="{{route('view.employees')}}">View Existing</a></li>
                                  
                                </ul>
                            </li>


                              <!-- <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document-box"></i><span> Cheque Management <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('add.new.cheque.received')}}">Add Cheque Received</a></li>
                                    <li><a href="{{route('add.new.cheque.given')}}">Add Cheque Given</a></li>
                                    <li><a href="{{route('view.cheque.received')}}">View Cheque Received</a></li>
                                    <li><a href="{{route('view.cheque.given')}}">View Cheque Given</a></li>
                                  
                                </ul>
                            </li> -->

                            <!-- <li>
                                <a href="{{route('factory.goods.management')}}" class="waves-effect">
                                    <i class="mdi mdi-apps"></i><span> Factory Goods </span>
                                </a>
                            </li>  -->
                         
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>