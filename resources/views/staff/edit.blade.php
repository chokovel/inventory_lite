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
        <form method="POST" action="{{ route('staff.update', $staff->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', optional($staff)->name)" required autofocus autocomplete="name" />
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', optional($staff)->phone)" required autofocus autocomplete="phone" />
            </div>

            <div class="form-group">
                <label for="dob">DOB</label>
                <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob', optional($staff)->dob)" required autocomplete="dob" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', optional($staff)->email)" required autocomplete="email" />
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', optional($staff)->address)" required autocomplete="address" />
            </div>

            {{-- <div class="form-group">
                <label for="password">Password</label>
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" :value="old('password_confirmation')" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div> --}}

            <button type="submit" class="btn btn-primary mt-3">Update User</button>
        </form>
    </div>
</div>



<!-- end main content section -->
</div>
@endsection
