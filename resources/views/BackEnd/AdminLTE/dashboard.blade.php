<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>( )Softer. | Dashboard</title>

  @include('BackEnd.usrAdminLTE.headincs')

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  
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
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="app-side-mini-toggler">
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
          <p>{{$usr->firstname}} {{$usr->lastname}}</p>
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

        @if($usr->usertype == 'admin')
          <li class="nav-item has-treeview">
            <a href="#">
              <i class="fa fa-user-o"></i>
              <span>Users</span>
              <span class="pull-right-container">
               <!--  <span class="label label-primary pull-right"> -->
                  <i class="fa fa-angle-right pull-left"></i>
                <!-- </span> -->
              </span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="/users/create"><i class="fa fa-circle-o"></i>Add User</a></li>
              <li class="nav-item"><a href="/users"><i class="fa fa-circle-o"></i>View Users</a></li>
            </ul>
          </li>
        @endif

        @if($usr->usertype == 'developer')
          <li class="nav-item has-treeview">
            <a href="#">
              <i class="fa fa-archive"></i>
              <span>Projects</span>
              <span class="pull-right-container">
               <!--  <span class="label label-primary pull-right"> -->
                  <i class="fa fa-angle-right pull-left"></i>
                <!-- </span> -->
              </span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="/projects"><i class="fa fa-circle-o"></i>View Projects</a></li>
              <li class="nav-item"><a href="/myprojects"><i class="fa fa-circle-o"></i>My Projects</a></li>
            </ul>
          </li>
        @endif

        @if($usr->usertype == 'maintenance')
          <li class="nav-item has-treeview">
            <a href="#">
              <i class="fa fa-file-o"></i> <span>Program Examples</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="nav nav-treeview">
              <li><a href="/example/create"><i class="fa fa-circle-o"></i>Add Example</a></li>
              <li><a href="/example"><i class="fa fa-circle-o"></i>View Examples</a></li>
            </ul>
          </li>
        @endif

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>CMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/cms/survey"><i class="fa fa-circle-o"></i>Survey Reports</a></li>
            <li><a href="/cms/aboutus"><i class="fa fa-circle-o"></i>About Us</a></li>
            <li><a href="/cms/partners"><i class="fa fa-circle-o"></i>Project Partners</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @if($usr->usertype == 'developer')
        @if($reports)
          <div class="box box-primary">
            @foreach ($reports as $report)
              <div class="form-group">
                <h3>{{$report->report_type}} Report:</h3>
                <p>Project Name: {{$report->project_name}}</p>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <div class="container">
                    {{ $report->report }}
                  </div>
                </div>
                {!!Form::open(['action' => ['ReportsController@update', $report->id], 'method' => 'PUT'])
                !!}
                  {{Form::hidden('_method','PUT')}}
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="id" value="{{$report->id}}">
                  <input type="submit" value="&#xf00c" class="fa fa-check btn btn-success pull-right">
                {!!Form::close() !!}
                <!-- <i class="fa fa-check btn btn-success pull-right"></i> -->
              </div>
            @endforeach
            <nav style="margin-left: 45%;">
              {{ $reports->links() }}
            </nav>
          </div>
        @endif
      @endif
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
<script src="/BackEnd/bower_components/ckeditor/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script>
  $(document).ready( function () {
    CKEDITOR.replace( 'article-ckeditor' );

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
