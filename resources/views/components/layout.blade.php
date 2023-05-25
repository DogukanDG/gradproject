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

            
<nav class="bg-white :bg-slate-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 :border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="https://flowbite.com/" class="flex items-center">
      <img src="images/worklink1.png" class=" h-12 mr-6" alt="WorkLink Logo">
      <h1 class="self-center text-2xl font-bold whitespace-nowrap :text-white ">Work<span class = "text-blue-600 font-bold animate-pulse ">Link</span></h1>
  </a>
  <div class="flex md:order-2">
     
      
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white :bg-gray-800 md::bg-gray-900 :border-gray-700">
      <li>
        <a class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md::text-blue-500" href="/" >Home</a>
      </li>
      <li>
        <a  class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md::hover:text-blue-500 :text-white :hover:bg-gray-700 :hover:text-white md::hover:bg-transparent :border-gray-700" href="/employers">Employers</a>
      </li>
      <li>
        <a class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md::hover:text-blue-500 :text-white :hover:bg-gray-700 :hover:text-white md::hover:bg-transparent :border-gray-700" href="/job-seekers">JobSeekers</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

        </div>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <p>Welcome, {{ auth()->user()->name }}!</p>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>My Listings</a>
                </li>
                <li>
                    <form class='inline' method='POST' action='/logout'>
                        @csrf
                        <button>
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                </li>
            @else
                {{-- <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('newregister') }}">{{ __('Register') }}</a>
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
