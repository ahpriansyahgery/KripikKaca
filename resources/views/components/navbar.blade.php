<header id="header" class="header d-flex align-items-center sticky-top">
    <div
      class="container position-relative d-flex align-items-center justify-content-between"
    >
      <a
        href="{{ route('welcome') }}"
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
          
            <li >
              <a href="{{ route('cart.view') }}" class="text-align-center"  >
               <button type="button" class="btn btn-success" >Keranjang</button>
            </a>
             
            </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @auth
      <div class="d-flex user-logged nav-item dropdown no-arrow">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
          Halo, {{ Auth::user()->name }} !
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right:0; left:auto"  >
           
            <li>
              <a href="{{ route('dashboard') }}" class="dropdown-item" > Dashboard </a>
            </li>
            <li>
              <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" > Logout </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}"  >
              </form>
            </li>
          </ul>
        </a>
      </div>
        @else
        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
      @endauth
     
    </div>
  </header>
