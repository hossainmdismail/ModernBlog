
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>POS Dash | Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('settings/fav.png') }}" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backend-plugin.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backende209.css?v=1.0.0">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/remixicon/fonts/remixicon.css">  </head>
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <body class="  ">
    <!-- loader Start -->

    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        {{-- backend sidebar --}}
      @include('backend.layout.sidebar')

      {{-- backend header --}}
        @include('backend.layout.header')

        {{-- backend main --}}
        @yield('content')

        {{-- backend footer --}}
        @include('backend.layout.footer')

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('backend_assets') }}/js/backend-bundle.min.js"></script>

<!-- Table Treeview JavaScript -->
{{-- <script src="{{ asset('backend_assets') }}/js/table-treeview.js"></script> --}}

<!-- Chart Custom JavaScript -->
{{-- <script src="{{ asset('backend_assets') }}/js/customizer.js"></script> --}}

<!-- Chart Custom JavaScript -->
{{-- <script async src="{{ asset('backend_assets') }}/js/chart-custom.js"></script> --}}

<!-- app JavaScript -->
<script src="{{ asset('backend_assets') }}/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@include('sweetalert::alert')
@yield('script')
</body>
</html>
