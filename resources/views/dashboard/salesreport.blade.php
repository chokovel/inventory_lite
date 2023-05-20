@extends('layouts.homehead')

@section('content')
    <div x-data="salereport">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Salereport Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                {{-- <h4 class="card-title mb-3 me-3">All Salereport</h4> --}}
                <button class="btn btn-success btn-sm"><a href="{{ '/addsalereport' }}">Create Sale</a></button>
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
                                <th class="text-left">Id</th>
                                <th>Product Name</th>
                                <th>Current Bal.</th>
                                <th>Total Sales</th>
                                <th>Total Returns</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-left"> {{ $product->id }} </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->productColors->sum('quantity') * $product->price }} </td>
                                        <td>{{ $product->saleCarts->sum('quantity') * $product->price }} </td>
                                        <td>{{ $product->productReturns->sum('quantity') * $product->price }}</td>
                                        <td>{{ ($product->saleCarts->sum('quantity') + $product->productReturns->sum('quantity')) * $product->price }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No salereport found.</td>
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
