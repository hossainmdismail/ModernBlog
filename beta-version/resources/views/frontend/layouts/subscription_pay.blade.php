@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="sub_pay">
                <h1>Subscription</h1>
                <p>1 month subscription selected</p>
            </div>
        </div>
    </div>
<form action="">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <h4>Selected</h4>
            <div class="sub_select my-4">
                <h5>1 month subcription</h5>
                <h3>400tk</h3>
            </div>
        </div>
        <div class="col-lg-6">
            <h4>Perconal information</h4>
            <div class="sub_info">
                <div class="my-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="number" name="number" class="form-control">
                </div>
                <div class="my-3">
                    <label for="" class="form-label">Address</label>
                    <input type="address" name="address" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 m-auto">
            <button type="submit" class="btn btn-primary py-3 px-5">Payment</button>
        </div>
    </div>
</form>
</div>
@endsection
