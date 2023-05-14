@extends('layouts.homehead')

@section('content')
            <!-- start main content section -->
            <div x-data="basic">
                <div class="panel">
                    <h5 class="text-lg font-semibold dark:text-white-light">Staff</h5>
                    <h5 class="text-lg font-semibold dark:text-white-light">
                        <a href="{{'/adduser'}}">Add Staff</a>
                    </h5>
                    <table id="myTable" class="table-hover whitespace-nowrap dataTable-table">
                        <thead>
                            <tr>
                                <th data-sortable="" style="width: 10.2156%;" class="asc"><a href="#" class="dataTable-sorter">ID</a></th>
                                <th data-sortable="" style="width: 17.9696%;"><a href="#" class="dataTable-sorter">First Name</a></th>
                                <th data-sortable="" style="width: 17.7234%;"><a href="#" class="dataTable-sorter">Last Name</a></th>
                                <th data-sortable="" style="width: 32.8622%;"><a href="#" class="dataTable-sorter">Email</a></th>
                                <th data-sortable="" style="width: 21.1696%;"><a href="#" class="dataTable-sorter">Phone</a></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td><td>Caroline</td><td>Jensen</td><td>carolinejensen@zidant.com</td><td>+1 (821) 447-3782</td></tr><tr><td>2</td><td>Celeste</td><td>Grant</td><td>celestegrant@polarax.com</td><td>+1 (838) 515-3408</td></tr><tr><td>3</td><td>Tillman</td><td>Forbes</td><td>tillmanforbes@manglo.com</td><td>+1 (969) 496-2892</td></tr><tr><td>4</td><td>Daisy</td><td>Whitley</td><td>daisywhitley@applideck.com</td><td>+1 (861) 564-2877</td></tr><tr><td>5</td><td>Weber</td><td>Bowman</td><td>weberbowman@volax.com</td><td>+1 (962) 466-3483</td></tr><tr><td>6</td><td>Buckley</td><td>Townsend</td><td>buckleytownsend@orbaxter.com</td><td>+1 (884) 595-2643</td></tr><tr><td>7</td><td>Latoya</td><td>Bradshaw</td><td>latoyabradshaw@opportech.com</td><td>+1 (906) 474-3155</td></tr><tr><td>8</td><td>Kate</td><td>Lindsay</td><td>katelindsay@gorganic.com</td><td>+1 (930) 546-2952</td></tr><tr><td>9</td><td>Marva</td><td>Sandoval</td><td>marvasandoval@avit.com</td><td>+1 (927) 566-3600</td></tr><tr><td>10</td><td>Decker</td><td>Russell</td><td>deckerrussell@quilch.com</td><td>+1 (846) 535-3283</td></tr></tbody>
                        </table>
                    </div>

                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing 1 to 10 of 25 entries</div><div class="dataTable-dropdown"><label><select class="dataTable-selector"><option value="10" selected="">10</option><option value="20">20</option><option value="30">30</option><option value="50">50</option><option value="100">100</option></select></label></div><nav class="dataTable-pagination"><ul class="dataTable-pagination-list"><li class="pager"><a href="#" data-page="1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg></a></li><li class="active"><a href="#" data-page="1">1</a></li><li class=""><a href="#" data-page="2">2</a></li><li class=""><a href="#" data-page="3">3</a></li><li class="pager"><a href="#" data-page="2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg></a></li><li class="pager"><a href="#" data-page="3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg></a></li></ul>
                        </nav>
                    </div>
                    </div>
                    </table>
                </div>
            </div>
            <!-- end main content section -->

@endsection
