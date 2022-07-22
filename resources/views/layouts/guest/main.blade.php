<!DOCTYPE html>
<html lang="en">
@include('layouts.guest.header')

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    @include('layouts.guest.navbar')

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
    @include('layouts.guest.footer')
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

  @yield('third_party_scripts')
  @stack('page_scripts')
</body>

</html>
