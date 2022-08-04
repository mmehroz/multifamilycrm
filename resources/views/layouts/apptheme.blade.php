<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="CRM" />
    <meta name="viewport" content="CRM"/>
    <meta name="keywords" content="Multi Family CRM"/>
    <meta name="description"content="Multi Family CRM"/>
    <meta name="robots" content="noindex,nofollow" />
    <title>Multi Family CRM</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('public/assets/images/favicon.png') !!}"/>
    <link href="{!! asset('public/assets/libs/flot/css/float-chart.css') !!}" rel="stylesheet" />
    <link href="{!! asset('public/assets/dist/css/style.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="{!! asset('public/assets/libs/jquery/dist/jquery.min.js') !!}"></script>
  </head>
@if(session()->get('email'))
<body>
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
  </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <a class=" nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <figure>
                <img src="{!! asset('public/userimage/') !!}/{{session()->get('image')}}" alt="user" class="rounded-circle"/>  
                 <caption><p class ="profile-name">{{session()->get('name')}}</p></caption>
               </figure>
              
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <div class="user-card">
                  <div class="user-avatar">
                       <div class="status dot dot-lg dot-success"></div>
                       <img src="{!! asset('public/userimage/') !!}/{{session()->get('image')}}" class="rounded-circle" width="55px" height="55px">  
                  </div>
                  <div class="user-info">
                      <span class="lead-text" style="color: black;">{{session()->get('name')}}</span>
                      <a href="{{url('/viewprofile')}}/{{session()->get('id')}}"><span>View Profile</span></a>
                  </div>
              </div>
              <li class="new-nn">
                <a href="{{url('/logout')}}"> <i class="fa fa-power-off" aria-hidden="true"></i>
 <span class="lead-text" style="color:#E28132;">Log Out</span> </a> 
              </li>
              </ul>
            </li>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
          </div>
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-menu font-24"></i>
                </a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{!! asset('public/assets/images/logo.svg') !!}" alt="">
                </a>
              </li>
            </ul>
            <ul class="navbar-nav float-end">
              <li class="nav-item dropdown">
                <a class="nav-link bell-icons dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{!! asset('public/assets/images/ico-bell.svg') !!}" alt="">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="dropdown-head" id="markAllRead"><span class="sub-title nk-dropdown-title">Notifications</span></div>
                <div class="dropdown-body">
                <div class="nk-notification"><a href="#" class="markRead">
                <div class="nk-notification-item dropdown-inner ">
            <div class="nk-notification-icon"><span class="user-avatar icon icon-circle bg-primary"><div class="status dot dot-lg dot-gray"></div></span></div>
            <div class="nk-notification-content">
                <div class="nk-notification-text ">Test Notification</div>
                <div class="nk-notification-time">5 months ago</div>
                <span class="notifyId" hidden="">1cd8c9ee-9c2a-45f0-9da4-b2182397f2c7</span>
            </div>
            </div>
           </a>         
           </div>
            </div>
              <div class="dropdown-foot center"> <a href="#">Mark All as Read</a> <a href="#">View All</a></div>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" >
                 <img src="{!! asset('public/assets/images/ico-chat.svg') !!}" alt="">
                </a>
             
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- sidebar start -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <div class="scroll-sidebar">
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                @if(session()->get('role_id') == 1)
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/admindashboard')}}" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
                @elseif(session()->get('role_id') == 2)
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/clientdashboard')}}" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
                @else
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/vadashboard')}}" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
                @endif
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/investerlist')}}" aria-expanded="false">
                 <img src="{!! asset('public/assets/images/ico-Investors.svg') !!}" alt="investor"> &nbsp; <span class="hide-menu">INVESTORS</span></a>
              </li>
              <li class="sidebar-item">
             @if(session()->get('role_id') == 1)
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/propertylist')}}" aria-expanded="false">
                <img src="{!! asset('public/assets/images/ico-Owners.svg') !!}" alt="Owners"> &nbsp;
                <span class="hide-menu">PROPERTIES</span>
            </a>
            @else
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/propertyboard')}}" aria-expanded="false">
                <img src="{!! asset('public/assets/images/ico-Owners.svg') !!}" alt="Owners"> &nbsp;
                <span class="hide-menu">PROPERTIES</span>
            </a>
            @endif
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/brokerlist')}}" aria-expanded="false">
                    <img src="{!! asset('public/assets/images/ico-Brokers.svg') !!}" alt="Owners">  &nbsp;
                    <span class="hide-menu">BROKERS</span>
                </a>
              </li>
              <li class="sidebar-item">
                @if(session()->get('role_id') == 1)
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/adminresources')}}" aria-expanded="false">
                 <img src="{!! asset('public/assets/images/ico-tools.svg') !!}" alt="Owners"> &nbsp; 
                 <span class="hide-menu">RESOURCES</span>
                </a>
                @elseif(session()->get('role_id') == 2)
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/clientresources')}}" aria-expanded="false">
                 <img src="{!! asset('public/assets/images/ico-tools.svg') !!}" alt="Owners"> &nbsp; 
                 <span class="hide-menu">RESOURCES</span>
                </a>
                @else
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL('/varesources')}}" aria-expanded="false">
                 <img src="{!! asset('public/assets/images/ico-tools.svg') !!}" alt="Owners"> &nbsp; 
                 <span class="hide-menu">RESOURCES</span>
                </a>
                @endif
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!-- sidebar end -->
      <!-- page content start -->
      @endif
      @yield('appcontent')
      <!-- page content end -->
      <!-- footer start -->
  </body>
   <footer>
    <p>copyright © <?php echo(date('Y'));?> All Rights Reserved</p>
    <script src="{!! asset('public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! asset('public/assets/extra-libs/sparkline/sparkline.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/waves.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/sidebarmenu.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/custom.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/excanvas.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.pie.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.time.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.stack.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.crosshair.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/pages/chart/chart-page-init.js') !!}"></script> 
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   </footer> 
</html>
<!-- footer end -->
<script>
$(document).ready(function() {
  var table = $('#crm').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true
  });
});
</script>