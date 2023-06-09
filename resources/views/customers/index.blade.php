@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Customers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">All Customers</h4>
          <button class="btn btn-success btn-sm"><a href="{{route('customers.create')}}">Create Customer</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
  <div class="card-body">
    <form action="{{ route('customer.search') }}" method="POST" class="search-form">
        @csrf
        <div class="form-group m-3">
            <div class="input-group">
                <input type="text" class="form-control" name="searchNamePhone"
                    placeholder="Name or Phone Number">
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="text-primary table-primary">
          <tr>
            <th class="text-left">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Note</th>
    @if (Auth::check())
    @if (Auth::user()->hasRole(['admin']))
            <th class="text-right">Actions</th>
    @endif
    @endif
          </tr>
        </thead>
        <tbody>
    @if(isset($customers))
        @foreach ($customers as $key => $customer)
            <tr>
                <td class="text-left">{{ $key + 1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->dob }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->note }}</td>
        @if (Auth::check())
        @if (Auth::user()->hasRole(['admin']))
                <td class="td-actions text-right d-flex">
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-round btn-sm">
                    <i class="fa fa-pen"></i>
                </a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-round btn-sm">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
                </td>
        @endif
        @endif
            </tr>
          @endforeach
          @else
        <tr>
            <td colspan="2">No customer found.</td>
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
