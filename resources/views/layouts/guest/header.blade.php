<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ isset($title) ? $title : 'Title' }}</title>

  {{-- <link rel="icon" type="image/x-icon" href="{{ asset('img/unj_logo.png') }}"> --}}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/admin') }}/dist/css/adminlte.min.css">
  {{-- MOST USED CSS --}}
  {{-- SweetAlert --}}
  <link rel="stylesheet" href="{{ asset('template/admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  @yield('third_party_stylesheets')
  @stack('page_css')
</head>
