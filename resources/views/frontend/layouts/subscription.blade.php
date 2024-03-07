@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        @forelse ($plans as $key => $plan)
            <div class="col-lg-4 m-auto">
                <div class="sub_main py-3 px-5">
                    <h4>{{ $plan->name }}</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda ex rem reprehenderit distinctio voluptates, corporis repudiandae! Iste facere.</p>
                    <h3 style="font-weight: 500;color: #55a3da;">${{ $plan->price }}</h3>
                    <h6>{{ $plan->duration.' '.$plan->type }}</h6>
                    <div class="sub_btn my-3">
                        <a class="icon-button" href="{{ route('subscription.pay',$plan->id) }}">Subscribe</a>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-lg-4 m-auto">
            <div class="sub_main py-3 px-5">
                <h4 style="color: gray; text-align:center">No Data Found</h4>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
