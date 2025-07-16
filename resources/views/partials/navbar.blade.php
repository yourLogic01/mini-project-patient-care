<nav id="navbarExample" class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container">
        <!-- Image Logo -->
        <a class="navbar-brand" href="/"> {{ config('app.name') }}<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsService"
            aria-controls="navbarsService" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsService">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item ">
                    <a class="nav-link" href="#patient">Patient</a>
                </li>
                <li class="nav-item  ">
                    {{-- {{ request()->routeIs('post') ? 'active' : '' }} --}}
                    <a class="nav-link" href="#">Daftar Kunjungan</a>
                </li>
                <li class="nav-item "><a class="nav-link" href="#">History</a>
                </li>
        </div>
    </div>
</nav>
