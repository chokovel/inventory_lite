@extends('layouts.homehead')

@section('content')

 <div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Expense Page</span>
        </li>
    </ul>
    <!-- start main content section -->
    <div class="container my-3">
      <div class="d-flex justify-content-between">
          <h4 class="card-title mb-3 me-3">Create Expense</h4>
          <button class="btn btn-success btn-sm"><a href="{{'/expenses'}}">Go to Expenses</a></button>
      </div>
    </div>

    {{-- ............ --}}
<div class="container">
            @php
                // echo var_dump($errors)
            @endphp
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="m-0">Create Expense</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('expensecategories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="expense_title" class="form-label">Expense Title</label>
                                    <input type="text" id="expense_title" name="expense_title" class="form-control">
                                    @error('expense_title')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="expensecategory" class="form-label">ExpenseCategory</label>
                                    <select id="expensecategory" name="expensecategory" class="form-select">
                                        @foreach ($expensecategories as $expensecategory)
                                            <option value="{{ $expensecategory->id }}">{{ $expensecategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('expensecategory')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="amount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₦</span>
                                        <input type="number" id="amount" name="amount" class="form-control">
                                    </div>
                                    @error('amount')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" id="date" name="date" class="form-control">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="details" class="form-label">Expense Details</label>
                                    <textarea id="details" name="details" class="form-control"></textarea>
                                    @error('details')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Create Expense</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!-- end main content section -->
</div>
@endsection
