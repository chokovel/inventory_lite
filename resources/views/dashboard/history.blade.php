@extends('layouts.homehead')

@section('content')

    <div x-data="returns">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ 'javascript:;' }}" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Returns Page</span>
            </li>
        </ul>
        <!-- start main content section -->
        <div class="container my-3">
            <div class="d-flex justify-content-between">
                <button class="btn btn-warning btn-sm"><a href="{{ '/sales' }}">Sales</a></button>
            </div>
        </div>
        {{-- ............ --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('returns.search') }}" method="get" class="search-form">
                    {{-- @csrf --}}
                    <div class="form-group m-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchName"
                                placeholder="Product or Customer Name">
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
                            <tr>
                                <td colspan="4">
                                    <h2 class="text-center"><strong>User History</strong></h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-left">Id</th>
                                <th>User</th>
                                <th>Activities</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($activities))
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $activity->user->name }}</td>
                                        <td>{{ $activity->description }}</td>
                                        <td>{{ $activity->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No user activity yet.</td>
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
