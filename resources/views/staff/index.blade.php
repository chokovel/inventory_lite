@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Staff Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">All Staff</h4>
          <button class="btn btn-success btn-sm"><a href="{{route('staff.create')}}">Create Staff</a></button>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-primary">
          <tr>
            <th class="text-left">#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
    @if(isset($staff))
        @foreach ($staff as $staf)
            <tr>
                <td class="text-left">{{ $staf->id }}</td>
                <td>{{ $staf->name }}</td>
                <td>{{ $staf->role }}</td>
                <td>{{ $staf->phone }}</td>
                <td>{{ $staf->email }}</td>
                <td>{{ $staf->address }}</td>
                <td class="td-actions text-right d-flex">
                <a href="{{ route('staff.edit', $staf->id) }}" class="btn btn-primary btn-round btn-sm">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('staff.destroy', $staf->id) }}" method="post" style="display: inline-block;">
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
            <td colspan="2">No user found.</td>
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