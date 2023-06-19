<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('settings/fav.png') }}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css" type="text/css" media="all">


</head>

<body>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        @include('frontend.layouts.header')

        {{-- frontend main --}}
        @yield('content')


        <!-- footer -->
        @include('frontend.layouts.footer')

    </div><!-- end site wrapper -->


    {{-- =============== login popup ===================== --}}
    <div class="search-popup popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="login_logo mt-5">
                <img src="{{ asset('settings/fav.png') }}" alt="">
            </div>
            <div class="text-center">
                <h4 class="mb-3 mt-0">User Login</h4>
            </div>
            <!-- form -->
            <form action="{{ route('user.login') }}" method="POST" class=" search-form">
                @csrf
                <div class="my-3">
                    <label class="form-label" for="">Email </label>
                    <input type="email" name="email" placeholder="example@yahoo.com" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                </div>
                <div class="my-3">
                    <label class="form-label" for="">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                </div>
                <div class="my-3">
                    <input type="checkbox" id="remember" name="remember">
                    <label class="form-label" for="remember">Remember</label>
                </div>
                <button class="btn btn-default btn-lg" type="submit">Login</button>
                <div class="my-3 m-auto text-center">
                    <span>Don't have a account -<a href="#">Regristration</a></span>
                </div>
            </form>
        </div>
    </div>


    <!-- search popup area -->
    {{-- <div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div> --}}


    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('settings/e-blogger-logo.png') }}" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="index.html">Home</a>
                    <ul class="submenu">
                        <li><a href="index.html">Magazine</a></li>
                        <li><a href="personal.html">Personal</a></li>
                        <li><a href="personal-alt.html">Personal Alt</a></li>
                        <li><a href="minimal.html">Minimal</a></li>
                        <li><a href="classic.html">Classic</a></li>
                    </ul>
                </li>
                <li><a href="category.html">Lifestyle</a></li>
                <li><a href="category.html">Inspiration</a></li>
                <li>
                    <a href="#">Pages</a>
                    <ul class="submenu">
                        <li><a href="category.html">Category</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="blog-single-alt.html">Blog Single Alt</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('frontend_assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/custom.js"></script>


    @yield('footer_script')

    <script>




    </script>

</body>

</html>
