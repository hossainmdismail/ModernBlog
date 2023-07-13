@extends('frontend.layouts.app')

@section('content')
<!-- hero section -->
<section id="hero">

    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <div class="header-carousel-widget">
                    <!-- featured post large -->
                    @foreach ($recents as $recent)
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">{{ $recent->rel_to_cat->name }}</a>
                                <h2 class="post-title"><a href="blog-single.html">{{ $recent->title }}</a></h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $recent->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner data-bg-image" data-bg-image="{{ asset('uploads/blog/'.$recent->photo) }}"></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <!-- post tabs -->
                <div class="post-tabs rounded bordered">
                    <!-- tab navs -->
                    <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                        <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
                        <li class="nav-item" role="presentation"><button aria-controls="Premium" aria-selected="false" class="nav-link" data-bs-target="#Premium" data-bs-toggle="tab" id="Premium-tab" role="tab" type="button">Premium</button></li>
                    </ul>
                    <!-- tab contents -->
                    <div class="tab-content" id="postsTabContent">
                        <!-- loader -->
                        <div class="lds-dual-ring"></div>
                        <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
                            <!-- post -->
                            @foreach ($populars as $popular)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('single.blog',$popular->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$popular->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$popular->id) }}">{{ $popular->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $popular->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- premium posts -->
                        <div aria-labelledby="Premium-tab" class="tab-pane fade" id="Premium" role="tabpanel">
                            @foreach ($premiumRecents as $premium)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('single.blog',$premium->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$premium->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$premium->id) }}">{{ $premium->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item"><span class="premium_pill">Premium</span> {{ $premium->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Editor’s Pick</h3>
                    <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        {{-- @foreach ($premiums as $blogpost)
                            <div class="col-sm-6">
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">{{ $blogpost->rel_to_cat->name }}</a>
                                        <a href="{{ route('single.blog', $blogpost->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/editor-lg.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-1">
                                        <a href="{{ route('single.blog', $blogpost->id) }}">{{ $blogpost->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- item List --}}
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- item List --}}
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/editor-sm-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- horizontal ads -->
                <div class="ads-horizontal text-md-center">
                    <span class="ads-title">- Sponsored Ad -</span>
                    <a href="#">
                        <img src="images/ads/ad-750.png" alt="Advertisement" />
                    </a>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-12">
                            <!-- post large -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Ranking</a>
                                    {{-- <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span> --}}
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-lg-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-1 mb-0">
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-1"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h5>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend_assets/images') }}/posts/trending-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Inspiration</h3>
                    <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                    <div class="slick-arrows-top">
                        <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                        <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>

                <div class="row post-carousel-twoCol post-carousel">
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing Tattoo?</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="images/posts/inspiration-1.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="images/posts/inspiration-2.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="images/posts/inspiration-3.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Latest Posts</h3>
                    <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">

                    <div class="row">

                        <div class="col-md-12 col-sm-6">
                            <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <span class="post-format-sm">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/latest-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                        <li class="list-inline-item"><a href="#">Trending</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">The Next 60 Things To Immediately Do About Building</a></h5>
                                    <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-6">
                            <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/latest-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                        <li class="list-inline-item"><a href="#">Lifestyle</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
                                    <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-6">
                            <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <span class="post-format-sm">
                                        <i class="icon-camrecorder"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/latest-sm-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                        <li class="list-inline-item"><a href="#">Fashion</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
                                    <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-6">
                            <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="images/posts/latest-sm-4.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                        <li class="list-inline-item"><a href="#">Politic</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h5>
                                    <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div
                    >
                    <!-- load more button -->
                    <div class="text-center">
                        <button class="btn btn-simple">Load More</button>
                    </div>

                </div>

            </div>
            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->


                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-left">
                            <h3 class="widget-title">Premium Posts</h3>
                            <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <!-- post -->
                            @foreach ($premiumTops as $key => $premiumTop )
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $key+1 }}</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$premiumTop->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">{{ $premiumTop->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-left">
                            <h3 class="widget-title">Explore Topics</h3>
                            <img src="{{ asset('settings/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                <li><a href="#">Lifestyle</a><span>(5)</span></li>
                                <li><a href="#">Inspiration</a><span>(2)</span></li>
                                <li><a href="#">Fashion</a><span>(4)</span></li>
                                <li><a href="#">Politic</a><span>(1)</span></li>
                                <li><a href="#">Trending</a><span>(7)</span></li>
                                <li><a href="#">Culture</a><span>(3)</span></li>
                            </ul>
                        </div>

                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-left">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                            <form>
                                <div class="mb-2">
                                    <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                                </div>
                                <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                            </form>
                            <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
                        </div>
                    </div>

                    <!-- widget post carousel -->
                    <div class="widget rounded">
                        <div class="widget-header text-left">
                            <h3 class="widget-title">Celebration</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">How to</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">Trending</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">How to</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#" class="widget-ads">
                            <img src="images/ads/ad-360.png" alt="Advertisement" />
                        </a>
                    </div>



                </div>

            </div>

        </div>

    </div>
</section>
@endsection
