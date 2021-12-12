<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pasien*') ? 'active' : '' }}" href="/dashboard/pasien">
                    <span data-feather="file-text"></span>
                    Data Pasien
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/dokter*') ? 'active' : '' }}" href="/dashboard/dokter">
                    <span data-feather="file-text"></span>
                    Data Dokter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/poliklinik*') ? 'active' : '' }}" href="/dashboard/poliklinik">
                    <span data-feather="file-text"></span>
                    Data Poliklinik
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
                    <span data-feather="file-text"></span>
                    Data Users
                </a>
            </li> -->
        </ul>

        <!-- @can('admin')
        <h6 class="sidebar-heading d-flex justify-cintent-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <span data-feather="grid"></span>
                    Post Categories
                </a>
            </li>
        </ul>
        @endcan -->
    </div>
</nav>