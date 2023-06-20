@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-4 m-auto">
            <div class="sub_main py-3 px-5">
                <h3>Silver</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda ex rem reprehenderit distinctio voluptates, corporis repudiandae! Iste facere.</p>
                <h3>200tk</h3>
                <h5>1 month subscription</h5>
                <div class="sub_btn my-3">
                    <a href="{{ route('subscription.pay') }}">Subscribe</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-auto">
            <div class="sub_main py-3 px-5">
                <h3>Gold</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda ex rem reprehenderit distinctio voluptates, corporis repudiandae! Iste facere.</p>
                <h3>200tk</h3>
                <h5>1 month subscription</h5>
                <div class="sub_btn my-3">
                    <a href="{{ route('subscription.pay') }}">Subscribe</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-auto">
            <div class="sub_main py-3 px-5">
                <h3>Plata</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda ex rem reprehenderit distinctio voluptates, corporis repudiandae! Iste facere.</p>
                <h3>200tk</h3>
                <h5>1 month subscription</h5>
                <div class="sub_btn my-3">
                    <a href="{{ route('subscription.pay') }}">Subscribe</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
