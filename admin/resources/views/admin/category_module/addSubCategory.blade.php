@extends('partials.app')
@section('title', 'Add Sub Category')
@section('main-content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Add Sub Category</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Sub Category Details Forms</h4>
                    <p class="mb-30">Add Sub Category</p>
                </div>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Sub Category Name <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="cat_name" type="text" id="categoryName"
                            placeholder="Category Name" value="{{ old('cat_name') }}" autocomplete="off" required>
                        @error('cat_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Slug <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="cat_slug" type="text" id="cat_slug"
                            placeholder="Category Slug" value="{{ old('cat_slug') }}" autocomplete="off">
                        @error('cat_slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Category Image <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <input type="file" name="cat_image" class="form-control" accept=".jpeg,.png,.jpg,.svg,.gif">
                        @error('cat_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                {{-- <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Select Gender <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="gender" required>
                            <option selected="">Choose...</option>
                            <option value="Male" @if (old('gender') == 'Male') {{ 'selected' }} @endif>Male
                            </option>
                            <option value="Female" @if (old('gender') == 'Female') {{ 'selected' }} @endif>Female
                            </option>
                            <option value="Others" @if (old('gender') == 'Others') {{ 'selected' }} @endif>Others
                            </option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-10 d-flex">
                        <div class="custom-control custom-radio mb-5 mr-20">
                            <input type="radio" id="customRadio4" name="status" class="custom-control-input" checked>
                            <label class="custom-control-label weight-400" for="customRadio4">Active</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio5" name="status" class="custom-control-input">
                            <label class="custom-control-label weight-400" for="customRadio5">Draft</label>
                        </div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr>

                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">SEO Section</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Meta Title </label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="meta_title" type="text" placeholder="Meta Title"
                            value="{{ old('meta_title') }}" autocomplete="off" required>
                        @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Meta Desc </label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="meta_desc" type="text" placeholder="Meta Description"
                            value="{{ old('meta_desc') }}" autocomplete="off" required>
                        @error('meta_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-10 col-md-10 col-form-label"> </label>
                    <div class="col-sm-2 col-md-2">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                </div>


            </form>

            <!-- Default Basic Forms End -->

        </div>
    @endsection

    @push('script')
        <script>
            $(document).ready(function() {
                $('#categoryName').on('keyup', (e) => {
                    let category = $(e.target).val()
                    let slug = convertToSlug(category)
                    $('#cat_slug').val(slug)
                })
            });

            function convertToSlug(Text) {
                return Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
            }
        </script>
    @endpush
