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
                <button class="btn btn-success btn-sm"><a href="{{ route('products.create') }}">Create Products</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <div class="container">
            <div class="row">
          <form action="" style="width: 100%">
                <div class="center m-3">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search product"
                            class="form-control">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}" class="card-img-top"
                                alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">Price:
                                        {{ $product->price }}
                                </p>
                                <p class="card-text">Colors:
                                    @foreach ($product->productColors as $productColor)
                                        {{ $productColor->color->name }},
                                    @endforeach
                                </p>
                                <p class="card-text">Sizes:
                                    @foreach ($product->productColors as $productColor)
                                        {{ $productColor->size->name }},
                                    @endforeach

                                </p>
                                <p class="card-text">Qty:
                                    @foreach ($product->productColors as $productColor)
                                        {{ $productColor->quantity }},
                                    @endforeach
                                </p>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Update Stock</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
