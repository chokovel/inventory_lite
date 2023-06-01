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
                <button class="btn btn-primary btn-sm"><a href="{{ '/addsales' }}">Create Sales</a></button>
                <button class="btn btn-warning btn-sm"><a href="{{ '/sales' }}">Sales List</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <div class="card">
            <div class="card-body">
                <form action="{{ route('sales.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" name="searchName"
                                placeholder="Product/ID/Customer">
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
                    <table class="table">
                        <thead class="text-primary table-primary">
                             <tr>
                                <td colspan="7">
                                    <h2 class="text-center"><strong>Grand Total: {{ $total }}</strong></h2>
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th class="text-left">Transaction Id/Date/Staff</th>
                                <th>Customer Name</th>
                                <th>Product/Color/Size</th>
                                <th>Qty/Cost</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($results))
                                @foreach ($results as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-left">
                                            <em>
                                            {{ $sale->transaction ? $sale->transaction->transaction_id : '' }}</em><br>{{ $sale->created_at }}<br>{{ $sale->user ? $sale->user->name : '' }}
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
                                            <a href="{{ route('returns.sales', ['salesId' => $sale->id]) }}"
                                                class="btn btn-primary btn-round btn-sm">
                                                <i class="material-icons">Return</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No sales found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end main content section -->

        {{-- <div class="m-3">
            {{$results->links() }}
        </div> --}}
    </div>
@endsection
