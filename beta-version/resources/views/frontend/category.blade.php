@extends('frontend.layouts.app')

@section('content')

<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">{{ $categorys->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
<<<<<<< Updated upstream
                    <li><a href="{{ url('/') }}">Home</a></li><span style="margin: 0px 6px 0px 6px">/</span>
                    <li>{{ $categorys->name }}</li>
=======
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $categorys->name }}</li>
>>>>>>> Stashed changes
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <div class="row gy-4">
                    @foreach ($blog_post as $blog)
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered">
                            <div class="thumb top-rounded">
                                @if ($blog->premium == 'premium') <a href="#" class="category-badge position-absolute">Premium</a> @endif

                                <a href="{{ route('single.blog',$blog->id) }}">
                                    <div class="inner">
                                        <img src="{{ asset('uploads/Category') }}/{{ $blog->rel_to_cat->photo }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $blog->rel_to_cat->name }}</a></li>
                                    <li class="list-inline-item">{{ $blog->created_at->format('d-F-Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('single.blog',$blog->id) }}">{{ $blog->title }}</a></h5>
                            </div>
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
                    @endforeach
                </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>

            </div>
            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">


                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Popular Posts</h3>
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <!-- post -->
                            @foreach (App\Models\Blog_Posts::where('category_id',$categorys->id)->where('status',1)->orderBy('views','DESC')->get()->take(5) as $key => $popular)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $key+1 }}</span>
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
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Explore Topics</h3>
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach (App\Models\Category::all() as $categories)
                                    <li><a href="{{ route('category.post',$categories->id) }}">{{ $categories->name }}</a><span>({{ App\Models\Blog_Posts::where('category_id',$categories->id)->count() }})</span></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
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
                        <div class="widget-header text-center">
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
                                            <a href="{{ route('single.blog',$trending->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog/'.$trending->photo) }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="{{ route('single.blog',$trending->id) }}">{{ $trending->title }}</a></h5>
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

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#" class="widget-ads">
                            <img src="images/ads/ad-360.png" alt="Advertisement" />
                        </a>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Tag Clouds</h3>
                            <img src="{{ asset('settings/wave.png') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <a href="#" class="tag">#Trending</a>
                            <a href="#" class="tag">#Video</a>
                            <a href="#" class="tag">#Featured</a>
                            <a href="#" class="tag">#Gallery</a>
                            <a href="#" class="tag">#Celebrities</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection
