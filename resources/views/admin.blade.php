@extends('layouts.welcome')
@section('content')
    <div class="container-fluid p-4">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold">Blog CMS </h1>
                    </div>
                    <div>
                        <a href="{{ route('newBlog') }}" class="btn btn-primary me-2">Create a Blog</a>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alertDashboard alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <div>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- card -->
                <div class="card">
                    <!-- table -->
                    <div class="table-responsive overflow-y-hidden">
                        <table class="table mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" class=" border-top-0">Blog Id</th>
                                    <th scope="col" class=" border-top-0">Title</th>
                                    <th scope="col" class=" border-top-0">Start Date</th>
                                    <th scope="col" class=" border-top-0">End Date</th>
                                    <th scope="col" class=" border-top-0">Active</th>
                                    <th scope="col" class=" border-top-0">Image</th>
                                    <th scope="col" class=" border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogArr as $blog)
                                    <tr>
                                        <td class="align-middle ">
                                            {{ $blog['id'] }}
                                        </td>
                                        <td class="align-middle ">
                                            {{ $blog['title'] }}

                                        </td>
                                        <td class="align-middle ">
                                            {{ $blog['start_date'] }}
                                        </td>
                                        <td class="align-middle ">
                                            {{ $blog['end_date'] }}
                                        </td>
                                        <td class="align-middle ">
                                            @if ($blog['is_active'] == '1')
                                                <span class="badge bg-light-success text-dark-success">Active</span>
                                            @else
                                                <span class="badge bg-light-danger text-dark-danger">Disable</span>
                                            @endif
                                        </td>
                                        <td class="align-middle ">

                                        </td>
                                        <td class="text-muted align-middle border-top-0 text-end">
                                             <a class="btn btn-sm btn-info" href="{{route('updateBlog',$blog['id'])}}"><i
                                                            class="fe fe-edit dropdown-item-icon"></i>Update</a>

                                                    <a class="btn btn-sm btn-danger" href="{{route('deleteBlog',$blog['id'])}}"><i
                                                            class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
