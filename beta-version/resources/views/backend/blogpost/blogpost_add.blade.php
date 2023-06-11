@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Blog Post</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blogpost.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Id *</label>
                                        <input type="hidden" name="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Id *</label>
                                        <select name="category_id" class="selectpicker form-control @error('name') is-invalid @enderror" data-style="py-0">
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Category Id *</label>
                                        <select name="sub_category_id" class="selectpicker form-control @error('name') is-invalid @enderror" data-style="py-0">
                                            @foreach ($subcategorys as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" placeholder="Title" value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control image-file @error('name') is-invalid @enderror" name="photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Content *</label>
                                        <select name="content" class="selectpicker form-control @error('name') is-invalid @enderror" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Premium *</label>
                                        <input type="text" name="premium" class="form-control @error('name') is-invalid @enderror" placeholder="Premium" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Blog Post</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
</div>
<!-- Wrapper End-->

@endsection
