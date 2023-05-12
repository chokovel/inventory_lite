@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Product Purchase Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">Purchase Details</h4>
          <button class="btn btn-success btn-sm"><a href="{{route('purchases.create')}}">Create Purchase</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title m-0">Purchase List</h5>
    </div>
    <div class="card-body">
          @if ($purchases->isEmpty())
            <p>No purchases found.</p>
          @else
            <table class="table">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Supplier</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($purchases as $purchase)
                  <tr>
                    <td>{{ $purchase->product_name }}</td>
                    <td>{{ $purchase->price }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->size->name }}</td>
                    <td>{{ $purchase->color->name }}</td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>
                      <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
</div>




<!-- end main content section -->
</div>
@endsection
