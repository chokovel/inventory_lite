@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Purchase Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3  float-right">
      <div class="d-flex justify-content-between  float-right">
          <button class="btn btn-info btn-sm"><a href="{{'/suppliers'}}">Go to Purchase</a></button>
      </div>
    </div>

    {{-- ............ --}}
<div class="card col-8" style="margin:0 auto;">
  <div class="card-body">
    <h5 class="card-title">Create Purchase</h5>
    <form action="{{ route('purchases.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control">
    </div>
    <div class="form-group">
        <label for="size_id">Size</label>
        <select name="size_id" id="size_id" class="form-control">
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="color_id">Color</label>
        <select name="color_id" id="color_id" class="form-control">
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="supplier_id">Supplier</label>
        <select name="supplier_id" id="supplier_id" class="form-control">
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="note">Note</label>
        <textarea name="note" id="note" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Purchase</button>
</form>

      <div class="form-group">
        <label for="phone">Name</label>
        <input type="text" id="phone" name="phone" class="form-control mb-4" placeholder="Enter supplier phone">
      </div>
      <div class="form-group">
        <label for="country">country</label>
        <input type="text" id="country" name="country" class="form-control mb-4" placeholder="Enter supplier country">
      </div>
      <div class="form-group">
        <label for="address">address</label>
        <input type="text" id="address" name="address" class="form-control mb-4" placeholder="Enter supplier address">
      </div>
      <div class="form-group">
        <label for="note">note</label>
        <input type="text" id="note" name="note" class="form-control mb-4" placeholder="Enter supplier note">
      </div>

      <button class="btn btn-info btn-block my-4" type="submit">Create</button>

    </form>
  </div>
</div>




<!-- end main content section -->
</div>
@endsection
