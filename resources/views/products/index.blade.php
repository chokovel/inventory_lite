@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Products Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between mb-3">
                {{-- <h4 class="card-title mb-3 me-3">All Products</h4> --}}
                <button class="btn btn-primary btn-sm">
                    <a href="{{ route('products.create') }}">New Product</a>
                </button>
                <button class="btn btn-warning btn-sm">
                    <a href="{{ '/addsales' }}">Sales</a>
                </button>
            </div>

            {{-- ............ --}}

             {{-- <form action="" style="width: 100%">
                    <div class="center m-3">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search product" class="form-control">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}
        <div class="card">
            <div class="card-body">

                <form action="{{ route('products.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchNamePhone" placeholder="Name or Price">
                            <label for="dateRange" class="sr-only">Date Range:</label>
                            <input type="date" class="form-control" name="startDate">
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control" name="endDate">
                            <button type="submit" class="btn btn-primary">
                                <i class="material-icons fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Image</th>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Note</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key =>  $product)
                            @foreach ($product->productColors as $productColor)
                                <tr>
                                    {{-- @if ($loop->first)
                                        <td rowspan="{{ $product->count() }}">{{ $key + 1 }}</td>
                                    @endif --}}
                                    @if ($loop->first)
                                        <td rowspan="{{ $product->productColors->count() }}">
                                            <img class="rounded" src="{{ asset(str_replace('public', 'storage', $product->image)) }}" alt="Product Image" width="75">
                                        </td>
                                        <td rowspan="{{ $product->productColors->count() }}">{{ $product->product_name }}</td>
                                    @endif

                                        <td>{{ $productColor->color->name }}</td>
                                        <td>{{ $productColor->size->name }}</td>
                                        <td>{{ $productColor->quantity }}</td>

                                    @if ($loop->first)
                                        <td rowspan="{{ $product->productColors->count() }}">{{ $product->note }}</td>
                                    @endif

                                    @if ($loop->first)
                                        <td rowspan={{ $product->productColors->count() }}>
                                            <a href="{{ route('products.edit', $product->id) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

