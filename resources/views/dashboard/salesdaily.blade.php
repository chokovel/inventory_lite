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
                <button class="btn btn-warning btn-sm"><a href="{{ '/addsales' }}">Sales</a></button>
                <button class="btn btn-success btn-sm"><a href="{{ '/sales' }}">Monthly Sales List</a></button>
            </div>
        </div>

        {{-- ............ --}}

        <div class="card">
            <div class="card-body">
                <form action="" method="GET" class="search-form">
                    @csrf
                    <div class="form-group m-3">
                        <div class="input-group mb-1">
                            {{-- <input type="text" class="form-control" name="searchName"
                                placeholder="Product or Customer Name"> --}}
                            <input type="date" value="{{"date('Y-m-d')"}}" class="form-control" name="date">

                            <button type="submit" class="btn btn-primary">
                                <i class="material-icons fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
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
                            @if(isset($sales))
                                <tr>
                                    <td colspan="3">
                                        <h2 class="text-center"><strong>Daily Sales</strong></h2>
                                    </td>
                                    <td colspan="4">
                                        <h2 class="text-center"><strong>{{ $todayDate }}</strong></h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <h2 class="text-center"><strong> Total: {{ $total }}</strong></h2>
                                    </td>
                                </tr>

                                @foreach ($sales as $sale)
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
