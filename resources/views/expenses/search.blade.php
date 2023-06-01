@extends('layouts.homehead')

@section('content')

    <div x-data="sales">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Expense Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-3 me-3"></h4>
                <div class="d-flex">
                    <button class="btn btn-success btn-sm"><a href="{{ route('expenses.create') }}">Create
                            </a></button>
                    <button class="btn btn-success btn-sm m-1"><a href="{{ '/expensecategories' }}">View Category
                            List</a></button>
                </div>
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
                    <form action="{{ route('expenses.search') }}" method="POST" class="search-form">
                        @csrf
                        <div class="form-group m-3">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" name="searchName" placeholder="Title or category">

                                <label for="dateRange" class="sr-only">Date Range:</label>
                                <input type="date" class="form-control" name="startDate">
                                <span class="input-group-text">to</span>
                                <input type="date" class="form-control" name="endDate">
                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="text-primary table-primary">
                            {{-- <tr>
                                <td colspan="8">
                                    <h2 class="text-center"><strong>{{ date('M-Y', strtotime($month)) }}</strong></h2>
                                </td>
                            </tr> --}}
                            <tr>
                                <td colspan="8">
                                    <h2 class="text-center"><strong>Grand Total: {{ $grandTotal }}</strong></h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-left">#</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Details</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($results))
                                @foreach ($results as $expense)
                                    <tr>
                                        <td class="text-left">{{ $loop->iteration }}</td>
                                        <td>{{ $expense->date }}</td>
                                        <td>{{ $expense->expense_title }}</td>
                                        <td>{{ $expense->expenseCategory->name }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->details }}</td>
                                        <td class="td-actions text-right d-flex">
                                            <a href="{{ route('expenses.edit', $expense->id) }}"
                                                class="btn btn-primary btn-round btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="post"
                                                style="display: inline-block;">
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
                                    <td colspan="7">No result found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="m-3">

            {{ $results->links() }}
        </div>
        <!-- end main content section -->
    </div>
@endsection
