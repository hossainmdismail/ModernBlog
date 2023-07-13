@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Sub category</h4>
                        </div>
                        <a href="{{ route('subcategory.index') }}" class="btn btn-primary add-list"><i class="fa-solid fa-list-ul" style="color: #ffffff;"></i>List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcategory.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category*</label>
                                        <select name="category_id" class="selectpicker form-control @error('category_id') is-invalid @enderror" data-style="py-0">
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category Name *</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Sub Category Name" value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control image-file @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Title *</label>
                                        <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Tage *</label>
                                        <input type="text" name="meta_tags" class="form-control @error('meta_tags') is-invalid @enderror" placeholder="Meta Tage" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Description *</label>
                                        <textarea name="meta_descp" class="form-control @error('meta_descp') is-invalid @enderror" placeholder="Meta Description" id="" cols="80" rows="4"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Subcategory</button>
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
