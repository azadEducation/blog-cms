@extends('layouts.welcome')
@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Page header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">Add New Blog</h1>
                    </div>
                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-white">Back to All Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card border-0 mb-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4 class="mb-0">Create Blog</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="mt-4">
                            <form action="{{ route('blogForm') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="blogSubmit()">
                                @csrf
                               
                                <!-- Form -->
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label for="BlogTitle" class="form-label">Title</label>
                                        <input type="text" name="title" id="BlogTitle" class="form-control text-dark"
                                            placeholder="Blog Title" >
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="selectStartDate" class="form-label">Start Date</label>
                                        <input oninput="dateCheck()" type="text"  name="start_date"
                                            id="selectStartDate" class="form-control text-dark flatpickr flatpickr-input"
                                            placeholder="Select Start Date" readonly="readonly">
                                        @error('start_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="selectEndDate" class="form-label">End Date</label>
                                        <input oninput="dateCheck()" type="text" name="end_date"
                                            id="selectEndDate" class="form-control text-dark flatpickr flatpickr-input"
                                            placeholder="Select End Date" readonly="readonly">
                                        @error('end_date')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="badge dateErr text-danger d-none">Please Select Correct Date Formate</div>
                                    </div>
                                    <div class="mb-3 col-12 col-md-4">
                                        <label class="form-label">Select Blog Status </label>
                                        <select name="is_active" class="form-control" data-width="100%">
                                            <option value="1" >Enable
                                            </option>
                                            <option value="0">Disable
                                            </option>
                                        </select>
                                        @error('is_active')
                                            <div class="alert alert-danger">Blog Status Required</div>
                                        @enderror
                                    </div>
                                </div>
                                <textarea name="description" id="editorHtml" hidden></textarea>
                                <div id="editor" style="height: 200px" class="mb-4">
                                   
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="blog_img" class="form-label">Select Blog Image</label>
                                    <input type="file" id="blog_img" class="form-control" name="image" />
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="submitButton btn btn-primary"> Create </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
    <script>
        function blogSubmit() {
            var htmlDesc = `${$(".ql-editor").html()}`;
            $("#editorHtml").val(htmlDesc);
        }

        function dateCheck() {
            var startDate = new Date($("#selectStartDate").val());
            var endDate = new Date($("#selectEndDate").val());
            if (startDate == endDate || startDate > endDate) {
                $(".dateErr").removeClass('d-none');
                $(".submitButton").prop('disabled',true);
            }
            else{
                $(".dateErr").addClass('d-none');
                $(".submitButton").prop('disabled',false);

            }   
        }
    </script>
@stop
