@extends('partials.app')
@section('title', 'Category')
@section('main-content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Category</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Category</h4>
                    <p class="mb-30">Category</p>
                </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                @include('notification')

                <div class="mb-30">
                    <a href="{{ route('admin.addCategoryView') }}" class="float-right btn btn-success btn-sm my-3 mx-2"><i
                            class="dw dw-add-user"></i> Add New Category</a>
                    <div class="pt-20 pb-20 table-responsive">
                        <table class="checkbox-datatable table nowrap table-hover" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="dt-checkbox">
                                            <input type="checkbox" name="select_all" value="1" id="master">
                                            <span class="dt-checkbox-label"></span>
                                        </div>
                                    </th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $row)
                                    <tr>
                                        <td>
                                            <div class="dt-checkbox">
                                                <input type="checkbox" name="select_all" value="1" class="sub_chk">
                                                <span class="dt-checkbox-label"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="employee" data-id="{{ $row->id }}"><img
                                                    src="{{ asset('admin/src/categoryImages') }}/{{ $row->image != null ? $row->image : 'dummy.png' }}"
                                                    alt="" class="img-fluid img-rounded" width="48"
                                                    height="48"></span>
                                        </td>
                                        <td>{{ucfirst( $row->name)}}</td>

                                        <td>{{ $row->slug }}</td>

                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="empStatus" data-id="{{ $row->id }}"
                                                {{ $row->status == 1 ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                                        Edit</a>

                                                    <form action="#" id="catDelete{{$row->id}}" method="get">
                                                        <a class="dropdown-item catDelete" data-id=""
                                                            href="javascript:void(0)"><i class="dw dw-delete-3"></i>
                                                            Delete</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @push('script')
        <script>

                $('#categoryTable').DataTable();

                $(document).on('click', '.catDelete', function(e) {
                    e.preventDefault();
                    empId = $(this).data('id')
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#catDelete${empId}`).submit()
                        }
                    })
                })
        </script>
    @endpush
