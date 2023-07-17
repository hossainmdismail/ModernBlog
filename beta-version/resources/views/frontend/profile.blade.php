@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="user_info px-5 py-3 border  rounded shadow">
                <div class="user_header mb-4 mt-3">
                    <h3>My Information</h3>
                </div>
                <ul>
                    <li>Name <span> : hamim</span></li>
                    <li>Number<span> : 011545694215</span></li>
                    <li>Gmail <span> : jfhdj@gmail.com</span></li>
                    <li>Address <span> : Dhaka,bangladesh</span></li>
                </ul>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user_post border  rounded shadow">
                        <div class="widget rounded">
                            <div class="widget-header text-left">
                                <h3 class="widget-title">User Posts</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-1.jpg" alt="post-title" />
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
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-2.jpg" alt="post-title" />
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
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-3.jpg" alt="post-title" />
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="user_post border  rounded shadow mt-3">
                        <div class="widget rounded">
                            <div class="widget-header text-left">
                                <h3 class="widget-title">Premium Posts</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-1.jpg" alt="post-title" />
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
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-2.jpg" alt="post-title" />
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
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">$</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend_assets/images') }}/posts/tabs-3.jpg" alt="post-title" />
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
