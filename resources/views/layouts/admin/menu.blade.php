<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    {{-- Dashboard unit --}}
    <li class="nav-item">
      <a href="@if (Route::has('admin.check')) {{ route('admin.check') }} @else # @endif" class="nav-link {{ $active == 'check-in' ? 'active' : '' }}">
        <i class="nav-icon fas fa-check"></i>
        <p>Check In</p>
      </a>
    </li>
    {{-- End Dashboard unit --}}
    {{-- Hasil Kuesioner --}}
    <li class="nav-item">
      <a href="@if (Route::has('admin.ticket.index')) {{ route('admin.ticket.index') }} @else # @endif" class="nav-link {{ $active == 'ticket' ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Daftar Pengunjung</p>
      </a>
    </li>
    {{-- End Hasil Kuesioner --}}
    {{-- BEGIN FILE --}}
    <li class="nav-item">
      <a href="@if (Route::has('admin.guest.report')) {{ route('admin.guest.report') }} @else # @endif" class="nav-link {{ $active == 'file' ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Report</p>
      </a>
    </li>
    {{-- END FILE --}}

    <li class="nav-item">
      <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fa fa-sign-out"></i>
        <p>
          Logout
        </p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
