@extends('layouts.homehead')

@section('content')
                    <!-- start main content section -->
                    <div x-data="basic">
                <div class="panel">
                    <h5 class="text-lg font-semibold dark:text-white-light">Staff</h5>
                    <h5 class="text-lg font-semibold dark:text-white-light">
                        <a href="{{'/adduser'}}">Add Staff</a>
                    </h5>
                    <div class="mb-5">
                                    <form>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="first_name" placeholder="Enter First Name" class="form-input" />
                                            <input type="text" name="last_name" placeholder="Enter Last Name" class="form-input" />
                                        </div>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="email" placeholder="Enter Email" class="form-input" />
                                            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-input" />
                                        </div>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="password" placeholder="Enter Password" class="form-input" />
                                            <input type="text" name="password" placeholder="Re-enter Password" class="form-input" />
                                        </div>
                                        <button type="button" class="btn btn-primary mt-6">Submit</button>
                                    </form>
                                </div>
                                </div>
                                </div>
                    <!-- end main content section -->

@endsection
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
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" required autofocus>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <input id="role" type="text" class="form-control" name="role" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" class="form-control" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" type="text" class="form-control" name="address" required>
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
</div>


<!-- end main content section -->
</div>
@endsection
