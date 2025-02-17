<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
       .sidebar {
    width: 250px;
    height: 100vh;
    background-color: #343a40;
    position: fixed;
    top: 0;
    left: -250px;
    transition: left 0.3s;
}

.sidebar a {
    display: block;
    padding: 10px;
    color: white;
    text-decoration: none;
}

.sidebar a.active {
    background-color: #495057;
    border-radius: 5px;
}

.sidebar a:hover {
    background-color: #6c757d;
    border-radius: 5px;
}


        .content {
            margin-left: 260px;
            padding: 20px;
        }

        /* Tampilkan sidebar di mode desktop */
@media (min-width: 768px) {
    .sidebar {
        left: 0 !important;
    }
}
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark p-2">
    <button id="toggleSidebar" class="btn btn-light d-md-none">☰</button>
</nav>

<div id="sidebar" class="sidebar bg-dark text-white vh-100 p-3 d-none d-md-block position-fixed" style="width: 250px; left: 0; transition: left 0.3s;">
    <h4 class="text-center">Admin</h4>
    <hr>
    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('admin.order') }}" class="nav-link text-white {{ request()->is('admin/dashboard/order') ? 'active' : '' }}">Orderan</a>
   
    <a href="{{ route('logout') }}" class="nav-link text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

    <div class="content">
        @yield('content')
    </div>

</body>
<script>
      document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleSidebar");

        toggleButton.addEventListener("click", function () {
            if (sidebar.style.left === "0px") {
                sidebar.style.left = "-250px"; // Tutup sidebar
            } else {
                sidebar.style.left = "0px"; // Buka sidebar
            }
        });
    });
</script>
</html>