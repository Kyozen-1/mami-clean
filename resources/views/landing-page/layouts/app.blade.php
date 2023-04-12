@php
    use App\Models\Profil;
    use Carbon\Carbon;

    $profil = Profil::first();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('landing-page.layouts.head')
    </head>
    <body>

        <!--Preloader-->
        <div id="preloader">
            <div id="loader" class="loader">
                <div class="loader-container">
                    <div class="loader-icon"><img src="{{ asset('images/mami-clean/logo/'.$profil->logo) }}" alt="Preloader"></div>
                </div>
            </div>
        </div>
        <!--Preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        @include('landing-page.layouts.header')

        @yield('content')

        @include('landing-page.layouts.footer')

        @include('landing-page.layouts.js')
    </body>
</html>
