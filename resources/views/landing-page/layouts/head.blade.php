@php
    use App\Models\Profil;
    use Carbon\Carbon;

    $profil = Profil::first();
@endphp
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title','Clentac - Cleaning Services Template')</title>
<meta name="description" content="Mami Clean">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/mami-clean/logo/'.$profil->logo) }}">
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('clentac/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/odometer.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/jarallax.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/BeerSlider.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/tg-cursor.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/default.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('clentac/assets/css/responsive.css') }}">
@yield('css')
