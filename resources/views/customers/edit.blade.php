@extends('layouts.homehead')

@section('content')

<div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Customers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
        <div class="d-flex justify-content-between">
            {{-- <h4 class="card-title mb-3 me-3">Edit Customer</h4> --}}
            <button class="btn btn-success btn-sm"><a href="{{'/customers'}}">Go to Customers</a></button>
        </div>
    </div>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h4 class="card-title">Edit Customer</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('customers.update', $customer) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Date of Birth</label>
                            <input type="text" name="dob" class="form-control" value="{{ $customer->dob }}">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Note</label>
                            <textarea name="note" class="form-control">{{ $customer->note }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end main content section -->
</div>
@endsection
