<header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <button type="button" class="sidebar-toggle btn btn-link p-0 mr-3" onclick="if (window.history.length > 1) { window.history.back(); } else { window.location.href='{{ url('/admin') }}'; }" title="Back">
          <i class="fa fa-long-arrow-left"></i>
        </button>
        <a href="{{ url('/admin') }}" class="navbar-brand m-0">
          <span class="brand-text text-uppercase"><strong>NEXT CRUMB ADMIN PANEL</strong></span>
        </a>
      </div>

      <div class="ml-auto">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </nav>
</header>
