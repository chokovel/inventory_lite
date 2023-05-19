@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Sales Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                {{-- <h4 class="card-title mb-3 me-3">All Sales</h4> --}}
                <button class="btn btn-success btn-sm"><a href="{{ '/addsales' }}">Create Sale</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <form class="search-form">
            <div class="form-group m-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchNamePhone" placeholder="Name or Phone Number">
                    <label for="dateRange" class="sr-only">Date Range:</label>
                    <input type="date" class="form-control" id="startDate">
                    <span class="input-group-text">to</span>
                    <input type="date" class="form-control" id="endDate">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-left">Transaction Id/Date/Staff</th>
                                <th>Customer Name</th>
                                <th>Product/Color/Size</th>
                                <th>Qty/Cost</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($sales))
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td class="text-left">
                                            {{ $sale->id }}<br>{{ $sale->created_at }}<br>{{ $sale->user ? $sale->user->name : '' }}
                                        </td>
                                        <td>{{ $sale->customer->name }}</td>
                                        <td>
                                            {{ $sale->productColor->product->product_name }}<br>
                                            {{ $sale->productColor->color->name }}<br>
                                            {{ $sale->productColor->size->name }}
                                        </td>
                                        <td>{{ $sale->quantity }}<br>{{ $sale->quantity * $sale->productColor->product->price }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ '/addreturns' }}" class="btn btn-primary btn-round btn-sm">
                                                <i class="material-icons">Return</i>
                                            </a>
                                            {{-- <form action="" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-round btn-sm">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No sales found.</td>
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
