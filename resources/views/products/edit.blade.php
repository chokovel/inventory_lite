@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Update Products Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3  float-right">
            <div class="d-flex justify-content-between  float-right">
                <button class="btn btn-info btn-sm"><a href="{{ '/products' }}">Go to Products</a></button>
            </div>
        </div>

        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="m-0">Update Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product-name" class="form-label">Product Name</label>
                                    <input type="text" id="product-name" name="product-name" class="form-control"
                                        value="{{ $product->product_name }}">
                                    @error('product-name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category" class="form-label">Category</label>
                                    <select id="category" name="category" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₦</span>
                                        <input type="number" id="price" name="price" class="form-control"
                                            value="{{ $product->price }}">
                                    </div>
                                    @error('price')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if ($product->image)
                                        <div class="mt-2">
                                            <img class="rounded" src="{{ asset('storage/' . str_replace('public/', '', $product->image)) }}"
                                                alt="Product Image" class="img-thumbnail" style="max-width: 75px;">
                                        </div>
                                    @endif
                                    @error('image')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea id="note" name="note" class="form-control">{{ $product->note }}</textarea>
                                    @error('note')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="color" class="form-label">Color</label>
                                        <select id="color" name="" class="form-select">
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('color[]')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="size" class="form-label">Size</label>
                                        <select id="size" name="" class="form-select">
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('size[]')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" id="quantity" name="" class="form-control">
                                        @error('quantity[]')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">Action</label>
                                        <button type="button" id="add-section" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12" style="overflow: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody id="section-list">
                                        {{-- Existing product variations --}}
                                        @foreach ($product->productColors as $variation)
                                            <tr>
                                                <td>
                                                    <select name="color[]" class="form-select">
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}"
                                                                {{ $color->id == $variation->color_id ? 'selected' : '' }}>
                                                                {{ $color->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('color[]')
                                                        {{ $message }}
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select name="size[]" class="form-select">
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}"
                                                                {{ $size->id == $variation->size_id ? 'selected' : '' }}>
                                                                {{ $size->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('size[]')
                                                        {{ $message }}
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity[]" class="form-control"
                                                        value="{{ $variation->quantity }}">
                                                    @error('quantity[]')
                                                        {{ $message }}
                                                    @enderror
                                                </td>
                                                {{-- <td>
                                                    <button type="button" class="btn btn-danger">Remove</button>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
