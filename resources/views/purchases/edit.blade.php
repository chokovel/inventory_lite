@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Products Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">Edit Product</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/editproduct'}}">Go to Products</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Supplier</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $purchase->product_name }}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $purchase->price }}">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $purchase->quantity }}">
    </div>
    <div class="form-group">
        <label for="size_id">Size</label>
        <select name="size_id" id="size_id" class="form-control">
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}" {{ $purchase->size_id == $size->id ? 'selected' : '' }}>
                    {{ $size->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="color_id">Color</label>
        <select name="color_id" id="color_id" class="form-control">
            @foreach ($colors as $color)
                <option value="{{ $color->id }}" {{ $purchase->color_id == $color->id ? 'selected' : '' }}>
                    {{ $color->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="supplier_id">Supplier</label>
        <select name="supplier_id" id="supplier_id" class="form-control">
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="note">Note</label>
        <textarea name="note" id="note" class="form-control">{{ $purchase->note }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Purchase</button>
</form>

  </div>
</div>

<!-- end main content section -->
</div>
@endsection
