<div class="container-fluid position-relative p-0">
    <!-- Navbar Start -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0">ERP</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#solutions" class="nav-item nav-link">Solutions</a>
                <a href="#pricing" class="nav-item nav-link">Pricing</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                <!-- Blade navigation links -->
                @auth
                    <li class="nav-item dropdown" style="position:relative;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endauth

            </div>
        </div>
    </nav>

    <!-- Navbar End -->

    <!-- Hero Start -->

    <div class="container-fluid py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">
                        Powerful all-in-one ERP software to manage your entire
                        business from a single platform
                    </h1>
                    <p class="text-white pb-3 animated zoomIn">
                        Our ERP solution integrates finance, inventory, sales, HR, and
                        operations to improve efficiency, reduce costs, and help your
                        business grow faster.
                    </p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Get
                        Free Demo</a>
                    <a href=""
                        class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{ asset('assets/frontend/img/hero.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
