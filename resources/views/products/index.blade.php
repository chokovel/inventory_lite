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
                    <a href="{{ route('products.create') }}">Create Products</a>
                </button>
            </div>

            {{-- ............ --}}

             <form action="" style="width: 100%">
                    <div class="center m-3">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search product" class="form-control">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
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
                        @foreach ($products as $product)
                            @foreach ($product->productColors as $productColor)
                                <tr>
                                    {{-- <td>{{ $product->id }}</td> --}}
                                    @if ($loop->first)
                                        <td rowspan="{{ $product->productColors->count() }}">
                                            <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}" alt="Product Image" width="50">
                                        </td>
                                        <td rowspan="{{ $product->productColors->count() }}">{{ $product->product_name }}</td>
                                    @endif
                                    <td>{{ $productColor->color->name }}</td>
                                    <td>{{ $productColor->size->name }}</td>
                                    <td>{{ $productColor->quantity }}</td>
                                    @if ($loop->first)
                                        <td rowspan="{{ $product->productColors->count() }}">{{ $product->note }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

