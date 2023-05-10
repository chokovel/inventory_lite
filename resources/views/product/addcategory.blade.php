@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Categories Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3  float-right">
      <div class="d-flex justify-content-between  float-right">
          <button class="btn btn-info btn-sm"><a href="{{'/categories'}}">Go to Categories</a></button>
      </div>
    </div>

    {{-- ............ --}}>



<!-- end main content section -->
</div>
@endsection
