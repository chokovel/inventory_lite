@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Products Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3  float-right">
      <div class="d-flex justify-content-between  float-right">
          {{-- <h4 class="card-title mb-3 me-3">Create Product</h4> --}}
          <button class="btn btn-info btn-sm"><a href="{{'/products'}}">Go to Products</a></button>
      </div>
    </div>

    {{-- ............ --}}
<div class="container">
@php
    echo var_dump($errors)
@endphp
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h3 class="m-0">Create Product</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="product-name" class="form-label">Product Name</label>
                <input type="text" id="product-name" name="product-name" class="form-control">
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" id="price" name="price" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="note" class="form-label">Note</label>
                <textarea id="note" name="note" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="size" class="form-label">Size</label>
                    <select id="size" name="size[]" class="form-select">
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="color" class="form-label">Color</label>
                    <select id="color" name="color[]" class="form-select">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" id="quantity" name="quantity[]" class="form-control">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="form-label">Action</label>
                    <button type="button" id="add-section" class="btn btn-primary">Add Section</button>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="section-list">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-4">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </div>
</form>
    </div>
  </div>
</div>



<!-- end main content section -->
</div>
@endsection
