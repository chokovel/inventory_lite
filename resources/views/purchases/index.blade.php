@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Purchases Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-3 me-3">All Purchases</h4>
                <button class="btn btn-success btn-sm"><a href="{{ route('purchases.create') }}">Create Purchase</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <div class="card">
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
            <div class="card-body">
                <form action="{{ route('purchases.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchName" placeholder="Product or Supplier Name">
                            <label for="dateRange" class="sr-only">Date Range:</label>
                            <input type="date" class="form-control" name="startDate">
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control" name="endDate">
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Size</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Note</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($purchases))
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td class="text-left">{{ $purchase->id }}</td>
                                        <td>
                                            @if ($purchase->image)
                                                <img class="rounded" src="{{ asset(str_replace('public', 'storage', $purchase->image)) }}" style="width:50px" alt="Product Image">
                                            @else
                                                <img class="rounded" src="https://cdn-icons-png.flaticon.com/512/1170/1170628.png" style="width:50px" alt="Default Image">
                                            @endif
                                        </td>
                                        <td>{{ $purchase->product_name }}</td>
                                        <td>₦{{ $purchase->price }}</td>
                                        <td>{{ $purchase->quantity }}</td>
                                        <td>{{ $purchase->size }}</td>
                                        <td>{{ $purchase->date }}</td>
                                        <td>{{ $purchase->supplier->name }}</td>
                                        <td>{{ $purchase->note }}</td>
                                        <td class="td-actions text-right d-flex">
                                            <a href="{{ route('purchases.edit', $purchase->id) }}"
                                                class="btn btn-primary btn-round btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post"
                                                style="display: inline-block;">
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
                                    <td colspan="2">No purchase found.</td>
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
