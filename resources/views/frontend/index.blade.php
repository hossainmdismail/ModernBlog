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
                                <h2 class="post-title"><a href="{{ route('single.blog',$recent->slug) }}">{{ $recent->title }}</a></h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $recent->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $recent->created_at->format('d F Y') }}</li>
                                </ul>
                            </div>
                            <a href="{{ route('single.blog',$recent->slug) }}">
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
                                        <a href="{{ route('single.blog',$popular->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$popular->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$popular->slug) }}">{{ $popular->title }}</a></h6>
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
                                        <a href="{{ route('single.blog',$premium->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$premium->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$premium->slug) }}">{{ $premium->title }}</a></h6>
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
                    <h3 class="section-title">User's Choice</h3>
                    <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        @foreach ($userChoice->take(1) as $userChoices)
                            <div class="col-sm-6">
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">{{ $userChoices->rel_to_cat->name }}</a>
                                        <a href="{{ route('single.blog', $userChoices->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$userChoices->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        @if ($userChoices->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                        <li class="list-inline-item">{{ $userChoices->created_at->format('d F Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-1">
                                        <a href="{{ route('single.blog', $userChoices->slug) }}">{{ $userChoices->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                        {{-- item List --}}
                        <div class="col-sm-6">
                            <!-- post -->
                            @foreach ($userChoice->skip(1)->take(3) as $userChoices)
                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{ route('single.blog', $userChoices->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$userChoices->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog', $userChoices->slug) }}">{{ $userChoices->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            @if ($userChoices->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                            <li class="list-inline-item">{{ $userChoices->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-12">
                            <!-- post large -->
                            @foreach ($trendings->take(1) as $trending)
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="category.html" class="category-badge position-absolute">{{ $trending->rel_to_cat->name }}</a>
                                        <a href="{{ route('single.blog',$trending->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$trending->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        @if ($trending->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                        <li class="list-inline-item">{{ $trending->created_at->format('d F Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-1"><a href="{{ route('single.blog',$trending->slug) }}">{{ $trending->title }}</a></h5>
                                </div>
                            @endforeach
                            <!-- post -->
                            @foreach ($trendings->skip(1)->take(6) as $trending)
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{ route('single.blog',$trending->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$trending->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$trending->slug) }}">{{ $trending->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            @if ($trending->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                            <li class="list-inline-item">{{ $trending->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Latest Posts</h3>
                    <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">

                    <div class="row">
                        @foreach ($latests->take(6) as $latest)
                            <div class="col-md-12 col-sm-6">
                                <!-- post -->
                                <div class="post post-list clearfix">
                                    <div class="thumb rounded">
                                        <a href="{{ route('single.blog',$latest->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$latest->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-3">
                                            <li class="list-inline-item"><a href="#">{{ $latest->rel_to_user->name }}</a></li>
                                            <li class="list-inline-item"><a href="#">{{ $latest->rel_to_cat->name }}</a></li>
                                            <li class="list-inline-item">{{ $latest->created_at->format('d F Y') }}</li>
                                        </ul>
                                        <h5 class="post-title"><a href="{{ route('single.blog',$latest->slug) }}">{{ $latest->title }}</a></h5>
                                        <p>
                                            @if ($latest->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                        </p>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="https://www.facebook.com/dialog/send?app_id=YOUR_APP_ID&amp;link={{ urlencode(route('single.blog',$latest->slug)) }}&amp;redirect_uri=REDIRECT_URL" target="_blank">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($latest->title) }}&amp;url={{ urlencode(route('single.blog',$latest->slug)) }}" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('single.blog',$latest->slug) }}" target="_blank">
                                                        <i class="fab fa-linkedin-in"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="https://t.me/share/url?url={{ urlencode(route('single.blog',$latest->slug)) }}&text={{ urlencode($latest->title) }}" target="_blank">
                                                        <i class="fab fa-telegram-plane"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="mailto:?body=Check out this blog post: {{ rawurlencode(route('single.blog',$latest->slug)) }}" target="_blank">
                                                        <i class="far fa-envelope"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div
                    >

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
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <!-- post -->
                            @foreach ($premiumTops as $key => $premiumTop )
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $key+1 }}</span>
                                        <a href="{{ route('single.blog',$premiumTop->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog/'.$premiumTop->photo) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('single.blog',$premiumTop->slug) }}">{{ $premiumTop->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item"><span class="premium_pill">Premium</span>{{ $premium->created_at->format('d F Y') }}</li>
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
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ($categorys as $categories)
                                    <li><a href="{{ route('category.post',$categories->id) }}">{{ $categories->name }}</a><span>({{ App\Models\Blog_Posts::where('category_id',$categories->id)->count() }})</span></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-left">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                            <form action="{{ route('subscribe.store') }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <input class="form-control w-100 text-center" name="email" placeholder="Email address…" type="email">
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
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                                <!-- post -->
                                @foreach (App\Models\Blog_Posts::where('status',1)->orderBy('id','DESC')->get()->take(5) as $trending)
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="{{ route('category.post',$trending->rel_to_cat->id) }}" class="category-badge position-absolute">{{ $trending->rel_to_cat->name }}</a>
                                            <a href="{{ route('single.blog',$trending->slug) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog/'.$trending->photo) }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="{{ route('single.blog',$trending->slug) }}">{{ $trending->title }}</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            @if ($trending->premium == 'premium')<li class="list-inline-item"> <span class="premium_pill">Premium</span></li> @endif
                                            <li class="list-inline-item">{{ $trending->created_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
@endsection
