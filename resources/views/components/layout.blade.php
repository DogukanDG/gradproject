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

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <div class="flex items-center">

            <nav class="bg-white shadow">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center py-4">
                        <a href="/"><img class="w-24" src="{{ asset('images/logo3.png') }}" alt=""
                                class="logo" /></a>
                        <div class="flex">
                            <a class=" font-bold text-gray-800 text-bold hover:text-gray-600 px-4"
                                href="/">Home</a>
                            <a class="font-bold text-gray-800 hover:text-gray-600 px-4" href="/employers">Employers</a>
                            <a class="font-bold text-gray-800 hover:text-gray-600 px-4" href="/job-seekers">Job
                                Seekers</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <p>Welcome, {{ auth()->user()->name }}!</p>
                <li>
                    @php
                        $route = auth()->user()->role;
                        if ($route == 'employer') {
                            $route = '/applications';
                        } elseif ($route == 'job-seeker') {
                            $route = '/offers';
                        }
                    @endphp
                    @if (auth()->user()->role == 'employer')
                        <a href={{ $route }} class="hover:text-laravel"><i class="fa-solid fa-book "></i>
                            Applications</a>
                    @elseif (auth()->user()->role == 'job-seeker')
                        <a href={{ $route }} class="hover:text-laravel"><i class="fa-solid fa-envelope"></i>
                            Offers</a>
                    @else
                        <p>Else</p>
                    @endif
                </li>
                <li>
                    @php
                        $route = auth()->user()->role;
                        if ($route == 'employer') {
                            $route = '/listings/manage';
                        } elseif ($route == 'job-seeker') {
                            $route = '/listings/jobseekermanage';
                        }
                    @endphp
                    <a href={{ $route }} class="hover:text-laravel"><i class="fa-solid fa-gear"></i> My Listings</a>

                </li>
                <li>
                    <form class='inline' method='POST' action='/logout'>
                        @csrf
                        <button>
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                {{-- <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('newregister') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        {{ __('Register') }}</a>
                </li <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    {{-- View Output --}}
    <main>
        {{ $slot }}
    </main>
</body>
{{-- <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
</footer> --}}
<x-flash-message />

</html>
