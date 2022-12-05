<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Waqas Shaheen Industry">
      {{-- Favicon --}}
  @php
  $setting=App\Models\Setting::find(1);
@endphp
@if ($setting)
    <link rel="shortcut icon" href="{{asset('uploads/setting/'.$setting->favicon)}}" type="image/x-icon">


@endif
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    {{-- css template footer --}}
    
<!-- style css -->

</head>
<body>
    <div id="app">
        @include('layouts.inc.frontend-navbar');
        
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.inc.frontend-footer');
    </div>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script> --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" ></script>
    
    <script>
        
        $('.category-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
    
    @yield('scripts')

</body>
</html>
