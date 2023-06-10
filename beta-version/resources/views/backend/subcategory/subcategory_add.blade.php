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
                    </div>
                    <div class="card-body">
                        <form action="https://templates.iqonic.design/posdash/html/backend/page-list-category.html" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Id *</label>
                                        <select name="category_id" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Category Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Sub Category Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control image-file" name="photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title *</label>
                                        <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Tage *</label>
                                        <input type="text" name="meta_tags[]" class="form-control" placeholder="Meta Tage" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description *</label>
                                        <textarea name="meta_descp" class="form-control" placeholder="Meta Description" id="" cols="80" rows="4"></textarea>
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
