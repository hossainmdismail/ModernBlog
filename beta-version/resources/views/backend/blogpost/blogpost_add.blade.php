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
                        <form action="https://templates.iqonic.design/posdash/html/backend/page-list-category.html" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Id *</label>
                                        <select name="user_id" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>
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
                                        <label>Sub Category Id *</label>
                                        <select name="sub_category_id" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
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
                                        <label>Content *</label>
                                        <select name="content" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Views *</label>
                                        <input type="text" name="views" class="form-control" placeholder="Views" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Premium *</label>
                                        <input type="text" name="premium" class="form-control" placeholder="Premium" required>
                                        <div class="help-block with-errors"></div>
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
