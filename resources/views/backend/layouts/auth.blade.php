<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
@endisset
>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }} | {{$title}}</title>
    <meta name="description" content="{{$description}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{asset('assets/backend/img/favicon/apple-touch-icon-57x57.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/backend/img/favicon/apple-touch-icon-114x114.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/backend/img/favicon/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/backend/img/favicon/apple-touch-icon-144x144.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{asset('assets/backend/img/favicon/apple-touch-icon-60x60.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('assets/backend/img/favicon/apple-touch-icon-120x120.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{asset('assets/backend/img/favicon/apple-touch-icon-76x76.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('assets/backend/img/favicon/apple-touch-icon-152x152.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon/favicon-196x196.png')}}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon/favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon/favicon-16x16.png')}}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon/favicon-128.png')}}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{asset('assets/backend/img/favicon/mstile-144x144.png')}}" />
    <meta name="msapplication-square70x70logo" content="{{asset('assets/backend/img/favicon/mstile-70x70.png')}}" />
    <meta name="msapplication-square150x150logo" content="{{asset('assets/backend/img/favicon/mstile-150x150.png')}}" />
    <meta name="msapplication-wide310x150logo" content="{{asset('assets/backend/img/favicon/mstile-310x150.png')}}" />
    <meta name="msapplication-square310x310logo" content="{{asset('assets/backend/img/favicon/mstile-310x310.png')}}" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/backend/font/CS-Interface/style.css')}}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/vendor/OverlayScrollbars.min.css')}}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/styles.css')}}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{asset('assets/backend/css/main.css')}}" />
    @yield("css")
  </head>

  <body class="h-100">
    @yield("content")



    <!-- Vendor Scripts Start -->
    <script src="{{asset('assets/backend/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendor/OverlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendor/autoComplete.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendor/clamp.min.js')}}"></script>

    <script src="{{asset('assets/backend/icon/acorn-icons.js')}}"></script>
    <script src="{{asset('assets/backend/icon/acorn-icons-interface.js')}}"></script>

    <script src="{{asset('assets/backend/js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>

    <script src="{{asset('assets/backend/js/vendor/jquery.validate/additional-methods.min.js')}}"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{asset('assets/backend/js/base/helpers.js')}}"></script>
    <script src="{{asset('assets/backend/js/base/globals.js')}}"></script>
    <script src="{{asset('assets/backend/js/base/nav.js')}}"></script>
    <script src="{{asset('assets/backend/js/base/search.js')}}"></script>
    <script src="{{asset('assets/backend/js/base/settings.js')}}"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="{{asset('assets/backend/js/common.js')}}"></script>
    <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
    @yield("js")
    <!-- Page Specific Scripts End -->
  </body>
</html>
