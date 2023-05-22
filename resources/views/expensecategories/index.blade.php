@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Expense Categories Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3"></h4>
          <div class="d-flex">
              <button class="btn btn-success btn-sm"><a href="{{('/addexpensecategory')}}">Create Expense Category</a></button>
              <button class="btn btn-success btn-sm m-1"><a href="{{'/expenses'}}">View Expense List</a></button>
          </div>
      </div>
    </div>

    {{-- ............ --}}

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="text-primary">
          <tr>
            <th class="text-left">#</th>
            <th>Name</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
    @if(isset($expensecategories))
        @foreach ($expensecategories as $expensecategory)
            <tr>
                <td class="text-left">{{ $expensecategory->id }}</td>
                <td>{{ $expensecategory->name }}</td>
                <td class="td-actions text-right d-flex">
                <a href="{{ route('expensecategories.edit', $expensecategory->id) }}" class="btn btn-primary btn-round btn-sm">
                    <i class="material-icons">edit</i>
                </a>
                <form action="{{ route('expensecategories.destroy', $expensecategory->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-round btn-sm">
                    <i class="material-icons">delete</i>
                    </button>
                </form>
                </td>
            </tr>
          @endforeach
          @else
        <tr>
            <td colspan="2">No expense category found.</td>
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
