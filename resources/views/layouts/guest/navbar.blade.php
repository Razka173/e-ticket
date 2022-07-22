{{-- BEGIN NAVBAR --}}
<nav class="main-header navbar navbar-expand navbar-light navbar-white">
  <div class="container">
    <a href="{{ url('/') }}" class="navbar-brand">
      <img src="{{ asset('img/unj_logo.png') }}" alt="TiketIn Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
      {{-- <span class="brand-text font-weight-light">{{ config('app.name') }}</span> --}}
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-2" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contacs us</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
        </li>
      </ul>
    </div>

    {{-- BEGIN RIGHT NAVBAR --}}
    {{-- <ul class="order-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->nim }}</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="#" class="dropdown-item">Profile </a></li>
          <li><a href="#" class="dropdown-item">Setting</a></li>
          <li class="dropdown-divider"></li>
          <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a></li>
          <form id="logout-form" action="#" method="POST" class="d-none">
            @csrf
          </form>
        </ul>
      </li>
    </ul> --}}
    {{-- END RIGHT NAVBAR --}}
  </div>
</nav>
{{-- END NAVBAR --}}
