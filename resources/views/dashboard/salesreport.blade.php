@extends('layouts.homehead')

@section('content')
    <div x-data="salereport">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Sales Report Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                {{-- <h4 class="card-title mb-3 me-3">All Salereport</h4> --}}
                <button class="btn btn-primary btn-sm"><a href="{{ '/addsales' }}">Create Sale</a></button>
            </div>
        </div>

        {{-- ............ --}}

       {{-- <form action="{{ route('salesreport.search') }}" method="POST" class="search-form">
            @csrf
            <div class="form-group m-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="searchNamePhone" placeholder="Name or Phone Number">
                    <label for="dateRange" class="sr-only">Date Range:</label>
                    <input type="date" class="form-control" name="startDate">
                    <span class="input-group-text">to</span>
                    <input type="date" class="form-control" name="endDate">
                    <input type="month" class="form-control" name="month" placeholder="Month">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form> --}}
                    <form action="" method="GET" class="search-form">
                        @csrf
                        <div class="form-group m-3">
                            <div class="input-group mb-1">
                                <input type="month" value="{{"date('m-Y')"}}" class="form-control" name="date">

                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

        <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="text-primary table-primary">
                    <tr>
                            <td colspan="3">
                                <h2 class="text-center"><strong>Sales Report</strong></h2>
                            </td>
                            <td colspan="4">
                                <h2 class="text-center"><strong>{{ date('m-Y', strtotime($thisMonth)) }}</strong></h2>
                            </td>
                        </tr>
                    <tr>
                        <th class="text-left">Id</th>
                        <th>Product Name</th>
                        <th>Total Stock</th>
                        <th>Total Sales</th>
                        <th>Total Returns</th>
                        <th>Total Amount</th>
                        {{-- <th>Date</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlyProducts as $month => $products)

                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-left"> {{ $loop->iteration }} </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->productColors->sum('quantity') }}</td>
                                    <td>{{ $product->saleCarts->sum('quantity') }}</td>
                                    <td>{{ $product->productReturns->sum('quantity') }}</td>
                                    <td>₦{{ ($product->saleCarts->sum('quantity')) * $product->price }}</td>
                                    {{-- <td>{{ $product->created_at->format('M') }}</td> --}}
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <p>No sales made in {{ $month }}.</p>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

        <!-- end main content section -->

    </div>
@endsection
