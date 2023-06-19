<header class="header-top-pan">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <!-- site logo -->
            <span class="currentTimeDate">
                <span id="currentDate" style="padding-right: 12px; border-right:1px solid #67799142"></span>
                <span id="currentTime"></span>
            </span>


            <!-- header right section -->
            <div class="header-right">
                <!-- social icons -->
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<header class="header-default">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <!-- site logo -->
            <a class="navbar-brand" style="width: 120px !important" href="index.html"><img src="{{ asset('settings/e-blogger-logo.png') }}" alt="logo" /></a>

            <div class="collapse navbar-collapse">
                <!-- menus -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link nav_active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="category.html">Category</a></li>
                            <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                            <li><a class="dropdown-item" href="blog-single-alt.html">Blog Single Alt</a></li>
                            <li><a class="dropdown-item" href="about.html">About</a></li>
                            <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- header right section -->
            <div class="header-right">
                <!-- header buttons -->
                <div class="header-buttons">
                    @if (Auth::check())
                    <a href="#">
                        <img style="width: 30px; height:30px" src="{{ asset('uploads/blog/BLOG1667195-130623.png') }}" alt="">
                    </a>
                    @else
                    <button class="search icon-button">
                        Join Premium
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
