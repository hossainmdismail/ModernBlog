@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto my-5 py-5">
            <div class="success_main text-center">
                <img src="{{ asset('frontend_assets/images/success.png') }}" alt="">
                <h3>Success</h3>
                <p>Your Payment has been successfull. Injoy your premium account</p>
                <a href="{{ url('/') }}" class="icon-button mt-3">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
