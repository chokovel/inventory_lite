@extends('layouts.homehead')

@section('content')

    <div x-data="returns">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Returns Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                <button class="btn btn-success btn-sm"><a href="{{ '/sales' }}">Goto Sales</a></button>
            </div>
        </div>
        {{-- ............ --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('returns.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchName" placeholder="Product or Customer Name">
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
                        <thead class="text-primary">
                            <tr>
                                <th class="text-left">Transaction Id/Date/Staff</th>
                                <th>Customer Name</th>
                                <th>Product/Color/Size</th>
                                <th>Qty/Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($results))
                                @foreach ($results as $return)
                                    <tr>
                                        <td class="text-left">
                                            {{ $return->id }}<br>{{ $return->created_at }}<br>{{ $return->user ? $return->user->id : '' }}
                                        </td>
                                        <td>{{ $return->saleCart->customer->name ?? 'N/A' }}</td>
                                        <td>
                                            {{ $return->saleCart->productColor->product->product_name }}<br>
                                            {{ $return->saleCart->productColor->color->name }}<br>
                                            {{ $return->saleCart->productColor->size->name }}
                                        </td>
                                        <td>{{ $return->quantity }}<br>{{ $return->quantity * $return->saleCart->productColor->product->price }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No returns found.</td>
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
