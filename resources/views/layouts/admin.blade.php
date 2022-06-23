<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <title>Admin-Dashboard</title>
      <link rel="shortcut icon" href="{{asset('content/admin')}}/assets/images/favicon_1.ico">

      <link href="{{asset('content/admin')}}/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">

        <!-- Custom Files -->
        <link href="{{asset('content/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('content/admin')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('content/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('content/admin')}}/assets/css/coustom.css" rel="stylesheet" type="text/css" />

        @yield('couston_css')

        <script src="{{asset('content/admin')}}/assets/js/modernizr.min.js"></script>

   </head>
   <body class="fixed-left">
      <div id="wrapper">
         <div class="topbar">
            <div class="topbar-left">
               <div class="text-center"> <a href="{{ url('/dashboard') }}" class="logo"><i class="md md-terrain"></i>
                <span> Shorif </span></a> </div>
            </div>
            <nav class="navbar navbar-default">
               <div class="container-fluid">
                  <ul class="list-inline menu-left mb-0">
                     <li class="float-left"> <a href="#" class="button-menu-mobile open-left"> <i class="fa fa-bars"></i> </a> </li>
                     <li class="hide-phone float-left">
                        <form role="search" class="navbar-form"> <input type="text" placeholder="Type here for search..." class="form-control search-bar"> <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a> </form>
                     </li>
                  </ul>
                  <ul class="nav navbar-right float-right list-inline">
                     <li class="dropdown d-none d-sm-block">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"> <i class="md md-notifications"></i> <span class="badge badge-pill badge-xs badge-danger">3</span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                           <li class="text-center notifi-title">Notification</li>
                           <li class="list-group">
                              <a href="javascript:void(0);" class="list-group-item">
                                 <div class="media">
                                    <div class="media-left pr-2"> <em class="fa fa-user-plus fa-2x text-info"></em> </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading">New user registered</div>
                                       <p class="m-0"> <small>You have 10 unread messages</small> </p>
                                    </div>
                                 </div>
                              </a>

                              <a href="javascript:void(0);" class="list-group-item"> <small>See all notifications</small> </a>
                           </li>
                        </ul>
                     </li>
                     <li class="d-none d-sm-block"> <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a> </li>
                     <li class="d-none d-sm-block"> <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a> </li>
                     <li class="dropdown open">

                        <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                          @if (Auth::user()->image!='')
                            <img class="thumb-md rounded-circle"  src="{{ asset('upload/user/'.Auth::user()->image) }}">
                          @else
                             <img class="thumb-md rounded-circle" src="{{ asset('upload/avatar.jpg') }}">
                          @endif
                         </a>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                           <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                           <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                           <li><a href="{{ url('/logout') }}" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <div class="user-details">
                  <div class="pull-left">

                    @if (!empty(Auth::user()->image))
                    <img class="thumb-md rounded-circle"  src="{{ asset('upload/user/'.Auth::user()->image) }}">
                   @else
                     <img class="thumb-md rounded-circle" src="{{ asset('upload/avatar.jpg') }}">
                   @endif
                       {{-- <img src="{{asset('content/admin')}}/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle"> --}}
                     </div>
                  <div class="user-info">
                     <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} </a>
                        <ul class="dropdown-menu">
                           <li>
                              <a href="javascript:void(0)" class="dropdown-item">
                                 <i class="md md-face-unlock mr-2"></i> Profile
                                 <div class="ripple-wrapper"></div>
                              </a>
                           </li>
                           <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                           <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                           <li><a href="{{ url('/logout') }}" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                        </ul>
                     </div>
                     <p class="text-muted m-0">{{ Auth::user()->roleinfo->role_name }}</p>
                  </div>
               </div>
               <div id="sidebar-menu">
                  <ul>
                  <li> <a href="{{ url('/dashboard') }}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a> </li>
                  @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md-group"></i>
                            <span> User Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/user/add') }}">ADD User</a></li>
                        @endif
                           <li><a href="{{ url('/dashboard/user/all') }}">ALL User</a></li>
                         @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/user/restore') }}">Banned User</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif
                  @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class=" md-shopping-basket"></i>
                            <span> Product Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' )
                           <li><a href="{{url('dashboard/product/add')}}">ADD Product</a></li>
                        @endif
                           <li><a href="{{url('dashboard/product/all')}}">ALL Product</a></li>
                         @if(Auth::user()->role=='1' )
                           <li><a href="{{url('dashboard/product/restore')}}">Deleted Product</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif
                  @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class=" md-loyalty"></i>
                            <span> Brand Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/brand/add') }}">ADD Brand</a></li>
                        @endif
                           <li><a href="{{ url('/dashboard/brand/all') }}">ALL Brand</a></li>
                         @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/brand/restore') }}">Deleted Brand</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif

                  @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md-store-mall-directory"></i>
                            <span>Category Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' )
                           <li><a href="{{route('procategory.add') }}">ADD Category</a></li>
                        @endif
                           <li><a href="{{route('procategory.all') }}">ALL Category</a></li>
                         @if(Auth::user()->role=='1' )
                           <li><a href="{{route('procategory.restore') }}">Deleted Category</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif
                  @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class=" md-verified-user"></i>
                            <span> Partner Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/partner/add') }}">ADD Partner</a></li>
                        @endif
                           <li><a href="{{ url('/dashboard/partner/all') }}">ALL Partner</a></li>
                         @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/partner/restore') }}">Deleted Partner</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif

                  @if(Auth::user()->role=='1' || Auth::user()->role=='3' ||  Auth::user()->role=='4')
                  <li class="has_sub">
                     <a href="#" class="waves-effect"><i class=" md-loyalty"></i>
                         <span> Cupon Info </span>
                         <span class="pull-right"><i class="md md-add"></i></span>
                     </a>
                     <ul class="list-unstyled">
                     @if(Auth::user()->role=='1' || Auth::user()->role=='4')
                        <li><a href="{{ route('cupon.add') }}">ADD Cupon</a></li>
                     @endif

                        <li><a href="{{ route('cupon.all') }}">ALL Cupon</a></li>

                     @if(Auth::user()->role=='1' )
                        <li><a href="{{ route('cupon.restore') }}">Deleted Cupon</a></li>
                     @endif
                     </ul>
                  </li>
               @endif

                  @if(Auth::user()->role=='1' || Auth::user()->role=='3' ||  Auth::user()->role=='4')
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class=" md-mms"></i>
                            <span> Banner Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                        @if(Auth::user()->role=='1' || Auth::user()->role=='4')
                           <li><a href="{{ url('/dashboard/banner/add') }}">ADD Banner</a></li>
                        @endif

                           <li><a href="{{ url('/dashboard/banner/all') }}">ALL Banner</a></li>

                        @if(Auth::user()->role=='1' )
                           <li><a href="{{ url('/dashboard/banner/restore') }}">Deleted Banner</a></li>
                        @endif
                        </ul>
                     </li>
                  @endif

                  @if(Auth::user()->role=='1' )
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="  md-settings"></i>
                            <span> Manage </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                           <li><a href="{{ route('manage.basic.show') }}">Basic Info</a></li>
                           <li><a href="{{ route('manage.contact.show') }}">Contact Info</a></li>
                           <li><a href="{{ route('manage.social.show') }}">Social Media</a></li>
                        </ul>
                     </li>
                  @endif

                  @if(Auth::user()->role=='1' )
                     <li class="has_sub">
                        <a href="#" class="waves-effect"><i class=" md-account-balance"></i>
                            <span> Role Info </span>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul class="list-unstyled">
                           <li><a href="{{ url('/dashboard/role/add') }}">ADD Role</a></li>
                           <li><a href="{{ url('/dashboard/role/all') }}">ALL Role</a></li>
                        </ul>
                     </li>
                  @endif
                    <li>
                        <a href="{{ url('dashboard/recycle') }}" class="waves-effect"><i class="md-delete"></i>
                            <span> Recycle Bin </span>
                        </a>
                    </li>
                     <li>
                         <a href="{{ url('/') }}" class="waves-effect"><i class="md-public"></i>
                            <span> Live Site </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}" class="waves-effect"><i class=" md-exit-to-app"></i>
                           <span> Log Out </span>
                       </a>
                   </li>

                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <div class="content-page">
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                           <li><a href="#">Admin-Panel</a></li>
                           <li class="active">Dashboard</li>
                        </ol>
                     </div>
                  </div>

                  @yield('content')


               </div>
            </div>
            <footer class="footer"> 2016 - 2022 © Shorif Uddin. </footer>
         </div>

      </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('content/admin')}}/assets/js/jquery.min.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/detect.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/fastclick.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/jquery.blockUI.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/waves.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/wow.min.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/jquery.nicescroll.js"></script>
        <script src="{{asset('content/admin')}}/assets/js/jquery.scrollTo.min.js"></script>

        <!-- jQuery -->
        <script src="{{asset('content/admin')}}/plugins/moment/moment.min.js"></script>

        <!-- Counter js  -->
        <script src="{{asset('content/admin')}}/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="{{asset('content/admin')}}/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- sweet alerts -->
        <script src="{{asset('content/admin')}}/plugins/sweetalert2/sweetalert2.js"></script>

        <!-- flot Chart -->
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="{{asset('content/admin')}}/plugins/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Todoapp -->
        <script src="{{asset('content/admin')}}/assets/pages/jquery.todo.js"></script>

        <!-- jQuery  -->
        <script src="{{asset('content/admin')}}/assets/pages/jquery.chat.js"></script>

        <!-- Dashboard js  -->
        <script src="{{asset('content/admin')}}/assets/pages/jquery.dashboard.js"></script>

        <!-- App js  -->
        <script src="{{asset('content/admin')}}/assets/js/jquery.app.js"></script>

        @yield('couston_jquery')

        <script>
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });

        </script>
   </body>
</html>
