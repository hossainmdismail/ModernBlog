@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit category</h4>
                        </div>
                        <a href="{{ route('category.index') }}" class="btn btn-primary add-list"><i class="fa-solid fa-list-ul" style="color: #ffffff;"></i>List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', ['category' => $categorys->id]) }}"  method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $categorys->id }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name"  value="{{ $categorys->name }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control image-file @error('photo') is-invalid @enderror" name="photo" accept="image/*" value="{{ $categorys->photo }}">
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title *</label>
                                        <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title" value="{{ $categorys->meta_title }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Tage *</label>
                                        <input type="text" name="meta_tags" class="form-control @error('meta_tags') is-invalid @enderror" placeholder="Meta Tage" value="{{ $categorys->meta_tags }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0" value="{{ $categorys->status }}">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description *</label>
                                        <textarea name="meta_descp" class="form-control @error('meta_descp') is-invalid @enderror" placeholder="Meta Description" id="" cols="80" rows="4">{{ $categorys->meta_descp }}"</textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit category</button>
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
