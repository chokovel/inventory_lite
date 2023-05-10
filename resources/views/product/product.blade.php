@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Products Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">All Products</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/addproduct'}}">Create Product</a></button>
      </div>
    </div>

    {{-- ............ --}}
    <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" alt="Product 1">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text">Price: $10.99</p>
              <p class="card-text">Blue, red, green, yellow</p>
              <p class="card-text">M, L, XL, S</p>
              <h5 class="card-title">Total Qty: 1000</h5>
              <button type="button" id="" class="btn btn-primary">remove</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/U/A/156071_1608966547.jpg" alt="Product 2">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text">Price: $19.99</p>
              <p class="card-text">Color: Red</p>
              <p class="card-text">Size: Large</p>
              <h5 class="card-title">Total Qty: 1000</h5>
              <button type="button" id="" class="btn btn-primary">remove</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" alt="Product 3">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text">Price: $29.99</p>
              <p class="card-text">Color: Green</p>
              <p class="card-text">Size: Small</p>
              <h5 class="card-title">Total Qty: 1000</h5>
              <button type="button" id="" class="btn btn-primary">remove</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/U/A/156071_1608966547.jpg" alt="Product 4">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text">Price: $14.99</p>
              <p class="card-text">Color: Black</p>
              <p class="card-text">Size: Medium</p>
              <h5 class="card-title">Total Qty: 1000</h5>
              <button type="button" id="" class="btn btn-primary">remove</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-4">
            <img class="card-img-top" src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" alt="Product 5">
            <div class="card-body">
                <h5 class="card-title">Product 5</h5>
                <p class="card-text">Price: $24.99</p>
                <p class="card-text">Color: Yellow</p>
                <p class="card-text">Size: Large</p>
                <h5 class="card-title">Total Qty: 1000</h5>
                <button type="button" id="" class="btn btn-primary">remove</button>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card mb-4">
        <img class="card-img-top" src="https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/U/A/156071_1608966547.jpg" alt="Product 6">
        <div class="card-body">
          <h5 class="card-title">Product 6</h5>
          <p class="card-text">Price: $9.99</p>
          <p class="card-text">Color: Pink, Red</p>
          <p class="card-text">Size: Small</p>
          <h5 class="card-title">Total Qty: 1000</h5>
          <button type="button" id="" class="btn btn-primary">remove</button>

        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>





<!-- end main content section -->
</div>
@endsection
