<nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
    <div class="d-flex align-items-center me-auto">
        <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Menu</h2>
    </div>
    <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
            <i class="fas fa-user fa-fw me-3"></i> Pengaturan Akun
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-3"></i> Setting</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-3"></i> Logout</a></li>
        </ul>
    </div>
</nav>
