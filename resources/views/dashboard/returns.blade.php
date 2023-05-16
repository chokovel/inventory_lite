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
          <h4 class="card-title mb-3 me-3">All Returns</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/addreturns'}}">Create Return</a></button>
      </div>
    </div>

    {{-- ............ --}}

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
    @if(isset($returns))
        @foreach ($returns as $return)
            <tr>
                <td class="text-left">{{ $return->id }}<br>{{ $return->created_at }}<br>{{ $return->user->id }}</td>
                <td>{{ $return->customer->name }}</td>
                <td>{{ $return->product }}<br>{{ $return->color }}<br>{{ $return->size }}</td>
                <td>{{ $return->qty }}<br>{{ $return->total }}</td>
                <td class="td-actions text-right d-flex">
                <a href="{{ route('returns.edit', $return->id) }}" class="btn btn-primary btn-round btn-sm">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('returns.destroy', $return->id) }}" method="post" style="display: inline-block;">
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
