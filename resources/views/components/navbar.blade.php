<header id="header" class="header d-flex align-items-center sticky-top">
    <div
      class="container position-relative d-flex align-items-center justify-content-between"
    >
      <a
        href="index.html"
        class="logo d-flex align-items-center me-auto me-xl-0"
      >
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ asset('user/assets/img/logo.png') }}" alt=""> 
       
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
            <a href="{{ route('welcome') }}" class="{{ request()->is('/') ? 'active' : '' }}" >Home<br /></a>
          </li>
          <li><a href="#about">About</a></li>
          <li  ><a class="{{ request()->is('menu.index') ? 'active' : '' }}" href="{{ route('menu.index') }}">Menu</a></li>

          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#book-a-table">Login</a>
    </div>
  </header>
