@extends('layouts.homehead')

@section('content')

<div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Suppliers Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-3 me-3">Edit Supplier</h4>
            <button class="btn btn-success btn-sm"><a href="{{'/suppliers'}}">Go to Suppliers</a></button>
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
        <div class="card-header">
            {{-- <h4 class="card-title">Edit Supplier</h4> --}}
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('suppliers.update', $supplier) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" name="name" class="form-control mb-3" value="{{ $supplier->name }}"
                        placeholder="Enter name">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" name="email" class="form-control mb-3" value="{{ $supplier->email }}"
                        placeholder="Enter email">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" name="phone" class="form-control mb-3" value="{{ $supplier->phone }}"
                        placeholder="Enter phone">
                    <label class="bmd-label-floating">Country</label>
                    <input type="text" name="country" class="form-control mb-3" value="{{ $supplier->country }}"
                        placeholder="Enter country">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" name="address" class="form-control mb-3" value="{{ $supplier->address }}"
                        placeholder="Enter address">
                    <label class="bmd-label-floating">Note</label>
                    <textarea name="note" class="form-control mb-3" placeholder="Enter note">{{ $supplier->note }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <!-- end main content section -->
</div>
@endsection
