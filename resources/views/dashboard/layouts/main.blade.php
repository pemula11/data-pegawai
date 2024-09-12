

<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.png">

<title>
 @yield('title')
</title>



<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->



<link id="pagestyle" href="{{asset('/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />


<!-- plugin css for this page -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.jqueryui.min.css" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.jqueryui.min.js"></script>

@yield('plugin')

<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
@yield('header')

  </head>


  <body class="g-sidenav-show  bg-gray-100">
    

    

<!-- Sidebar -->
@include('dashboard.layouts.sidebar')
@include('dashboard.layouts.header')

<!-- Navbar -->

     

<!-- End Navbar -->


        


<div class="container-fluid py-4">
 
    @yield('content')
    
</div>

      
      













<!--   Core JS Files   -->
<script src="{{asset('/js/core/popper.min.js')}}" ></script>
<script src="{{asset('/js/core/bootstrap.min.js')}}" ></script>
<script src="{{asset('/js/plugins/perfect-scrollbar.min.js')}}" ></script>
<script src="{{asset('/js/plugins/smooth-scrollbar.min.js')}}" ></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="{{asset('/js/material-dashboard.min.js?v=3.1.0')}}"></script>
  </body>

</html>
