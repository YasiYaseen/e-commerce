@extends('admin.layout.master')
@section('content')
    <style>
        .card-header::after {
            content: unset;
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products ({{$products->total()}})</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
            @if (session('message'))
                <div class="text-success">
                    {{ session('message') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Products Table</h3>
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$loop->index+$products->firstItem()}}.</td>
                                            <td><img src="@if($product->image)
                                                {{asset('storage/images/'.$product->image)}}
                                            @endif" alt="img" width="50" height="50"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status_text}}</td>
                                            <td><a href="{{route('admin.product.edit',encrypt($product->id))}}" class="btn btn-info me-1"  >Edit</a>
                                                <a href="{{route('admin.product.delete',encrypt($product->id))}}" class="btn btn-danger ">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer clearfix d-flex justify-content-center">
                            {{$products->links()}}
                            {{-- <ul class="pagination pagination-sm m-0 ml-auto mr-auto">
                                <li class="page-item"><a class="page-link" href="{{$products->previousPageUrl()}}">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link active" href="{{$products->url($products->lastPage())}}">{{$products->lastPage()}}</a></li>

                                <li class="page-item"><a class="page-link" href="{{$products->nextPageUrl()}}">&raquo;</a></li>
                            </ul> --}}
                        </div>
                    </div>
                    <!-- /.card -->


                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
