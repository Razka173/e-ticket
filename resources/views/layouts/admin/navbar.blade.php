  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light elevation-1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        @if (Auth::user()->role == 'admin')
          <a href="{{ url('/admin/check-in') }}" class="nav-link">Home</a>
        @endif
        @if (Auth::user()->role == 'unit')
          <a href="{{ url('/admin/check-in') }}" class="nav-link">Home</a>
        @endif
        @if (Auth::user()->role == 'superadmin')
          <a href="{{ url('/admin/check-in') }}" class="nav-link">Home</a>
        @endif
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="@if (Route::has('admin.profile')) {{ route('admin.profile') }} @else # @endif" class="dropdown-item">Profile </a></li>
          {{-- <li><a href="#" class="dropdown-item">Setting</a></li> --}}
          <li class="dropdown-divider"></li>
          <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
