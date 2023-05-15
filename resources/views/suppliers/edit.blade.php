@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Suppliers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">Edit Supplier</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/editproduct'}}">Go to Suppliers</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Supplier</h4>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('suppliers.update', $supplier) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label class="bmd-label-floating">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $supplier->name }}">
        <input type="text" name="email" class="form-control" value="{{ $supplier->email }}">
        <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}">
        <input type="text" name="country" class="form-control" value="{{ $supplier->country }}">
        <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">
        <input type="text" name="note" class="form-control" value="{{ $supplier->note }}">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>

<!-- end main content section -->
</div>
@endsection
