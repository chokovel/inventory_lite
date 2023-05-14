@extends('layouts.homehead')

@section('content')
                    <!-- start main content section -->
                    <div x-data="basic">
                <div class="panel">
                    <h5 class="text-lg font-semibold dark:text-white-light">Staff</h5>
                    <h5 class="text-lg font-semibold dark:text-white-light">
                        <a href="{{'/adduser'}}">Add Staff</a>
                    </h5>
                    <div class="mb-5">
                                    <form>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="first_name" placeholder="Enter First Name" class="form-input" />
                                            <input type="text" name="last_name" placeholder="Enter Last Name" class="form-input" />
                                        </div>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="email" placeholder="Enter Email" class="form-input" />
                                            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-input" />
                                        </div>
                                        <div class="grid grid-cols-1 justify-between gap-5 sm:flex">
                                            <input type="text" name="password" placeholder="Enter Password" class="form-input" />
                                            <input type="text" name="password" placeholder="Re-enter Password" class="form-input" />
                                        </div>
                                        <button type="button" class="btn btn-primary mt-6">Submit</button>
                                    </form>
                                </div>
                                </div>
                                </div>
                    <!-- end main content section -->

@endsection
