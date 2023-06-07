<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon2.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
    <link href=https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#2e2eff",
                    },
                },
            },
        };
    </script>
    <title>WorkLink | Find Laravel Jobs & Projects</title>
</head>

<body class="">

    {{-- <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="/"><img class="w-24" src="{{ asset('images/logo3.png') }}" alt=""
                        class="logo" /></a>
                <div class="flex">
                    <a class=" font-bold text-gray-800 text-bold hover:text-gray-600 px-4" href="/">Home</a>
                    <a class="font-bold text-gray-800 hover:text-gray-600 px-4" href="/employers">Employers</a>
                    <a class="font-bold text-gray-800 hover:text-gray-600 px-4" href="/job-seekers">Job
                        Seekers</a>
                </div>
            </div>
        </div>
    </nav> --}}

    <nav class="sticky top-0 bg-white  w-full border-b border-gray-300 ">
        <div class="max-w-screen flex flex-wrap items-center justify-between mx-10 p-4">
            <a href="/" class="flex items-center">
                <img src="{{ asset('/images/homepageimages/worklink1.png') }}" class="w-12 h-12 mr-3"
                    alt="WorkLink Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">WorkLink</span>
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">

                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-10 md:mt-0 md:border-0 md:bg-white ">

                    @auth
                        <li>
                            <a href="/"
                                class="block py-2 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                                aria-current="page">Home</a>
                        </li>
                        @if (auth()->user()->role == 'job-seeker')
                            <li>
                                <a href="/employers"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Employers</a>
                            </li>
                        @elseif (auth()->user()->role == 'employer')
                            <li>
                                <a href="/job-seekers"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Job
                                    Seekers</a>
                            </li>
                        @endif
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Options
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <div id="dropdownNavbar"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                    @if (auth()->user()->role == 'admin')
                                        <li>
                                            <a href="/admin" class="block px-4 py-2 hover:bg-gray-100 "><i
                                                    class="fa-solid fa-gear mr-2"></i>Admin Panel</a>
                                        </li>
                                    @else
                                        <li>
                                            <p class="block px-4 py-2">{{ auth()->user()->name }}
                                                {{ auth()->user()->last_name }} </a>
                                        </li>
                                        @php
                                            $route = auth()->user()->role;
                                            $routeText = '';
                                            if ($route == 'employer') {
                                                $route = '/applications';
                                                $routeText = 'Applications';
                                            } elseif ($route == 'job-seeker') {
                                                $route = '/offers';
                                                $routeText = 'Offers';
                                            } else {
                                                $routeText = '-';
                                            }
                                        @endphp
                                        <li>
                                            <a href='{{ $route }}' class="block px-4 py-2 hover:bg-gray-100"> <i
                                                    class="fa-solid fa-book mr-2"></i>{{ $routeText }}</a>
                                        </li>

                                        @php
                                            $route = auth()->user()->role;
                                            if ($route == 'employer') {
                                                $route = '/listings/manage';
                                            } elseif ($route == 'job-seeker') {
                                                $route = '/listings/jobseekermanage';
                                            }
                                        @endphp
                                        <li>
                                            <a href="{{ $route }}" class="block px-4 py-2 hover:bg-gray-100 "><i
                                                    class="fa-solid fa-gear mr-2"></i>My
                                                Listings</a>
                                        </li>

                                </ul>
                                @endif
                                <div class="py-1">
                                    <form class='inline' method='POST' action='/logout'>
                                        @csrf
                                        <button class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fa-solid fa-door-closed mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>


                        </li>
                    </ul>
                @else
                    <div class="hidden w-full md:block md:w-auto">
                        <ul
                            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-10 md:mt-0 md:border-0 md:bg-white ">
                            <li class="nav-item">
                                <a class="block py-2 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                                    href="{{ route('newregister') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                    {{ __('Register') }}</a>
                            </li>
                            <a href="/login"
                                class="block py-2 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i>
                                Login</a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>

        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>
<x-flash-message />

</html>
