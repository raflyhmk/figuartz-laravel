<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent mt-2">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img
            src="{{url ('assets/user/image/logo.png')}}"
            alt="Logo"
            class="d-inline-block align-text-top"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        @guest
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-nav mx-auto">
            <a class="nav-link me-4" href="/">Home</a>
            <a class="nav-link me-4" href="/products">Products</a>
            <a class="nav-link me-4" href="/reviews">Reviews</a>
            <a class="nav-link me-4" href="/about-us">about us</a>
          </div>
          <button class="btn btn-login my-2 my-sm-0" type="button"
                  onclick="event.preventDefault(); location.href='{{ url('login') }}';">
            Login
          </button>
        </div>
        @endguest

        @auth('web')
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-nav mx-auto">
            <a class="nav-link me-4" href="/">Home</a>
            <a class="nav-link me-4" href="/products">Products</a>
            <a class="nav-link me-4" href="/reviews">Reviews</a>
            <a class="nav-link me-4" href="/about-us">about us</a>
          </div>
        <div class="btn-group">
        <button type="button" class="btn btn-primary btn-login dropdown-toggle pe-2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
          <i class="fa-solid fa-user fa-lg me-2"></i>
          {{Auth::user()->name}}
        </button>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
          <li><button class="dropdown-item" type="button" onclick="event.preventDefault(); location.href='{{ url('history') }}';">pesanan saya</button></li>
          <li><button class="dropdown-item" type="button" onclick="event.preventDefault(); location.href='{{ url('logout') }}';">Keluar</button></li>
        </ul>
      </div>
        @endauth
        </div>
      </div>
    </nav>
    <!-- end navbar -->