@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Sales</span>
            </li>
        </ul>
        <!-- start main content section -->
        <!-- cart + summary -->
        <section class="bg-light my-2">
            <div class="container">
                <div class="row">
                    <!-- cart -->
                    <div class="col-lg-9">
                        <div class="card border shadow-0">
                            <div class="center m-3">
                                <input type="text" name="search" placeholder="Search product" class="form-control">
                            </div>
                            <div class="d-flex text-center">
                                <h2 class="text-large mb-2 flex-1"><strong>Total: ₦21,000</strong></h2>
                            </div>
                            <div class="card border shadow-0 m-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex text-center m-2">
                                            <h2 class="text-large"><strong>Winter jacket for men and lady</strong></h2>
                                            <h2 class="text-large flex-1"><strong>₦10,000</strong></h2>
                                        </div>
                                        <div class="d-flex p-2">
                                            <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703"
                                                class="border rounded center"
                                                style="width: 96px; height: 96px;" />
                                            <div class="text-center ml-3">
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-success mt-2">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add two more products here -->
                            <div class="card border shadow-0 m-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex text-center m-2">
                                            <h2 class="text-large"><strong>Winter jacket for men and lady</strong></h2>
                                            <h2 class="text-large flex-1"><strong>₦10,000</strong></h2>
                                        </div>
                                        <div class="d-flex p-2">
                                            <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703"
                                                class="border rounded center"
                                                style="width: 96px; height: 96px;" />
                                            <div class="text-center ml-3">
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-success mt-2">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border shadow-0 m-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex text-center m-2">
                                            <h2 class="text-large"><strong>Winter jacket for men and lady</strong></h2>
                                            <h2 class="text-large flex-1"><strong>₦10,000</strong></h2>
                                        </div>
                                        <div class="d-flex p-2">
                                            <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703"
                                                class="border rounded center"
                                                style="width: 96px; height: 96px;" />
                                            <div class="text-center ml-3">
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="d-flex sales-details mr-3">
                                                        <p class="d-flex"><span> M </span><span style="color: darkred"> |
                                                            </span><span> Yellow </span></p>
                                                    </div>
                                                    <div class="button-container">
                                                        <button class="remove" disabled>-</button>
                                                        <span class="count">2</span>
                                                        <button class="add">+</button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-success mt-2">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of additional products -->
                        </div>
                    </div>
                    <!-- cart -->
                    <!-- summary -->
                    <div class="col-lg-3">
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total:</p>
                                    <p class="mb-2">₦105,000</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount:</p>
                                    <input style="width: 63px" class="mb-2 text-success" type="number"
                                        placeholder="₦0.00" />
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Grand Total:</p>
                                    <p class="mb-2 fw-bold">₦105,000</p>
                                </div>
                                <div class="mt-3 d-flex">
                                    <a href="#" class="btn btn-success w-100 shadow-0 mb-2">Purchase</a>
                                    {{-- <a href="{{ '/products' }}" class="btn btn-light w-100 border mt-2">shop</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- summary -->
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card border shadow-0 mt-3">
                            <div class="card-body">
                                <h2 class="mb-3">Customer Details</h2>
                                <div class="d-flex">
                                    <form action="">
                                        <input type="text" placeholder="Customer name"
                                            class="form-control mb-3 me-3">
                                        <input type="text" placeholder="Customer phone"
                                            class="form-control mb-3 me-3">
                                        <button class="btn btn-sm btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart + summary -->

    </div>
    <!-- end main content section -->
@endsection
