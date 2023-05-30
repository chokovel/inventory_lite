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
          <button class="btn btn-success btn-sm"><a href="{{'/adduser'}}">Create User</a></button>
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
        <form method="POST" action="{{ route('staff.update', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required autofocus autocomplete="phone">
            </div>

            <div class="form-group">
                <label for="dob">DOB</label>
                <input id="dob" type="date" class="form-control" name="dob" value="{{ $user->dob }}" required autocomplete="dob">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required autocomplete="address">
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" class="form-control" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update User</button>
        </form>
    </div>
</div>


<!-- end main content section -->
</div>
@endsection
