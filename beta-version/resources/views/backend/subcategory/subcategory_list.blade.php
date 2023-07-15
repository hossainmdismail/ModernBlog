@extends('backend.layout.app')

@section('content')
     <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Sub Category List</h4>
                    </div>
                    <a href="{{ route('subcategory.create') }}" class="btn btn-primary add-list"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>Add</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Meta Title</th>
                            <th>Meta Tage</th>
                            <th>Meta Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($subcategorys as $subcategory)

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/Subcategory/'.$subcategory->photo) }}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                    <div>
                                        {{ $subcategory->name }}
                                    </div>
                                </div>
                            </td>
                            <td>{{ $subcategory->rel_to_category->name }}</td>
                            <td>{{ $subcategory->meta_title }}</td>
                            <td>{{ $subcategory->meta_tags }}</td>
                            <td>{{ $subcategory->meta_descp }}</td>
                            <td>
                                @if($subcategory->status == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('subcategory.edit', $subcategory->id) }}"><i class="ri-pencil-line mr-0"></i></a>

                                    <form action="{{ route('subcategory.destroy', ['subcategory' => $subcategory->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-warning border-0 mr-2">
                                            <i class="ri-delete-bin-line mr-0"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Page end  -->
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <div class="media align-items-top justify-content-between">
                            <h3 class="mb-3">Product</h3>
                            <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                        </div>
                        <div class="content edit-notes">
                            <div class="card card-transparent card-block card-stretch event-note mb-0">
                                <div class="card-body px-0 bukmark">
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                        <div class="quill-tool">
                                        </div>
                                    </div>
                                    <div id="quill-toolbar1">
                                        <p>Virtual Digital Marketing Course every week on Monday, Wednesday and Saturday.Virtual Digital Marketing Course every week on Monday</p>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                        <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
    <!-- Wrapper End-->

@endsection
