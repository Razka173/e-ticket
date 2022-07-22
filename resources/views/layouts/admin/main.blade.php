<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.header')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('template/admin') }}/dist/img/AdminLTELogo.png" alt="{{ env('APP_NAME') }}" width="120">
      <h2 class="brand-text font-weight-light">{{ env('APP_NAME') }}</h2>
    </div>

    @include('layouts.admin.navbar')
    @include('layouts.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        @yield('content-header')
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        @yield('content')
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.admin.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('template/admin') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('template/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template/admin') }}/dist/js/adminlte.min.js"></script>
  {{-- MOST USED JS --}}
  {{-- SweetAlert2 --}}
  <script src="{{ asset('template/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

  {{-- Laravel Mix --}}
  {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

  @yield('third_party_scripts')
  @stack('page_scripts')
  <script>
    $(window).on("load", function() {
      $(".loader-wrapper").fadeOut("slow");
    })
  </script>
</body>

</html>
