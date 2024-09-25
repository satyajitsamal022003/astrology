<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Panel</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/assets/img/favicon.png?=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/all.min.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/morris/morris.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css?=1">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="{{url('/')}}/assets/js/jquery-3.2.1.min.js"></script>
</head>

<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Header -->
    <div class="header">
        <!-- Logo -->
        <div class="header-left">
            <a href="#" class="logo">
                <img src="{{url('/')}}/assets/img/logo.png?=1" alt="Logo">
            </a>
            <a href="#" class="logo logo-small">
                <img src="{{url('/')}}/assets/img/small-logo.png" alt="Logo">
            </a>
        </div>
        <!-- /Logo -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fa-solid fa-bars-sort"></i>
        </a>
        <!-- /Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Header Right Menu -->
        <ul class="nav user-menu">
            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img">
                  <img class="rounded-circle" src="{{url('/')}}/assets/img/small-logo.png"
                       width="30" alt="Logo"><span class="auth_name">Effective Gems</span>
                  </span>
                </a>
                <div class="dropdown-menu">
                    <a href="profile.html" class="dropdown-item"><i class="fa-solid fa-user"></i> Profile</a>
                    <a href="change-password.html" class="dropdown-item"><i class="fa-solid fa-key"></i> Change Password</a>
                    <a href="#" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </div>
            </li>
            <!-- /User Menu -->
        </ul>
        <!-- /Header Right Menu -->
    </div>
    @include('admin.menu')
    <!-- Page Wrapper -->
    @yield('content')
    <!-- /Page Wrapper -->
</div>


<!-- Bootstrap Core JS -->
<script src="{{url('/')}}/assets/js/popper.min.js"></script>
<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
<!-- Slimscroll JS -->
<script src="{{url('/')}}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Datatables JS -->
<script src="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/assets/plugins/datatables/datatables.min.js"></script>
<script src="{{url('/')}}/assets/plugins/raphael/raphael.min.js"></script>
<script src="{{url('/')}}/assets/plugins/morris/morris.min.js"></script>
<script src="{{url('/')}}/assets/js/chart.morris.js"></script>
<!-- Custom JS -->
<script src="{{url('/')}}/assets/js/script.js"></script>

</body>
</html>