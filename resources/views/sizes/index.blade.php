@extends('layouts.homehead')

@section('content')
    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Product Size Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-3 me-3">All Sizes</h4>
                <a href="{{ '/addsize' }}" class="btn btn-success btn-sm">Create Size</a>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="text-primary table-primary">
                            <tr>
                                <th class="text-left">#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (isset($sizes))
                            @foreach ($sizes as $key => $size)
                                <tr>
                                    <td class="text-left">{{ $key + 1 }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td class="td-actions d-flex">
                                        <a href="{{ route('sizes.edit', ['size' => $size->id]) }}"
                                            class="btn btn-primary btn-round btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('sizes.destroy', ['size' => $size->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-round btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No size found.</td>
                            </tr>
                        @endif
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
