
<!doctype html>
<html lang="en">

<!-- Mirrored from templates.iqonic.design/posdash/html/backend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 11:09:10 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>POS Dash | Responsive Bootstrap 4 Admin Dashboard Template</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/posdash/html/assets/images/favicon.ico" />
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backend-plugin.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backende209.css?v=1.0.0">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/remixicon/fonts/remixicon.css">  </head>
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
<script src="{{ asset('backend_assets') }}/js/table-treeview.js"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('backend_assets') }}/js/customizer.js"></script>

<!-- Chart Custom JavaScript -->
<script async src="{{ asset('backend_assets') }}/js/chart-custom.js"></script>

<!-- app JavaScript -->
<script src="{{ asset('backend_assets') }}/js/app.js"></script>
</body>

<!-- Mirrored from templates.iqonic.design/posdash/html/backend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 11:09:45 GMT -->
</html>
