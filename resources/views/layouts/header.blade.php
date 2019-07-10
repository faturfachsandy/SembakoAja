<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>@yield('title')</title>
    <!-- Css Files -->
    <link href="{{asset('css/root.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Start Page Loading -->
    <div class="loading"><img src="{{asset('img/loading.gif')}}" alt="loading-img"></div>
    <!-- End Page Loading --> 
    <!-- Start Top -->
    <div id="top" class="clearfix"> 
        <!-- Start App Logo -->
        <div class="applogo"> <a href="{{ url('/home') }}" class="logo">Gusem</a> </div>
        <!-- End App Logo --> 
        <!-- Start Sidebar Show Hide Button --> 
        <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a> <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a> 
        <!-- End Sidebar Show Hide Button --> 
        <!-- Start Searchbox -->
        <!-- <form class="searchform">
            <input type="text" class="searchbox" id="searchbox" placeholder="Search for something...">
            <span class="searchbutton"><i class="fa fa-search"></i></span>
        </form> -->
        <!-- End Searchbox --> 
        <!-- Start Sidepanel Show-Hide Button --> 
        <!-- <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a> --> 
        <!-- End Sidepanel Show-Hide Button --> 
        <!-- Start Top Right -->
        <ul class="top-right">
            <li class="dropdown link"> <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><b>{{ Auth::user()->name }}</b><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                    <li role="presentation" class="dropdown-header">Profile</li>
                    <li><a href="{{ route('editpetugas', Auth::user()->id) }}"><i class="fa falist fa-gear"></i> Setting</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa falist fa-power-off"></i>Logout</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                     </li>
                </ul>
            </li>
        </ul>
        <!-- End Top Right --> 
                        </div>
                        <!-- End Top --> 
                        <!-- Start Sidabar -->
                        <div class="sidebar clearfix">
                            <ul class="sidebar-panel nav metismenu" id="side-menu" data-plugin="metismenu">
                                <li class="active"><a href="{{ url('/home') }}"><span class="icon color5"><i class="fa fa-home" aria-hidden="true"></i></span><span class="nav-title">Home</span></a>
                                </li>
                                <li class="sidetitle">MASTER DATA</li>
                                <li class="active"><a href="{{ route('petugas') }}"><span class="icon color5"><i class="fa fa-user" aria-hidden="true"></i></span><span class="nav-title"> Data User</span></a>
                                <li class="active"><a href="{{ route('jenis.index') }}"><span class="icon color5"><i class="fa fa-cube" aria-hidden="true"></i></span><span class="nav-title"> Data Jenis Sembako</span></a>
                                <li class="active"><a href="{{ route('barang.index') }}"><span class="icon color5"><i class="fa fa-cubes" aria-hidden="true"></i></span><span class="nav-title"> Data Sembako</span></a>
                                <li class="sidetitle">FEATURES</li>
                                <li class="active"><a href="{{ route('barangmasuk') }}"><span class="icon color5"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="nav-title"> Barang Masuk</span></a>
                                <li class="active"><a href="{{ route('barangkeluar') }}"><span class="icon color5"><i class="fa fa-minus" aria-hidden="true"></i></span><span class="nav-title"> Barang Keluar</span></a>
                                <li class="sidetitle">REPORT</li>
                                <li><a href="#"><span class="icon color9"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Cetak <i class="fa fa-sort-desc caret"></i></a>
                                    <ul>
                                        <li><a href="{{route('cetaksem')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Cetak Data Sembako</a></li>
                                        <li><a href="{{route('cetakbar')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Cetak Data Barang</a></li>
                                        <li><a href="{{route('cetakmas')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Cetak Barang Masuk</a></li>
                                        <li><a href="{{route('cetakkel')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Cetak Barang Keluar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- End Sidabar --> 
                        <!-- Start Content -->
    <div class="content"> 
    <!-- Start Container -->
    @yield('content')
    <br>
    <!-- End Container --> 
    <!-- Start Footer -->
    <div class="row footer">
        <div class="col-md-6 text-left"> Copyright &copy; Nokanel 2018. </div>
        <div class="col-md-6 text-right"> Desain dan Dikembangkan oleh Faturrahman F. </div>
    </div>
    <!-- End Footer --> 
</div>
<!-- End Content --> 
<!-- Start Sidepanel -->
<!-- End Sidepanel -->
@stack('style')
<!-- jQuery Library --> 
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> 
<!-- Bootstrap Core JavaScript File --> 
<script type="text/javascript" src="{{asset('js/bootstrap/dist/js/popper.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Plugin.js - Some Specific JS codes for Plugin Settings --> 
<script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
<!-- Bootstrap Toggle --> 
<script type="text/javascript" src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<!-- Bootstrap Select --> 
<script type="text/javascript" src="{{asset('js/bootstrap-select/bootstrap-select.js')}}"></script>
<!-- Jvectormap --> 
<script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script><!-- main file -->
<script type="text/javascript" src="{{asset('js/jvectormap/jvectormap-plugin.js')}}"></script><!-- demo codes --> 
<!-- C3 --> 
<script type="text/javascript" src="{{asset('js/c3/d3.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/c3/c3.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/c3/c3-plugin.js')}}"></script><!-- demo codes --> 
<!-- Peity Charts --> 
<script type="text/javascript" src="{{asset('js/peity/jquery.peity.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/peity/peity-plugin.js')}}"></script><!-- demo codes --> 
<!-- Data Tables --> 
<script src="{{asset('js/datatables/datatables.min.js')}}"></script> 
<!-- Sweet Alert --> 
<script src="{{asset('js/sweet-alert/sweet-alert.min.js')}}"></script> 
<!-- jQuery UI --> 
<script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- MetisMenu --> 
<script type="text/javascript" src="{{asset('js/metismenu/metisMenu.min.js')}}"></script>
<!-- Bootstrap Date Range Picker --> 
<script type="text/javascript" src="{{asset('js/date-range-picker/daterangepicker.js')}}"></script>
<!-- Flot Chart --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-time.js')}}"></script><!-- time.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-stack.js')}}"></script><!-- stack.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-pie.js')}}"></script><!-- pie.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-plugin.js')}}"></script><!-- demo codes --> 
<!-- Chartist --> 
<script type="text/javascript" src="{{asset('js/chartist/chartist.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/chartist/chartist-plugin.js')}}"></script><!-- demo codes --> 
<!-- Counterup -->
<script type="text/javascript" src="{{asset('js/counterup/jquery.waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/counterup/jquery.counterup.min.js')}}"></script>
</body>
</html>