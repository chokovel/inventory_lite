@extends('layouts.homehead')

@section('content')
<div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Purchases Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3 mx-auto">
        <div class="text-center">
            <button class="btn btn-info btn-sm"><a href="{{'/purchases'}}">Go to Purchases</a></button>
        </div>
    </div>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h4 class="card-title">Edit Purchase</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('purchases.update', $purchase) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control mb-4"
                                value="{{ $purchase->product_name }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control mb-4"
                                value="{{ $purchase->price }}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control mb-4"
                                value="{{ $purchase->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" id="size" name="size" class="form-control mb-4"
                                value="{{ $purchase->size }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control mb-4"
                                value="{{ $purchase->date }}">
                        </div>
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select id="supplier_id" name="supplier_id" class="form-control mb-4">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if($supplier->id === $purchase->supplier_id) selected @endif>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                value="{{ $purchase->name }}">
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea id="note" name="note" class="form-control mb-4">{{ $purchase->note}}</textarea>
                        </div>
                        </div>
                        </div>
                        <div class="text-center">
                        <button class="btn btn-info btn-block my-4" type="submit">Update</button>
                        </div>
                        </form>
                        </div>
                        </div>
                        <!-- end main content section -->

                        </div>
                        @endsection
