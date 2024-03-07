@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Blog Post</h4>
                        </div>
                        <a href="{{ route('blogpost.index') }}" class="btn btn-primary add-list"><i class="fa-solid fa-list-ul" style="color: #ffffff;"></i>List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blogpost.update', $blog_post->id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select name="category_id" class="selectpicker form-control @error('name') is-invalid @enderror" data-style="py-0">
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}"{{ $category->id == $blog_post->category_id?'selectd':'' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Category *</label>
                                        <select name="sub_category_id" class="selectpicker form-control @error('name') is-invalid @enderror" data-style="py-0">
                                            @foreach ($subcategorys as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $blog_post->sub_category_id?'selectd':'' }}>{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $blog_post->title }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control image-file " name="photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Premium *</label>
                                        <select name="premium" class="selectpicker form-control" data-style="py-0" >
                                            <option value="free" {{ $blog_post->free == 'premium'? 'selected':''}}>Free</option>
                                            <option value="premium" {{ $blog_post->premium == 'premium'? 'selected':''}}>Premium</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0" value="{{ $blog_post->status }}">
                                            <option value="1"{{ $blog_post->status == '1'? 'selected':''}}>Active</option>
                                            <option value="0"{{ $blog_post->status == '0'? 'selected':''}}>Deactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit Blog Post</button>
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
