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
        <div>
            <button class="btn btn-warning btn-sm"><a href="{{ '/sales' }}">Sales List</a></button>
        </div>
        <!-- start main content section -->
        <!-- cart + summary -->
        <section class="bg-light my-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- cart -->
                        <div class="card border shadow-0">
                            <form action="" style="width: 100%">
                                <div class="center m-3">
                                    <div class="input-group">
                                        <input type="text" name="search" placeholder="Search product"
                                            class="form-control">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="d-flex text-center mb-3">
                                <h2 class="text-large flex-1 mt-2"><strong id="grand_total">Grand Total: ₦
                                        {{ number_format($totalProductsSum, 2) }}</strong></h2>
                                <form action="{{ route('sales.clear') }}" method="post" style="width:50%;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="width:100%"
                                        class="btn btn-sm btn-danger shadow-0 flex-1 mr-2">Clear
                                        Cart</button>
                                </form>

                            </div>
                            <div class="row">
                                @foreach ($products as $k => $product)
                                    <div class="col-lg-4 cardwidth">
                                        <div class="card border shadow-0 m-2">
                                            <div class="card-body">
                                                <div class="d-flex text-center m-2">
                                                    <h2 class="text-large"><strong>{{ $product->product_name }}</strong>
                                                    </h2>
                                                    <h2 class="text-large flex-1">
                                                        <strong>₦{{ number_format($product->price) }}</strong>
                                                    </h2>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}"
                                                        class="border rounded center" style="width: 96px; height: 96px;">
                                                    <div class="text-center ml-3 salescardwidth">
                                                        @foreach ($product->productColors as $key => $productColor)
                                                            <div class="d-flex">
                                                                <div class="d-flex sales-details mr-3 flex-1">
                                                                    <p class="d-flex"><span>{{ $productColor->size->name }}
                                                                        </span><span style="color: darkred"> |
                                                                        </span><span>{{ $productColor->color->name }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="button-container mb-2 flex-1">
                                                                    <button class="remove"
                                                                        onclick="decrease({{ $productColor->id }}, {{ $productColor->quantity }})">-</button>
                                                                    <span class="count"
                                                                        id="{{ $productColor->id }}">0</span>
                                                                    <button class="add"
                                                                        onclick="increase({{ $productColor->id }}, {{ $productColor->quantity }})">+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <button class="btn btn-success w-100 shadow-0 mt-2"
                                                    onclick="addToCart({{ $product->productColors }}, {{ $product->price }})">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- cart -->
                    </div>
                    <div class="col-lg-3">
                        <!-- summary -->
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total:</p>
                                    <p class="mb-2">₦<span id="total">0</span></p>
                                </div>
                                {{-- <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount:</p>
                                    <input style="width: 63px" class="mb-2 text-success" type="number" placeholder="₦0.00">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Grand Total:</p>
                                    <p class="mb-2 fw-bold">₦<span id="grand_total">0</span></p>
                                </div> --}}

                                <div class="mt-3 d-flex">
                                    <form action="{{ route('addToCart') }}" id="form-purchase" method="POST">
                                        @csrf
                                        <input type="hidden" readonly placeholder="Customer name" name="customer_id"
                                            id="customer_id" class="form-control mb-3 me-3" required>
                                        <button type="submit"
                                            class="btn btn-success w-100 shadow-0 mb-2"id="purchase">Purchase</button>
                                    </form>

                                    {{-- <a href="{{ '/products' }}" class="btn btn-light w-100 border mt-2">shop</a> --}}
                                </div>
                            </div>
        </section>
        <!-- cart + summary -->
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border shadow-0 mt-3">
                        <div class="card-body">
                            <h2 class="mb-3">Customer Details</h2>
                            <div class="d-flex">
                                <form action="">
                                    @csrf
                                    <input type="text" placeholder="Customer phone or email" id="customer_input"
                                        class="form-control mb-3 me-3">
                                    <input type="text" readonly placeholder="Customer name" id="customer_name"
                                        class="form-control mb-3 me-3">

                                    <button type="button" onclick="searchCustomer()"
                                        class="btn btn-sm btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content section -->
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#purchase").on('click', function() {

                let customer = $('#customer_id').val();
                if (!customer) {
                    event.preventDefault();
                    alert("No Customer provided yet")
                }
            })
        })
        // document.onreadystatechange = function() {
        //     alert()
        // }
        var items = []

        function increase(pId, productqty) {
            let countEl = document.getElementById(pId)
            if (Number(productqty) > Number(countEl.innerHTML)) {
                countEl.innerHTML = Number(countEl.innerHTML) + 1;
            }
        }

        function decrease(pId, productqty) {
            let countEl = document.getElementById(pId)
            if (Number(countEl.innerHTML) > 0) {
                countEl.innerHTML = Number(countEl.innerHTML) - 1;
            }
        }

        async function addToCart(productColors, price) {
            let total = document.getElementById('total')
            let grand_total = document.getElementById('grand_total')
            let customer_id = document.getElementById('customer_id').value
            productColors.forEach(productColor => {
                let countEl = document.getElementById(productColor.id)
                let qty = Number(countEl.innerHTML)
                if (qty > 0) {
                    items[productColor.id] = {
                        product_color_id: productColor.id,
                        quantity: qty,
                        customer_id: customer_id,
                        amount: qty * price
                    };
                }
            })
            getSum(items);
            let baseUrl = window.location.origin
            let _csrf = document.querySelector('input[name="_token"]').value;
            let result = await fetch(`${baseUrl}/sales/cart`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": _csrf
                },
                method: "post",
                credentials: "same-origin",
                body: JSON.stringify({
                    items: items
                })
            })
            result = await result.json();
        }

        async function searchCustomer() {
            let baseUrl = window.location.origin
            let input = document.getElementById('customer_input').value
            let result = await fetch(`${baseUrl}/api/customer/${input}`)
            result = await result.json();

            if (result.statusCode == 200) {
                let total = document.getElementById('total')
                let grand_total = document.getElementById('grand_total')
                document.getElementById('customer_name').value = result.body.name
                document.getElementById('customer_id').value = result.body.id
                //   getSum(items);
                // if (result.body.sale_carts) {
                //     result.body.sale_carts.forEach(sale_cart => {
                //         total.innerHTML = Number(sale_cart.quantity) *
                //             Number(sale_cart.product_color.product.price)
                //     })
                //     grand_total.innerHTML = total.innerHTML
                // }
                // console.log(result.body)
            } else {
                alert(result.body)
            }
        }

        async function getSum(itms = []) {
            let total = document.getElementById('total')
            let grand_total = document.getElementById('grand_total')
            let sum = 0;
            itms.forEach(e => {
                sum = sum + e.amount;
            })
            total.innerHTML = sum;
            grand_total.innerHTML = total.innerHTML
        }
    </script>
@endsection
