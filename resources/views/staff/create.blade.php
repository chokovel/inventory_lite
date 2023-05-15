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
    <div class="card-body">
        <form method="POST" action="{{ route('staff.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" class="form-control" name="phone" required autofocus autocomplete="phone">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" required autocomplete="username">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add User</button>
        </form>
    </div>
</div>


<!-- end main content section -->
</div>
@endsection
