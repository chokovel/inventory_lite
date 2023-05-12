@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Product Supplier Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">All Supplier</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/addsupplier'}}">Create Supplier</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-primary">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Address</th>
            <th>Note</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    @if(isset($suppliers))
        @foreach ($suppliers as $supplier)
            <tr>
                <td class="text-left">{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->country }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->note }}</td>
                <td class="td-actions text-right d-flex">
                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary btn-round btn-sm">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-round btn-sm">
                    <i class="material-icons">delete</i>
                    </button>
                </form>
                </td>
            </tr>
          @endforeach
          @else
        <tr>
            <td colspan="2">No supplier found.</td>
        </tr>
    @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- end main content section -->
</div>
@endsection