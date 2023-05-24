@extends('layouts.homehead')

@section('content')
    <div x-data="returns">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Returns</span>
            </li>
        </ul>
        <!-- start main content section -->
        <!-- cart + summary -->
        <section class="bg-light my-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- cart -->
                        <div class="card border shadow-0">
                            {{-- <div class="center m-3">
                                <div class="input-group">
                                    <input type="text" name="search" placeholder="Search product" class="form-control">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div> --}}
                            <div class="col-sm-2 text-center mb-3" style="">
                                {{-- <h2 class="text-large flex-1 mt-2"><strong id="grand_total">Grand Total: ₦
                                        {{ number_format($totalProductsSum, 2) }}</strong></h2> --}}
                                {{-- <button style="float:right;" type="reset" class="btn btn-sm btn-danger shadow-0 flex-1 mr-2">Clear
                                    Cart</button> --}}
                            </div>
                            <div class="row">
                                {{-- @foreach ($products as $k => $product) --}}
                                <div class="col-lg-4">
                                    <div class="card border shadow-0 m-2">
                                        <div class="card-body">
                                            <div class="d-flex text-center m-2">
                                                <h2 class="text-large">
                                                    <strong>{{ $saleCart->productColor->product->product_name }}</strong>
                                                </h2>
                                                <h2 class="text-large flex-1">
                                                    <strong>₦{{ number_format($saleCart->productColor->product->price) }}</strong>
                                                </h2>
                                            </div>
                                            <div class="d-flex">
                                                <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703"
                                                    class="border rounded center" style="width: 96px; height: 96px;">
                                                <div class="text-center ml-3 salescardwidth">
                                                    <div class="d-flex">
                                                            <div class="d-flex sales-details mr-3 flex-1">
                                                                <p class="d-flex">
                                                                    <span>{{ $saleCart->productColor->size->name }}
                                                                    </span><span style="color: darkred"> |
                                                                    </span><span>{{ $saleCart->productColor->color->name }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="button-container mb-2 flex-1">
                                                                <button class="remove"
                                                                    onclick="decrease({{ $saleCart->id }}, {{ $saleCart->quantity }})">-</button>
                                                                <span class="count" id="{{ $saleCart->id }}">0</span>
                                                                <button class="add"
                                                                    onclick="increase({{ $saleCart->id }}, {{ $saleCart->quantity }})">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             <div class="mt-3  d-flex">
                                                <form action="{{ route('returns.save', ['salesId' => $saleCart->id]) }}"
                                                    style="width: 100%" id="form-purchase" method="POST">
                                                    @csrf
                                                    <input type="hidden" readonly placeholder="" name="quantity" id="quantity"
                                                        class="form-control mb-3 me-3" required>

                                                    <div class="d-flex">
                                                        <button type="submit" class="btn btn-success w-100 shadow-0 m-1"
                                                            id="return">Return</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <!-- cart -->
                    </div>
                    {{-- side button removed from here --}}
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
                                {{-- <form action=""> --}}
                                {{-- @csrf --}}
                                <input type="text" placeholder="Customer phone or email" id="customer_input"
                                    class="form-control mb-3 me-3"
                                    value="{{ $saleCart->customer ? $saleCart->customer->phone : '' }}">
                                <input type="text" readonly placeholder="Customer name" id="customer_name"
                                    class="form-control mb-3 me-3"
                                    value="{{ $saleCart->customer ? $saleCart->customer->name : '' }}">
                                {{-- <button type="button" onclick="searchCustomer()"
                                        class="btn btn-sm btn-primary">Search</button> --}}
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- end main content section -->
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#return").on('click', function() {
                let customer = $('#quantity').val();
                if (!customer) {
                    event.preventDefault();
                    alert("Quantity of product to be returned needs to be provided")
                }
            })
        })

        function increase(pId, productqty) {
            let countEl = document.getElementById(pId)
            let quantity = document.getElementById('quantity');
            if (Number(productqty) > Number(countEl.innerHTML)) {
                countEl.innerHTML = Number(countEl.innerHTML) + 1;
                quantity.value = countEl.innerHTML;
            }
        }

        function decrease(pId, productqty) {
            let countEl = document.getElementById(pId)
            let quantity = document.getElementById('quantity');
            if (Number(countEl.innerHTML) > 1) {
                countEl.innerHTML = Number(countEl.innerHTML) - 1;
                quantity.value = countEl.innerHTML;
            }
        }

        // async function addToCart(productColors, price) {
        //     let items = []
        //     let total = document.getElementById('total')
        //     let grand_total = document.getElementById('grand_total')
        //     let customer_id = document.getElementById('customer_id').value
        //     productColors.forEach(productColor => {
        //         let countEl = document.getElementById(productColor.id)
        //         let qty = Number(countEl.innerHTML)
        //         if (qty > 0) {

        //             items.push({
        //                 product_color_id: productColor.id,
        //                 quantity: qty,
        //                 customer_id: customer_id
        //             });

        //             total.innerHTML = Number(total.innerHTML) + (qty * price)
        //         }
        //     })
        //     grand_total.innerHTML = total.innerHTML
        //     let baseUrl = window.location.origin
        //     let _csrf = document.querySelector('input[name="_token"]').value;
        //     let result = await fetch(`${baseUrl}/returns/cart`, {
        //         headers: {
        //             "Content-Type": "application/json",
        //             "Accept": "application/json",
        //             "X-Requested-With": "XMLHttpRequest",
        //             "X-CSRF-Token": _csrf
        //         },
        //         method: "post",
        //         credentials: "same-origin",
        //         body: JSON.stringify({
        //             items: items
        //         })
        //     })
        //     result = await result.json();
        // }

        // async function searchCustomer() {
        //     let baseUrl = window.location.origin
        //     let input = document.getElementById('customer_input').value
        //     let result = await fetch(`${baseUrl}/api/customer/${input}`)
        //     result = await result.json();

        //     if (result.statusCode == 200) {
        //         let total = document.getElementById('total')
        //         let grand_total = document.getElementById('grand_total')
        //         document.getElementById('customer_name').value = result.body.name
        //         document.getElementById('customer_id').value = result.body.id
        //         if (result.body.return_carts) {
        //             result.body.return_carts.forEach(return_cart => {
        //                 total.innerHTML = Number(return_cart.quantity) *
        //                     Number(return_cart.product_color.product.price)
        //             })
        //             grand_total.innerHTML = total.innerHTML
        //         }
        //         console.log(result.body)
        //     } else {
        //         alert(result.body)
        //     }
        // }
    </script>
@endsection
