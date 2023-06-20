@extends('backend.layout.app')

@section('content')
     <div class="content-page">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 ">
                    <div class="card">
                        <div class="card-header text-center">
                        <h4>Update Plans</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('plans.update',$data->id) }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Plans Name" value="{{ $data->name }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price *</label>
                                            <input type="number" class="form-control image-file @error('price') is-invalid @enderror" name="price" placeholder="$" value="{{ $data->price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type *</label>
                                            <select name="type" class="form-control" id="">
                                                <option value="day" @if($data->type == 'day') selected @endif>Day</option>
                                                <option value="month" @if($data->type == 'month') selected @endif>Month</option>
                                                <option value="years" @if($data->type == 'years') selected @endif >Years</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Duration *</label>
                                            <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Day, Month, Years" value="{{ $data->duration }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>

                                {{-- <a href="{{ route('plans.destroy',$data->id) }}" class="btn btn-danger mr-2">Delete Plans</a> --}}
                            </form>
                            <form action="{{ route('plans.destroy',$data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2 mt-3">Delete Plan</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Page end  -->
    </div>
    <!-- Wrapper End-->

@endsection




