@php
    use App\Models\Profil;

    $profil = Profil::first();
@endphp
<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
        <!-- Logo Start -->
        <div class="logo position-relative">
            <a href="index.html">
            <!-- Logo can be added directly -->
            <img src="{{ asset('images/mami-clean/logo/'.$profil->logo) }}" alt="logo" />

            <!-- Or added via css to provide different ones for different color themes -->
            {{-- <div class="img"></div> --}}
            </a>
        </div>
        <!-- Logo End -->

        <!-- User Menu Start -->
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="{{ asset('acorn/acorn-elearning-portal/img/profile/profile-3.webp') }}" height="1rem"/>
            <div class="name">{{$profil->nama}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">Akun</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Info Pengguna</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 pe-1 ps-1">
                <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('mami-clean.logout') }}">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        <!-- User Menu End -->

        <!-- Menu Start -->
        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    @if (request()->routeIs('mami-clean.admin.dashboard.index'))
                        <a href="{{ route('mami-clean.admin.dashboard.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.dashboard.index') }}">
                    @endif
                        <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                        <span class="label">Dashboard</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.profil.index'))
                        <a href="{{ route('mami-clean.admin.profil.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.profil.index') }}">
                    @endif
                        <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                        <span class="label">Profil</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.brand.index'))
                        <a href="{{ route('mami-clean.admin.brand.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.brand.index') }}">
                    @endif
                        <i data-acorn-icon="online-class" class="icon" data-acorn-size="18"></i>
                        <span class="label">Brand</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.testimonial.index'))
                        <a href="{{ route('mami-clean.admin.testimonial.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.testimonial.index') }}">
                    @endif
                        <i data-acorn-icon="online-class" class="icon" data-acorn-size="18"></i>
                        <span class="label">Testimonial</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.layanan.index'))
                        <a href="{{ route('mami-clean.admin.layanan.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.layanan.index') }}">
                    @endif
                        <i data-acorn-icon="online-class" class="icon" data-acorn-size="18"></i>
                        <span class="label">Layanan</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.brosur.index'))
                        <a href="{{ route('mami-clean.admin.brosur.index') }}" class="active">
                    @else
                        <a href="{{ route('mami-clean.admin.brosur.index') }}">
                    @endif
                        <i data-acorn-icon="online-class" class="icon" data-acorn-size="18"></i>
                        <span class="label">Brosur</span>
                    </a>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.admin.master-data.media-sosial.index'))
                    <a href="#master" class="active">
                    @else
                    <a href="#master">
                    @endif
                        <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                        <span class="label">Master</span>
                    </a>
                    <ul id="master">
                        <li>
                            @if (request()->routeIs('mami-clean.admin.master-data.media-sosial.index'))
                                <a href="{{ route('mami-clean.admin.master-data.media-sosial.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.admin.master-data.media-sosial.index') }}">
                            @endif
                                <span class="label">Media Sosial</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    @if (request()->routeIs('mami-clean.landing-page.beranda.index') ||
                    request()->routeIs('mami-clean.landing-page.perusahaan.index') ||
                    request()->routeIs('mami-clean.landing-page.layanan.index') ||
                    request()->routeIs('mami-clean.landing-page.proyek.index') ||
                    request()->routeIs('mami-clean.landing-page.kontak.index') ||
                    request()->routeIs('mami-clean.landing-page.service-quality.index'))
                    <a href="#landing_page" class="active">
                    @else
                    <a href="#landing_page">
                    @endif
                        <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                        <span class="label">Landing Page</span>
                    </a>
                    <ul id="landing_page">
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.beranda.index'))
                                <a href="{{ route('mami-clean.landing-page.beranda.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.beranda.index') }}">
                            @endif
                                <span class="label">Beranda</span>
                            </a>
                        </li>
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.perusahaan.index'))
                                <a href="{{ route('mami-clean.landing-page.perusahaan.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.perusahaan.index') }}">
                            @endif
                                <span class="label">Perusahaan</span>
                            </a>
                        </li>
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.layanan.index'))
                                <a href="{{ route('mami-clean.landing-page.layanan.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.layanan.index') }}">
                            @endif
                                <span class="label">Layanan</span>
                            </a>
                        </li>
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.proyek.index'))
                                <a href="{{ route('mami-clean.landing-page.proyek.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.proyek.index') }}">
                            @endif
                                <span class="label">Proyek</span>
                            </a>
                        </li>
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.kontak.index'))
                                <a href="{{ route('mami-clean.landing-page.kontak.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.kontak.index') }}">
                            @endif
                                <span class="label">Kontak</span>
                            </a>
                        </li>
                        <li>
                            @if (request()->routeIs('mami-clean.landing-page.service-quality.index'))
                                <a href="{{ route('mami-clean.landing-page.service-quality.index') }}" class="active">
                            @else
                                <a href="{{ route('mami-clean.landing-page.service-quality.index') }}">
                            @endif
                                <span class="label">Service Quality</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Menu End -->

        <!-- Mobile Buttons Start -->
        <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
        </div>
        <!-- Mobile Buttons End -->
    </div>
    <div class="nav-shadow"></div>
</div>
