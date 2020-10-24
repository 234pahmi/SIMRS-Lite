<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  {{-- <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  @include('backend.layouts.assets_header')
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-turbolinks="false">
<div class="wrapper">
    @include('backend.layouts.header')

    @include('backend.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('backend.layouts.footer')
</div>
    {{-- Scripts --}}
    @include('backend.layouts.assets_footer')
</body>
</html>
