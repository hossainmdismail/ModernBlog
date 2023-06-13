@extends('backend.layout.app')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Site Setting</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('social.icon') }}"  method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Icon *</label>
                                        @php
                                        $icons = [

                                        'fa-apple',
                                        'fa-language',
                                        'fa-fax',
                                        'fa-recycle',
                                        'fa-car',
                                        'fa-taxi',
                                        'fa-tree',
                                        'fa-file-audio-o',
                                        'fa-file-video-o',
                                        'fa-font-awesome',
                                        'fa-shopping-bag',
                                        'fa-paint-brush',
                                        'fa-book',
                                        'fa-bed',
                                        'fa-cutlery',
                                        'fa-futbol-o',
                                        'fa-mobile',
                                        'fa-television',
                                        'fa-bolt',
                                        ];
                                        @endphp
                                        <div class="my-3" style="font-family: fontawesome; font-size: 22px; " >
                                            @foreach ($icons as $icon)
                                                <i class="fa {{ $icon }} px-1" data-icon="{{ $icon }}"></i>
                                            @endforeach
                                        <input type="text" id="icon" class="form-control" name="icon" placeholder="Icon">
                                            {{-- <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Icon"  value="{{ old('icon') }}"> --}}
                                            {{-- <div class="help-block with-errors"></div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Link *</label>
                                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="Link">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add category</button>
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

@section('script')
{{-- =======social icon --}}
<script>
    $('.fa').click(function(){
        var icon = $(this).attr('data-icon');
        $('#icon').attr('value', icon);
    });
</script>
@endsection
