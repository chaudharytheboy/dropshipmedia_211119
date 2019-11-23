<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('employee/orders') }}">
                    <i class="fa fa-th"></i> <span>Orders</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
           <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        @if(Auth::user()->role_id == 2)
                          <li class="header">MAIN NAVIGATION</li>
                         <li>
                            <a href="{{ url ('employee/dashboard') }}">
                                <i class="fa fa-user"></i> <span>View Customer Order</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{ url ('employe/empPriorty') }}">
                                <i class="fa fa-user"></i> <span>PRIORITY</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                        
                         <li>
                            <a href="{{ url ('employe/empDeliver') }}">
                                <i class="fa fa-user"></i> <span>DELIVERED </span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                         <li>
                            <a href="{{ url ('employe/empCompleted') }}">
                                <i class="fa fa-user"></i> <span>COMPLETED</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                         <li>
                            <a href="{{ url ('employe/empLate') }}">
                                <i class="fa fa-user"></i> <span>LATE</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                         <li>
                            <a href="{{ url ('employe/empSolve') }}">
                                <i class="fa fa-user"></i> <span>SOLVE</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li> -->

                        @else(Auth::user()->role_id == 3)
                        <li class="header">MAIN NAVIGATION</li>
                         <li>
                        <a href="{{ url ('admin/CustOrd') }}">
                            <i class="fa fa-user"></i> <span>View Customer Order</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                     </li>
                      <li>
                            <a href="{{ url ('admin/CustomerDetail') }}">
                                <i class="fa fa-user"></i> <span>Customer Detail</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                    </li>
                        <li>
                            <a href="{{ route ('admin/employee-details') }}">
                                <i class="fa fa-user"></i> <span>Add Employee</span>
                                
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                        
                   
                      <li>
                              <a href="{{ url('admin/addimage') }}">
                                <i class="fa fa-users"></i><span>Add Image Layout</span>
                             <span class="pull-right-container"></span>
                          </a>
                        </li>
                          <li>
                              <a href="{{ url('admin/add-video') }}">
                                <i class="fa fa-users"></i><span>Add Video Style</span>
                             <span class="pull-right-container"></span>
                          </a>
                        </li>
                          <li>
                              <a href="{{ url('admin/thumImg')}}">
                                <i class="fa fa-users"></i><span>Add Thumbnail Style</span>
                             <span class="pull-right-container"></span>
                          </a>
                        </li>
                        @endif
                   </ul>
                </section>
                
                <!-- /.sidebar -->
</aside>

        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>