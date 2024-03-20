@extends('admin.layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Enter Details</h3>
                        </div>


                        <form action="{{ route('admin.product.saveEdit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{encrypt($product->id)}}" name="id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Product Name"
                                        value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" placeholder="Price" name="price"
                                        value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" value="{{ $product->category_id }}">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected($product->category_id==$category->id) >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control" value="{{ $product->status }}">
                                        <option @selected($product->status==1) value="1">Active</option>
                                        <option @selected($product->status==0) value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/images/' . $product->image) }}" width="200"
                                            alt="img">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_favourite"
                                        value="{{ $product->is_favourite }}" @checked($product->is_favourite=='on')>
                                    <label class="form-check-label">Is Favourite</label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>



                </div>
            </section>

        </div>
    </div>
@endsection
