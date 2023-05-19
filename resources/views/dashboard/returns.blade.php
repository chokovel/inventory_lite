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
                    {{-- <th class="text-right">Actions</th> --}}
                </tr>
                </thead>
                <tbody>
                @if (isset($returns))
                @foreach ($returns as $return)
                <tr>
                    <td class="text-left">
                    {{ $return->id }}<br>{{ $return->created_at }}<br>{{ $return->user ? $return->user->id : '' }}
                    </td>
                    <td>{{ $return->customer->name }}</td>
                    <td>
                    {{ $return->productColor->product->product_name }}<br>
                    {{ $return->productColor->color->name }}<br>
                    {{ $return->productColor->size->name }}
                    </td>
                    <td>{{ $return->quantity }}<br>{{ $return->quantity * $return->productColor->product->price }}</td>
                    {{-- <td class="td-actions text-right d-flex">
                    <a href="" class="btn btn-primary btn-round btn-sm">
                        <i class="material-icons">edit</i>
                    </a>
                    <form action="" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-round btn-sm">
                        <i class="material-icons">delete</i>
                        </button>
                    </form>
                    </td> --}}
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="2">No returns found.</td>
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
