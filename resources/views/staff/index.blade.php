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
        @if (Auth::check())
        @if (Auth::user()->hasRole(['admin']))
          <button class="btn btn-success btn-sm"><a href="{{route('staff.create')}}">Create Staff</a></button>
        @endif
        @endif
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
    <form action="{{ route('staff.search') }}" method="POST" class="search-form">
            @csrf
            <div class="form-group m-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="searchNamePhone" placeholder="Name, Phone Number, or role">
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
            <th>Name</th>
        @if (Auth::check())
        @if (Auth::user()->hasRole(['admin']))
            <th>Role</th>
        @endif
        @endif
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
        @if (Auth::check())
        @if (Auth::user()->hasRole(['admin']))
            <th class="text-right">Actions</th>
        @endif
        @endif
          </tr>
        </thead>
        <tbody>
    @if(isset($staff))
        @foreach ($staff as $key => $staf)
            <tr>
                <td class="text-left">{{ $key + 1 }}</td>
                <td>{{ $staf->name }}</td>
            @if (Auth::check())
            @if (Auth::user()->hasRole(['admin']))
                <td>
                    @if ($staf->roles->isNotEmpty())
                        @foreach ($staf->roles as $role)
                            {{ $role->name }}<br>
                        @endforeach
                    @else
                        N/A
                    @endif
                </td>
            @endif
            @endif
                <td>{{ $staf->phone }}</td>
                <td>{{ $staf->email }}</td>
                <td>{{ $staf->address }}</td>
            @if (Auth::check())
            @if (Auth::user()->hasRole(['admin']))
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
            @endif
            @endif
            </tr>
          @endforeach
          @else
        <tr>
            <td colspan="7">No user found.</td>
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
