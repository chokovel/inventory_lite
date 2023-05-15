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
                <h4 class="card-title mb-3 me-3">All Products</h4>
                <button class="btn btn-success btn-sm"><a href="{{ route('products.create') }}">Create Products</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}" class="card-img-top"
                                alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
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
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <img src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/L/N/121271_1611814481.jpg"
                            class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <p class="card-text">Colors: Green, Yellow</p>
                            <p class="card-text">Sizes: Large, XL</p>
                            <p class="card-text">Qty: 100</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <img src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/L/N/121271_1611814481.jpg"
                            class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product 3</h5>
                            <p class="card-text">Colors: Black, White</p>
                            <p class="card-text">Sizes: Small, Medium, Large</p>
                            <p class="card-text">Qty: 100</p>
                            {{-- <input type="number" class="form-control" min="1" value="1"> --}}
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <img src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/L/N/121271_1611814481.jpg"
                class="card-img-top" alt="Product 4">
            <div class="card-body">
                <h5 class="card-title">Product 4</h5>
                <p class="card-text">Colors: Pink, Purple</p>
                <p class="card-text">Sizes: Medium, Large</p>
                <p class="card-text">Qty: 100</p>

                <a href="#" class="btn btn-primary">delete</a>
            </div>
        </div>
    </div> --}}

    </div>
    </div>


    <!-- end main content section -->
    </div>
@endsection
