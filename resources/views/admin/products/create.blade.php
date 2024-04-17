@extends('admin.layouts.app')

@section('CreateProduct')

<div class="container">
    <!-- display errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container-fluid my-2">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2>Add Products</h2>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('products.index') }}">Back</a> 
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<section class="content">
    <form action="{{ route('products.store') }}" method="post" enctype='multipart/form-data' name="productForm" id="productForm">
       
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Media</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="74" rows="7" class="summernote" placeholder="Description"></textarea>
                                    </div>
                                    @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            {{-- <h2 class="h4 mb-3">Pricing</h2> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                        @error('compare_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <p class="text-muted mt-3">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product Options</h2><hr>
                            <br>
                            <div class="mb-3">
                                <h2 class="h5 mb-3">Product status</h2>
                                
                                <select name="status" id="status" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select><br>
                                
                                <h2 class="h5 mb-3">Featured product</h2>
                                <select name="is_featured" id="is_featured" class="form-control mb-3">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                                
                                <h2 class="h5 mb-3">Product category</h2>
                                <div class="mb-3">
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $categoryId => $categoryName)
                                            <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><br><br> 
     
                            <div class="">
                                <h2 class="h4 mb-3">Product Options</h2><hr><br>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label> 
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Stock Keeping Unit">
                                        @error('sku')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                @error('barcode')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
</section>
@endsection
