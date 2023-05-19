<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from html.vristo.sbthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 12:51:35 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Style In Lagos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/style.css') }}" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/animate.css') }}" />
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/tippy-bundle.umd.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    {{-- @livewireStyles --}}
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout, $store.app
        .rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()"></div>

    <!-- screen loader -->
    <div
        class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
            <path
                d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s"
                    repeatCount="indefinite" />
            </path>
            <path
                d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s"
                    repeatCount="indefinite" />
            </path>
        </svg>
    </div>

    <!-- scroll to top button -->
    <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button"
                class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                @click="goToTop">
                <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                        fill="currentColor" />
                    <path
                        d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                        fill="currentColor" />
                </svg>
            </button>
        </template>
    </div>

    <!-- from here up -->
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <!-- start sidebar section -->
        <div :class="{ 'dark text-white-dark': $store.app.semidark }">
            <nav x-data="sidebar"
                class="sidebar fixed top-0 bottom-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
                <div class="h-full bg-white dark:bg-[#0e1726]">
                    <div class="flex items-center justify-between px-4 py-3">
                        <a href="index-2.html" class="main-logo flex shrink-0 items-center">
                            {{-- <img class="ml-[5px] w-8 flex-none" src="assets/images/logo.svg" alt="image" /> --}}
                            <span
                                class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">StyleInLagos</span>
                        </a>
                        <a href="javascript:;"
                            class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                            @click="$store.app.toggleSidebar()">
                            <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                        x-data="{ activeDropdown: 'dashboard' }">
                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'dashboard' }"
                                @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                            fill="currentColor" />
                                        <path
                                            d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                            fill="currentColor" />
                                    </svg>

                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'dashboard' }">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak x-show="activeDropdown === 'dashboard'" x-collapse
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="{{ '/home' }}" class="active">Analytics</a>
                                </li>
                                <li>
                                    <a href="{{ '/sales' }}">Sales</a>
                                </li>
                                <li>
                                    <a href="{{ '/returns' }}">Returns</a>
                                </li>
                                <li>
                                    <a href="{{ '/purchases' }}">Purchase</a>
                                </li>
                                <li>
                                    <a href="{{ '/salesreport' }}">Sales Report</a>
                                </li>
                                <li>
                                    <a href="{{ '/expenses' }}">Expense</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'elements' }"
                                @click="activeDropdown === 'elements' ? activeDropdown = null : activeDropdown = 'elements'">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path
                                            d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path
                                            d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M11 9H8" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path
                                            d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Products</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'elements' }">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak x-show="activeDropdown === 'elements'" x-collapse
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="{{ '/products' }}">All Products</a>
                                </li>
                                <li>
                                    <a href="{{ '/categories' }}">Product Categories</a>
                                </li>
                                <li>
                                    <a href="{{ '/colors' }}">Product Colors</a>
                                </li>
                                <li>
                                    <a href="{{ '/sizes' }}">Product Sizes</a>
                                </li>

                            </ul>
                        </li>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'components' }"
                                @click="activeDropdown === 'components' ? activeDropdown = null : activeDropdown = 'components'">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle opacity="0.5" cx="15" cy="6" r="3"
                                            fill="currentColor"></circle>
                                        <ellipse opacity="0.5" cx="16" cy="17" rx="5"
                                            ry="3" fill="currentColor"></ellipse>
                                        <circle cx="9.00098" cy="6" r="4" fill="currentColor">
                                        </circle>
                                        <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                            fill="currentColor"></ellipse>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Users</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'components' }">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak x-show="activeDropdown === 'components'" x-collapse
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="{{ '/customers' }}">Customers</a>
                                </li>
                                <li>
                                    <a href="{{ route('staff.index') }}">Staff</a>
                                </li>
                                <li>
                                    <a href="{{ '/suppliers' }}">Suppliers</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end sidebar section -->

        <div class="main-content">
            <!-- start header section -->
            <header :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
                <div class="shadow-sm">
                    <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                        <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                            <a href="index-2.html" class="main-logo flex shrink-0 items-center">
                                <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="assets/images/logo.svg"
                                    alt="image" />
                                <span
                                    class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline">StyleInLagos</span>
                            </a>

                            <a href="javascript:;"
                                class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                                @click="$store.app.toggleSidebar()">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>

                        <div x-data="header"
                            class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2">
                            <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }"
                                @click.outside="search = false">
                                <form
                                    class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                                    :class="{ '!block': search }" @submit.prevent="search = false">
                                    <div class="relative">
                                        <input type="text"
                                            class="peer form-input bg-gray-100 placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pr-9 rtl:pl-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4"
                                            placeholder="Search..." />
                                        <button type="button"
                                            class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-primary ltr:right-auto rtl:left-auto">
                                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.5" cy="11.5" r="9.5"
                                                    stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button type="button"
                                            class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                                            @click="search = false">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.5" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                <button type="button"
                                    class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                    @click="search = ! search">
                                    <svg class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]" width="20"
                                        height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                            stroke-width="1.5" opacity="0.5" />
                                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a href="javascript:;" x-cloak x-show="$store.app.theme === 'light'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('dark')">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="5" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <path d="M12 2V4" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M12 20V22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <a href="javascript:;" x-cloak x-show="$store.app.theme === 'dark'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('system')">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                                <a href="javascript:;" x-cloak x-show="$store.app.theme === 'system'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('light')">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </a>
                            </div>

                            <div class="dropdown shrink-0" x-data="dropdown" @click.outside="open = false">

                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="top-11 grid w-[280px] grid-cols-2 gap-y-2 !px-2 font-semibold text-dark ltr:-right-14 rtl:-left-14 dark:text-white-dark dark:text-white-light/90 sm:ltr:-right-2 sm:rtl:-left-2">
                                    <template x-for="item in languages">
                                        <li>
                                            <a href="javascript:;" class="hover:text-primary"
                                                @click="$store.app.toggleLocale(item.value),toggle()"
                                                :class="{ 'bg-primary/10 text-primary': $store.app.locale == item.value }">
                                                <img class="h-5 w-5 rounded-full object-cover"
                                                    :src="`assets/images/flags/${item.value.toUpperCase()}.svg`"
                                                    alt="image" />
                                                <span class="ltr:ml-3 rtl:mr-3" x-text="item.key"></span>
                                            </a>
                                        </li>
                                    </template>
                                </ul>
                            </div>

                            <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                                <!-- <a
                                        href="javascript:;"
                                        class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="toggle"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 10C22.0185 10.7271 22 11.0542 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H13"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <circle cx="19" cy="5" r="3" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </a> -->
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="top-11 w-[300px] !py-0 text-xs text-dark ltr:-right-16 rtl:-left-16 dark:text-white-dark sm:w-[375px] sm:ltr:-right-2 sm:rtl:-left-2">
                                    <li class="mb-5">
                                        <div class="relative overflow-hidden rounded-t-md !p-5 text-white">
                                            <div
                                                class="absolute inset-0 h-full w-full bg-[url('images/menu-heade.html')] bg-cover bg-center bg-no-repeat">
                                            </div>
                                            <h4 class="relative z-10 text-lg font-semibold">Messages</h4>
                                        </div>
                                    </li>
                                    <template x-for="msg in messages">
                                        <li>
                                            <div class="flex items-center px-5 py-3" @click.self="toggle">
                                                <div x-html="msg.image"></div>
                                                <span class="px-3 dark:text-gray-500">
                                                    <div class="text-sm font-semibold dark:text-white-light/90"
                                                        x-text="msg.title"></div>
                                                    <div x-text="msg.message"></div>
                                                </span>
                                                <span
                                                    class="whitespace-pre rounded bg-white-dark/20 px-1 font-semibold text-dark/60 ltr:ml-auto ltr:mr-2 rtl:mr-auto rtl:ml-2 dark:text-white-dark"
                                                    x-text="msg.time"></span>
                                                <button type="button" class="text-neutral-300 hover:text-danger"
                                                    @click="removeMessage(msg.id)">
                                                    <svg width="20" height="20" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.5" cx="12" cy="12"
                                                            r="10" stroke="currentColor"
                                                            stroke-width="1.5" />
                                                        <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="messages.length">
                                        <li class="mt-5 border-t border-white-light text-center dark:border-white/10">
                                            <div class="group flex cursor-pointer items-center justify-center px-4 py-4 font-semibold text-primary dark:text-gray-400"
                                                @click="toggle">
                                                <span class="group-hover:underline ltr:mr-1 rtl:ml-1">VIEW ALL
                                                    ACTIVITIES</span>
                                                <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="!messages.length">
                                        <li class="mb-5">
                                            <div
                                                class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                                <div
                                                    class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                    <svg width="40" height="40" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5"
                                                            d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>
                                                No data available.
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                            <div class="dropdown flex-shrink-0" x-data="dropdown"
                             @auth
                                @click.outside="open = false">
                                <a href="javascript:;" class="group relative" @click="toggle()">
                                    <span><img
                                            class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                            src="{{ Avatar::create(Auth()->user()->email)->toGravatar()}}" alt="image" /></span>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90">

                                    <li>
                                        <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                            <svg class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            {{Auth()->user()->name}}</a>
                                    </li>
                                    <li>
                                        <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                            <svg class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            {{Auth()->user()->phone}}</a>
                                    </li>
                                    <li>
                                        <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                            <svg class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            {{Auth()->user()->email}}</a>
                                    </li>
                                    <li>
                                        <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                            <svg class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            Update Profile</a>
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <li class="border-t border-white-light dark:border-white-light/10">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="!py-3 text-danger" @click="toggle">
                                            <svg class="h-4.5 w-4.5 rotate-90 ltr:mr-2 rtl:ml-2" width="18"
                                                height="18" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Sign Out
                                        </a>
                                            </form>
                                    </li>
                                </ul>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <!-- horizontal menu -->

                </div>
            </header>
            <!-- end header section -->
            <div class="animate__animated p-6" :class="[$store.app.animation]">
                @yield('content')
                <!-- start footer section -->
                <p class="pt-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2023</span>. Reeksoft All rights reserved.
                </p>
                <!-- end footer section -->
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>
    <script src="{{ asset('assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('assets/js/alpine-persist.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine-ui.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine-focus.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script defer src="{{ asset('assets/js/apexcharts.js') }}"></script>

    @yield('scripts')
    {{-- start --}}
    <script>
        const sales = {
            sizes: [],
            colors: [],
            quantities: [],

            addSection() {
                const sizeSelect = document.getElementById('size');
                const colorSelect = document.getElementById('color');
                const quantityInput = document.getElementById('quantity');

                const selectedSize = parseInt(sizeSelect.value);
                const selectedColor = parseInt(colorSelect.value);
                const selectedQuantity = quantityInput.value;

                if (selectedSize && selectedColor && selectedQuantity) {
                    this.sizes.push(selectedSize);
                    this.colors.push(selectedColor);
                    this.quantities.push(selectedQuantity);

                    this.updateSectionList();

                    // Reset form fields
                    sizeSelect.value = '';
                    colorSelect.value = '';
                    quantityInput.value = '';
                }
            },

            removeSection(index) {
                this.sizes.splice(index, 1);
                this.colors.splice(index, 1);
                this.quantities.splice(index, 1);

                this.updateSectionList();
            },

            updateSectionList() {
                const sectionList = document.getElementById('section-list');
                sectionList.innerHTML = '';

                for (let i = 0; i < this.sizes.length; i++) {
                    const size = this.sizes[i];
                    const color = this.colors[i];
                    const quantity = this.quantities[i];

                    const row = document.createElement('tr');

                    const sizeCell = document.createElement('td');
                    sizeCell.innerHTML = `<input type="text" readonly name="size[]" value="${size}">`;
                    row.appendChild(sizeCell);

                    const colorCell = document.createElement('td');
                    colorCell.innerHTML = `<input type="text" readonly name="color[]" value="${color}">`;
                    row.appendChild(colorCell);

                    const quantityCell = document.createElement('td');
                    quantityCell.innerHTML = `<input type="number" readonly name="quantity[]" value="${quantity}">`;
                    row.appendChild(quantityCell);

                    const actionCell = document.createElement('td');
                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.classList.add('btn', 'btn-danger');
                    removeButton.addEventListener('click', () => this.removeSection(i));
                    actionCell.appendChild(removeButton);
                    row.appendChild(actionCell);

                    sectionList.appendChild(row);
                }
            }
        };

        document.getElementById('add-section').addEventListener('click', () => sales.addSection());
    </script>


    <script>
        document.onreadystatechange = function() {
            if (document.readyState == 'complete') {
                document.addEventListener('alpine:init', () => {
                    // main section
                    Alpine.data('scrollToTop', () => ({
                        showTopButton: false,
                        init() {
                            window.onscroll = () => {
                                this.scrollFunction();
                            };
                        },

                        scrollFunction() {
                            if (document.body.scrollTop > 50 || document.documentElement.scrollTop >
                                50) {
                                this.showTopButton = true;
                            } else {
                                this.showTopButton = false;
                            }
                        },

                        goToTop() {
                            document.body.scrollTop = 0;
                            document.documentElement.scrollTop = 0;
                        },
                    }));

                    // theme customization
                    Alpine.data('customizer', () => ({
                        showCustomizer: false,
                    }));

                    // sidebar section
                    Alpine.data('sidebar', () => ({
                        init() {
                            const selector = document.querySelector('.sidebar ul a[href="' + window
                                .location
                                .pathname + '"]');
                            if (selector) {
                                selector.classList.add('active');
                                const ul = selector.closest('ul.sub-menu');
                                if (ul) {
                                    let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                    if (ele) {
                                        ele = ele[0];
                                        setTimeout(() => {
                                            ele.click();
                                        });
                                    }
                                }
                            }
                        },
                    }));

                    // header section
                    Alpine.data('header', () => ({
                        init() {
                            const selector = document.querySelector('ul.horizontal-menu a[href="' +
                                window
                                .location.pathname + '"]');
                            if (selector) {
                                selector.classList.add('active');
                                const ul = selector.closest('ul.sub-menu');
                                if (ul) {
                                    let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                    if (ele) {
                                        ele = ele[0];
                                        setTimeout(() => {
                                            ele.classList.add('active');
                                        });
                                    }
                                }
                            }
                        },

                        notifications: [{
                                id: 1,
                                profile: 'user-profile.jpeg',
                                message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                                time: '45 min ago',
                            },
                            {
                                id: 2,
                                profile: 'profile-34.jpeg',
                                message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                                time: '9h Ago',
                            },
                            {
                                id: 3,
                                profile: 'profile-16.jpeg',
                                message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                                time: '9h Ago',
                            },
                        ],

                        messages: [{
                                id: 1,
                                image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                                title: 'Congratulations!',
                                message: 'Your OS has been updated.',
                                time: '1hr',
                            },
                            {
                                id: 2,
                                image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                                title: 'Did you know?',
                                message: 'You can switch between artboards.',
                                time: '2hr',
                            },
                            {
                                id: 3,
                                image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                                title: 'Something went wrong!',
                                message: 'Send Reposrt',
                                time: '2days',
                            },
                            {
                                id: 4,
                                image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                                title: 'Warning',
                                message: 'Your password strength is low.',
                                time: '5days',
                            },
                        ],


                        removeNotification(value) {
                            this.notifications = this.notifications.filter((d) => d.id !== value);
                        },

                        removeMessage(value) {
                            this.messages = this.messages.filter((d) => d.id !== value);
                        },
                    }));

                    // content section
                    Alpine.data('sales', () => ({
                        init() {
                            isDark = this.$store.app.theme === 'dark' ? true : false;
                            isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                            const revenueChart = null;
                            const salesByCategory = null;
                            const dailySales = null;
                            const totalOrders = null;

                            // revenue
                            setTimeout(() => {
                                this.revenueChart = new ApexCharts(this.$refs.revenueChart,
                                    this
                                    .revenueChartOptions);
                                this.$refs.revenueChart.innerHTML = '';
                                this.revenueChart.render();

                                // sales by category
                                this.salesByCategory = new ApexCharts(this.$refs
                                    .salesByCategory, this
                                    .salesByCategoryOptions);
                                this.$refs.salesByCategory.innerHTML = '';
                                this.salesByCategory.render();

                                // daily sales
                                this.dailySales = new ApexCharts(this.$refs.dailySales, this
                                    .dailySalesOptions);
                                this.$refs.dailySales.innerHTML = '';
                                this.dailySales.render();

                                // total orders
                                this.totalOrders = new ApexCharts(this.$refs.totalOrders,
                                    this
                                    .totalOrdersOptions);
                                this.$refs.totalOrders.innerHTML = '';
                                this.totalOrders.render();
                            }, 300);

                            this.$watch('$store.app.theme', () => {
                                isDark = this.$store.app.theme === 'dark' ? true : false;

                                this.revenueChart.updateOptions(this.revenueChartOptions);
                                this.salesByCategory.updateOptions(this
                                    .salesByCategoryOptions);
                                this.dailySales.updateOptions(this.dailySalesOptions);
                                this.totalOrders.updateOptions(this.totalOrdersOptions);
                            });

                            this.$watch('$store.app.rtlClass', () => {
                                isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                                this.revenueChart.updateOptions(this.revenueChartOptions);
                            });
                        },

                        // revenue
                        get revenueChartOptions() {
                            return {
                                series: [{
                                        name: 'Income',
                                        data: [16800, 16800, 15500, 17800, 15500, 17000,
                                            19000, 16000,
                                            15000, 17000, 14000, 17000
                                        ],
                                    },
                                    {
                                        name: 'Expenses',
                                        data: [16500, 17500, 16200, 17300, 16000, 19500,
                                            16000, 17000,
                                            16000, 19000, 18000, 19000
                                        ],
                                    },
                                ],
                                chart: {
                                    height: 325,
                                    type: 'area',
                                    fontFamily: 'Nunito, sans-serif',
                                    zoom: {
                                        enabled: false,
                                    },
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                stroke: {
                                    show: true,
                                    curve: 'smooth',
                                    width: 2,
                                    lineCap: 'square',
                                },
                                dropShadow: {
                                    enabled: true,
                                    opacity: 0.2,
                                    blur: 10,
                                    left: -7,
                                    top: 22,
                                },
                                colors: isDark ? ['#2196f3', '#e7515a'] : ['#1b55e2',
                                    '#e7515a'
                                ],
                                markers: {
                                    discrete: [{
                                            seriesIndex: 0,
                                            dataPointIndex: 6,
                                            fillColor: '#1b55e2',
                                            strokeColor: 'transparent',
                                            size: 7,
                                        },
                                        {
                                            seriesIndex: 1,
                                            dataPointIndex: 5,
                                            fillColor: '#e7515a',
                                            strokeColor: 'transparent',
                                            size: 7,
                                        },
                                    ],
                                },
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                                    'Sep',
                                    'Oct', 'Nov', 'Dec'
                                ],
                                xaxis: {
                                    axisBorder: {
                                        show: false,
                                    },
                                    axisTicks: {
                                        show: false,
                                    },
                                    crosshairs: {
                                        show: true,
                                    },
                                    labels: {
                                        offsetX: isRtl ? 2 : 0,
                                        offsetY: 5,
                                        style: {
                                            fontSize: '12px',
                                            cssClass: 'apexcharts-xaxis-title',
                                        },
                                    },
                                },
                                yaxis: {
                                    tickAmount: 7,
                                    labels: {
                                        formatter: (value) => {
                                            return value / 1000 + 'K';
                                        },
                                        offsetX: isRtl ? -30 : -10,
                                        offsetY: 0,
                                        style: {
                                            fontSize: '12px',
                                            cssClass: 'apexcharts-yaxis-title',
                                        },
                                    },
                                    opposite: isRtl ? true : false,
                                },
                                grid: {
                                    borderColor: isDark ? '#191e3a' : '#e0e6ed',
                                    strokeDashArray: 5,
                                    xaxis: {
                                        lines: {
                                            show: true,
                                        },
                                    },
                                    yaxis: {
                                        lines: {
                                            show: false,
                                        },
                                    },
                                    padding: {
                                        top: 0,
                                        right: 0,
                                        bottom: 0,
                                        left: 0,
                                    },
                                },
                                legend: {
                                    position: 'top',
                                    horizontalAlign: 'right',
                                    fontSize: '16px',
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        offsetX: -2,
                                    },
                                    itemMargin: {
                                        horizontal: 10,
                                        vertical: 5,
                                    },
                                },
                                tooltip: {
                                    marker: {
                                        show: true,
                                    },
                                    x: {
                                        show: false,
                                    },
                                },
                                fill: {
                                    type: 'gradient',
                                    gradient: {
                                        shadeIntensity: 1,
                                        inverseColors: !1,
                                        opacityFrom: isDark ? 0.19 : 0.28,
                                        opacityTo: 0.05,
                                        stops: isDark ? [100, 100] : [45, 100],
                                    },
                                },
                            };
                        },

                        // sales by category
                        get salesByCategoryOptions() {
                            return {
                                series: [985, 737, 270],
                                chart: {
                                    type: 'donut',
                                    height: 460,
                                    fontFamily: 'Nunito, sans-serif',
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                stroke: {
                                    show: true,
                                    width: 25,
                                    colors: isDark ? '#0e1726' : '#fff',
                                },
                                colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'] :
                                    ['#e2a03f',
                                        '#5c1ac3', '#e7515a'
                                    ],
                                legend: {
                                    position: 'bottom',
                                    horizontalAlign: 'center',
                                    fontSize: '14px',
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        offsetX: -2,
                                    },
                                    height: 50,
                                    offsetY: 20,
                                },
                                plotOptions: {
                                    pie: {
                                        donut: {
                                            size: '65%',
                                            background: 'transparent',
                                            labels: {
                                                show: true,
                                                name: {
                                                    show: true,
                                                    fontSize: '29px',
                                                    offsetY: -10,
                                                },
                                                value: {
                                                    show: true,
                                                    fontSize: '26px',
                                                    color: isDark ? '#bfc9d4' : undefined,
                                                    offsetY: 16,
                                                    formatter: (val) => {
                                                        return val;
                                                    },
                                                },
                                                total: {
                                                    show: true,
                                                    label: 'Total',
                                                    color: '#888ea8',
                                                    fontSize: '29px',
                                                    formatter: (w) => {
                                                        return w.globals.seriesTotals
                                                            .reduce(function(a,
                                                                b) {
                                                                return a + b;
                                                            }, 0);
                                                    },
                                                },
                                            },
                                        },
                                    },
                                },
                                labels: ['Apparel', 'Sports', 'Others'],
                                states: {
                                    hover: {
                                        filter: {
                                            type: 'none',
                                            value: 0.15,
                                        },
                                    },
                                    active: {
                                        filter: {
                                            type: 'none',
                                            value: 0.15,
                                        },
                                    },
                                },
                            };
                        },

                        // daily sales
                        get dailySalesOptions() {
                            return {
                                series: [{
                                        name: 'Sales',
                                        data: [44, 55, 41, 67, 22, 43, 21],
                                    },
                                    {
                                        name: 'Last Week',
                                        data: [13, 23, 20, 8, 13, 27, 33],
                                    },
                                ],
                                chart: {
                                    height: 160,
                                    type: 'bar',
                                    fontFamily: 'Nunito, sans-serif',
                                    toolbar: {
                                        show: false,
                                    },
                                    stacked: true,
                                    stackType: '100%',
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                stroke: {
                                    show: true,
                                    width: 1,
                                },
                                colors: ['#e2a03f', '#e0e6ed'],
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0,
                                        },
                                    },
                                }, ],
                                xaxis: {
                                    labels: {
                                        show: false,
                                    },
                                    categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri',
                                        'Sat'
                                    ],
                                },
                                yaxis: {
                                    show: false,
                                },
                                fill: {
                                    opacity: 1,
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '25%',
                                    },
                                },
                                legend: {
                                    show: false,
                                },
                                grid: {
                                    show: false,
                                    xaxis: {
                                        lines: {
                                            show: false,
                                        },
                                    },
                                    padding: {
                                        top: 10,
                                        right: -20,
                                        bottom: -20,
                                        left: -20,
                                    },
                                },
                            };
                        },

                        // total orders
                        get totalOrdersOptions() {
                            return {
                                series: [{
                                    name: 'Sales',
                                    data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
                                }, ],
                                chart: {
                                    height: 290,
                                    type: 'area',
                                    fontFamily: 'Nunito, sans-serif',
                                    sparkline: {
                                        enabled: true,
                                    },
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2,
                                },
                                colors: isDark ? ['#00ab55'] : ['#00ab55'],
                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                yaxis: {
                                    min: 0,
                                    show: false,
                                },
                                grid: {
                                    padding: {
                                        top: 125,
                                        right: 0,
                                        bottom: 0,
                                        left: 0,
                                    },
                                },
                                fill: {
                                    opacity: 1,
                                    type: 'gradient',
                                    gradient: {
                                        type: 'vertical',
                                        shadeIntensity: 1,
                                        inverseColors: !1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.05,
                                        stops: [100, 100],
                                    },
                                },
                                tooltip: {
                                    x: {
                                        show: false,
                                    },
                                },
                            };
                        },
                    }));
                });
                const sectionList = document.querySelector('#section-list');
                const addSectionBtn = document.querySelector('#add-section');

                let sections = [];
                if (addSectionBtn != null) {
                    addSectionBtn.addEventListener('click', function() {
                        const color = document.querySelector('#color').value;
                        const size = document.querySelector('#size').value;
                        const quantity = document.querySelector('#quantity').value;

                        if (color && size && quantity) {
                            const section = {
                                color,
                                size,
                                quantity
                            };
                            sections.push(section);
                            renderSections();
                        }
                    });
                }
                if (sectionList != null) {
                    sectionList.addEventListener('click', function(e) {
                        if (e.target.classList.contains('btn-remove')) {
                            const index = parseInt(e.target.dataset.index);
                            sections.splice(index, 1);
                            renderSections();
                        }
                    });
                }

            }
        }


        function renderSections() {
            sectionList.innerHTML = '';
            sections.forEach(function(section, index) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                <td>${section.color}</td>
                <td>${section.size}</td>
                <td>${section.quantity}</td>
                <td><button type="button" class="btn btn-sm btn-danger btn-remove" data-index="${index}">Remove</button></td>
                `;
                sectionList.appendChild(tr);
            });
        }


        // end
    </script>


</body>

<!-- Mirrored from html.vristo.sbthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 12:52:09 GMT -->

</html>
