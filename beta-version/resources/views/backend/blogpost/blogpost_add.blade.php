@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('blogpost.store') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Add Blog Post</h4>
                            </div>
                        </div>
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Id *</label>
                                            <select name="category_id" id="category_id" class="selectpicker form-control @error('category_id') is-invalid @enderror" data-style="py-0">
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id? 'selected':''}}>{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category Id *</label>
                                            <select name="sub_category_id" id="sub_category_id" class="selectpicker form-control @error('sub_category_id') is-invalid @enderror" data-style="py-0">
                                                <option ></option>
                                                {{-- @foreach ($subcategorys as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ old('sub_category_id') == $subcategory->id? 'selected':''}}>{{ $subcategory->name }}</option>
                                                @endforeach --}}

                                            </select>
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
                                            <label>Blog Type *</label>
                                            <select name="blog_type" class="selectpicker form-control @error('blog_type') is-invalid @enderror" data-style="py-0">
                                                <option value="free" {{ old('blog_type') == 'free'? 'selected':''}}>Free</option>
                                                <option value="premium" {{ old('blog_type') == 'premium'? 'selected':''}}>Premium</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title *</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <hr class="">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Title *</label>
                                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta title" value="{{ old('meta_title') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Tags *</label>
                                            <input type="text" name="meta_tags" class="form-control @error('meta_tags') is-invalid @enderror" placeholder="Meta tags" value="{{ old('meta_tags') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Meta Descriptions *</label>
                                            {{-- <input type="text" name="meta_descp"   > --}}
                                            <textarea name="meta_descp" class="form-control @error('meta_descp') is-invalid @enderror" id="" cols="30" rows="2" placeholder="Meta descriptions">{{ old('meta_descp') }}</textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Write Your Blog</label>
                                        <div class="form-group">
                                            <textarea id="summernote" name="content" style="width:100%; height:10rem" class="@error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Add Blog Post</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
</div>
<!-- Wrapper End-->

@endsection


@section('script')

{{-- =========== Summernote ============== --}}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400
            });
        });
    </script>

{{-- =============== ajax ================= --}}
<script>
    $('#category_id').change(function(){
        var category_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getsubcat',
            data:{'category_id':category_id},
            success:function(data){
                // alert(data);
                const subcate = $('#sub_category_id').append(data);
                console.log(subcate);
            }
        })
    })
</script>

@endsection
