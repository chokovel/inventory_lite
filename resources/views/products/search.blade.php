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
            <div class="d-flex justify-content-between">
                {{-- <h4 class="card-title mb-3 me-3">All Products</h4> --}}
                <button class="btn btn-success btn-sm">
                    <a href="{{ '/products' }}">Products</a>
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
                <form action="{{ route('products.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchNamePhone" placeholder="Name,color,size,price">
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
                    <thead class="text-primary table-primary">
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Image</th>
                            <th>Product <br> Price</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Note</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $key =>  $product)
                            @foreach ($product->productColors as $productColor)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $product->productColors->count() }}">
                                            <img class="rounded" src="{{ asset(str_replace('public', 'storage', $product->image)) }}" alt="Product Image" width="50">
                                        </td>
                                        <td rowspan="{{ $product->productColors->count() }}">{{ $product->product_name }} <br> {{$product->price}}</td>
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
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No results found.</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

