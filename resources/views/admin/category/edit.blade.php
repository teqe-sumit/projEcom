@extends('admin.layouts.app')

@section('categoryCreate')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.list') }}">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            {{-- <form action="{{ route('categories.update', ['categoryId' => $category->id]) }}" method="post" id="categoryForm" name="categoryForm"> --}}
                {{-- <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" id="categoryForm" name="categoryForm"> --}}
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">


        

            {{-- <form action="{{ route('categories.update', ['categoryId' => $category->id]) }}" method="post" id="categoryForm" name="categoryForm"> --}}
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-control"
                                        placeholder="Slug">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ ($category->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ ($category->status == 0) ? 'selected' : '' }} value="0">Blocked</option>    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="leave">Leave</label>
                                    <input type="text" name="leave" id="leave" class="form-control"
                                        placeholder="Leave It Blank">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection
