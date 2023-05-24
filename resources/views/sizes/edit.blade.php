@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Size Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3 float-right">
            <div class="d-flex justify-content-between  float-right col-8" style="margin:0 auto;">
                <button class="btn btn-info btn-sm"><a href="{{ '/sizes' }}">Go to Sizes</a></button>
            </div>
        </div>

        {{-- ............ --}}
        <div class="card col-8" style="margin:0 auto;">
             <div class="card-header">
                <h4 class="card-title">Edit Size</h4>
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">Edit Size</h5> --}}
                <form action="{{ route('sizes.update', ['size' => $size->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control mb-4"
                            placeholder="Enter size name" value="{{ $size->name }}">
                    </div>

                    <button class="btn btn-info btn-block my-4" type="submit">Update</button>

                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
