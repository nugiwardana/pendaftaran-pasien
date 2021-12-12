<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Pendaftaran Pasien</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  {{ ($active === 'home') ? 'active' : '' }}" href="/">Halaman Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ ($active === 'pendaftaran') ? 'active' : '' }}" href="/pendaftaran">Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ ($active === 'about') ? 'active' : '' }}" href="/about">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === 'login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>