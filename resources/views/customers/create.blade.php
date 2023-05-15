@extends('layouts.homehead')

@section('content')
<div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Customers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3 mx-auto">
        <div class="text-center">
            <button class="btn btn-info btn-sm"><a href="{{'/customers'}}">Go to Customers</a></button>
        </div>
    </div>

    {{-- ............ --}}
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h4 class="card-title">Create Customer</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                placeholder="Enter Customer's name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-4"
                                placeholder="Enter Customer's email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control mb-4"
                                placeholder="Enter Customer's phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="dob">DOB</label>
                            <input type="date" id="dob" name="dob" class="form-control mb-4"
                                placeholder="Enter Customer's dob">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control mb-4"
                                placeholder="Enter Customer's address">
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea id="note" name="note" class="form-control mb-4"
                                placeholder="Enter Customer's note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-info btn-block my-4" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end main content section -->
</div>
@endsection
