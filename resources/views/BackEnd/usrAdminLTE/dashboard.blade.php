<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>( )Softer. | Dashboard</title>

  @include('BackEnd.usrAdminLTE.headincs')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hello  test</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
 
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <style>
    .table-hover:hover{
      cursor: pointer;
    }
    p{
      font-weight: 600;
    }
    .profile-user-img {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }
    ul .nav-tabs li .active{
      background: #3c8dbc;
    }
    body{
/*      overflow: hidden;
*/    }
    section{
     /* height: 100vh;*/
    }
  </style>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>ome</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Back</b> to Home</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="/storage/profile_img/{{$usr->profile_img}}" class="user-image" alt="User Image"> -->

              <span class="hidden-xs">Welcome, {{$usr->firstname}} {{$usr->lastname}}</span>
              <i class="fa fa-angle-down"></i>
            </a>
            
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/storage/profile_img/{{$usr->profile_img}}" class="img-circle" alt="User Image">

                <p>
                  {{$usr->firstname}} - {{$usr->usertype}}
                  <small>Member since <?php echo date("m-Y",strtotime($usr->created_at))?></small>
                  <a href="/users/{{$usr->id}}/edit" class="btn btn-primary" style="margin-top: 6px">Edit Profile</a>
                </p>
                
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div style="position: relative; left: 35%">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/storage/profile_img/{{$usr->profile_img}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="margin: 10px auto;">
          <p>{{$usr->firstname}}</p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        
        <li class="treeview">
          <a href="/projects">
            <i class="fa fa-archive"></i>
            <span>My Projects</span>
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="/events/create"><i class="fa fa-circle-o"></i>Project</a></li>
            <li><a href="/events"><i class="fa fa-circle-o"></i> View Events</a></li>
          </ul> -->
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- /.search form -->
      
      @include('BackEnd.usrAdminLTE.msgs')
      @yield('content')
    </section>
    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://usrAdminLTE.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="BackEnd/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="BackEnd/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/BackEnd/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/BackEnd/bower_components/raphael/raphael.min.js"></script>
<script src="/BackEnd/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/BackEnd/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/BackEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/BackEnd/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/BackEnd/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/BackEnd/bower_components/moment/min/moment.min.js"></script>
<script src="/BackEnd/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/BackEnd/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/BackEnd/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/BackEnd/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/BackEnd/bower_components/fastclick/lib/fastclick.js"></script>
<!-- usrAdminLTE App -->
<script src="/BackEnd/dist/js/usrAdminLTE.min.js"></script>
<!-- usrAdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/BackEnd/dist/js/pages/dashboard.js"></script>
<!-- usrAdminLTE for demo purposes -->
<script src="/BackEnd/dist/js/demo.js"></script>
<!-- Data Table -->
<script src="/BackEnd/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/BackEnd/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ckeditor -->
<!-- <script src="/BackEnd/bower_components/ckeditor/ckeditor.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
 --><script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
 <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="/ckeditor/ckeditor.js"></script>
<!-- <script src={{asset('ckeditor/ckeditor.js')}}></script>
 --><!-- <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script -->

<script>
  $(document).ready( function () {
    CKEDITOR.replace( 'editor1' );

    $('#myTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    Dropzone.options.imageUpload = {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
      };

      
    

  });
</script>
</body>
</html>
