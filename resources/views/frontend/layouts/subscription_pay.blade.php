@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="sub_pay">
                <h1>Subscription</h1>
                <p>{{ $plan->duration.' '.$plan->type }} subscription selected</p>
            </div>
        </div>
    </div>
<form action="{{ route('subscription.checkout') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <h4>Selected</h4>
            <div class="sub_select my-4">
                <div>
                    <input type="hidden" name="plan" value="{{ $plan->id }}">
                    <h5>{{ $plan->name }}</h5>
                    <h6 style="font-weight: 400">{{ $plan->duration.' '.$plan->type }}</h6>
                </div>
                <h3 style="font-weight: 500;color: #55a3da;">${{ $plan->price }}</h3>
            </div>
        </div>
        <div class="col-lg-6">
            <h4>Perconal information</h4>
            <div class="sub_info">
                <div class="my-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="number" name="number" class="form-control @error('number') is-invalid @enderror">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Address</label>
                    <input type="address" name="address" class="form-control @error('address') is-invalid @enderror">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Country</label>
                    <input type="address" name="country" class="form-control @error('country') is-invalid @enderror">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                </div>

                <div class="my-4 text-right">
                    <button type="submit" class="icon-button">PAY</button>
                </div>
            </div>
        </div>
    </div>

</form>
</div>
@endsection
