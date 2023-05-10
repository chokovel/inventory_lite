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
<section class="bg-light my-5">
  <div class="container sales-section">
    <div class="row">
        <h4 class="card-title mb-3 me-3">Your shopping cart</h4>
      <!-- cart -->
      <div class="col-lg-4">
        <div class="card border shadow-0 mb-3">
            <div class="row gy-3 mb-4 d-flex">
            <div class="d-flex p-4">
                  <div class="">
                    <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" class="border rounded center" style="width: 96px; height: 96px; margin: 0 auto;" />
                    <div class="text-center">
                      <a href="#" class="nav-link">Winter jacket for men and lady</a>
                      <p class="text-muted">₦21000</p>
                    </div>
                  </div>
              <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="sales-details" style="margin-right: 10px">
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> Yellow </span> |
                    <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> Blue </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> Pink </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> Green </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> white </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> red </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> orange </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> brown </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                </div>
                {{-- <div class="">
                  here
                </div> --}}
              </div>
            </div>
            </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border shadow-0">
            <div class="row gy-3 mb-4 d-flex">
            <div class="d-flex p-4">
                  <div class="">
                    <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" class="border rounded center" style="width: 96px; height: 96px; margin: 0 auto;" />
                    <div class="text-center">
                      <a href="#" class="nav-link">Winter jacket for men and lady</a>
                      <p class="text-muted">₦21000</p>
                    </div>
                  </div>
              <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="sales-details" style="margin-right: 10px">
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> Yellow </span> |
                    <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> Blue </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> Pink </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> Green </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> white </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> red </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> orange </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> brown </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                </div>
                {{-- <div class="">
                  here
                </div> --}}
              </div>
            </div>
            </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border shadow-0">
            <div class="row gy-3 mb-4 d-flex">
            <div class="d-flex p-4">
                  <div class="">
                    <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" class="border rounded center" style="width: 96px; height: 96px; margin: 0 auto;" />
                    <div class="text-center">
                      <a href="#" class="nav-link">Winter jacket for men and lady</a>
                      <p class="text-muted">₦21000</p>
                    </div>
                  </div>
              <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="sales-details" style="margin-right: 20px">
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> Yellow </span> |
                    <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> Blue </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> Pink </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> Green </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> white </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> red </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> orange </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> brown </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                </div>
                {{-- <div class="">
                  here
                </div> --}}
              </div>
            </div>
            </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border shadow-0">
            <div class="row gy-3 mb-4 d-flex">
            <div class="d-flex p-4">
                  <div class="">
                    <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" class="border rounded center" style="width: 96px; height: 96px; margin: 0 auto;" />
                    <div class="text-center">
                      <a href="#" class="nav-link">Winter jacket for men and lady</a>
                      <p class="text-muted">₦21000</p>
                    </div>
                  </div>
              <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="sales-details" style="margin-right: 10px">
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> Yellow </span> |
                    <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> Blue </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> Pink </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> Green </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>4</span> | <span> M </span> | <span> white </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>1</span> | <span> S </span> | <span> red </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>3</span> | <span> L </span> | <span> orange </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                  <p class="d-flex"><span>2</span> | <span> XL </span> | <span> brown </span>
                <button class="addbtn btn btn-sm" href="#"> + </button></p>
                </div>
                {{-- <div class="">
                  here
                </div> --}}
              </div>
            </div>
            </div>
        </div>
      </div>
      <!-- cart -->
    </div>
  </div>
</section>


<section class="bg-light my-5">
  <div class="container">
    <div class="row">
      <!-- cart -->
      <div class="col-lg-9">
        <div class="card border shadow-0">
          <div class="m-4">
            <h2 class="text-large mb-2"><strong>Sales Summary</strong></h2>
            <div class="row gy-3 mb-4">
              <div class="col-lg-4">
                <div class="me-lg-4">
                  <div class="d-flex">
                    <img src="https://kesagroup.net/cdn/shop/products/Karungi_africanMapYellow_580x.jpg?v=1658244703" class="border rounded me-3 center" style="width: 96px; height: 96px; margin: 0 auto;" />
                    <div class="text-center">
                      <a href="#" class="nav-link">Winter jacket for men and lady</a>
                      <p class="text-muted">₦21000</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg col-sm-6 justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="d-flex">
                    <div class="d-flex sales-details">
                        <p class="d-flex"><span> M </span style="color:darkred"> | <span> Yellow </span></p>
                    </div>
                    <div class="button-container">
                        <button class="remove" disabled>-</button>
                        <span class="count">2</span>
                        <button class="add">+</button>

                        <h2 class="">₦42000</h2>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex sales-details">
                        <p class="d-flex"><span> XL </span> | <span> Green </span></p>
                    </div>
                    <div class="button-container">
                        <button class="remove" disabled>-</button>
                        <span class="count">1</span>
                        <button class="add">+</button>

                        <h2 class="summary-total">₦21000</h2>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex sales-details">
                        <p class="d-flex"><span> L </span> | <span> Orange </span></p>
                    </div>
                    <div class="button-container">
                        <button class="remove" disabled>-</button>
                        <span class="count">2</span>
                        <button class="add">+</button>

                        <h2 class="">₦42000</h2>
                    </div>
                </div>
              </div>
            </div>
<hr><br>



          </div>

        </div>
      </div>
      <!-- cart -->
      <!-- summary -->
      <div class="col-lg-3">
        <div class="card shadow-0 border">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2">₦105,000</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <input style="width: 63px" class="mb-2 text-success" type="number" placeholder="₦0.00"  />
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2 fw-bold">₦105,000</p>
            </div>

            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
              <a href="{{'/products'}}" class="btn btn-light w-100 border mt-2"> Back to shop </a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
    </div>
  </div>
</section>
<!-- cart + summary -->
</div>


    <!-- end main content section -->
@endsection
