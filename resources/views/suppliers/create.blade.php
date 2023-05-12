@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Suppliers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3  float-right">
      <div class="d-flex justify-content-between  float-right">
          <button class="btn btn-info btn-sm"><a href="{{'/suppliers'}}">Go to Suppliers</a></button>
      </div>
    </div>

    {{-- ............ --}}
<div class="card col-8" style="margin:0 auto;">
  <div class="card-body">
    <h5 class="card-title">Create Supplier</h5>
    <form action="{{ route('suppliers.store') }}" method="post">

      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Enter supplier name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Enter supplier email">
      </div>
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
