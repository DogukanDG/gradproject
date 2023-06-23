 <x-layout>
     <style>
         #phone {
             width: 320px;
             /* Replace with your desired width */
         }
     </style>
     <section class="bg-white ">
         <div class="flex justify-center min-h-screen">
             <div class="hidden bg-cover lg:block lg:w-2/5"
                 style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')">
             </div>
             <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                 <div class="w-full">
                     <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize ">
                         Get your free account now.
                     </h1>

                     <p class="mt-4 text-gray-500 ">
                         Let’s get you all set up so you can verify your personal account and begin posting your job
                         listings.
                     </p>

                     <div class="mt-6">
                         <h1 class="text-gray-500">Select Your Role</h1>

                         <div class="mt-3 md:flex md:items-center md:-mx-2">
                             <button id="clientBtn" onclick="updateRole('employer', this)"
                                 class="flex justify-center w-full px-6 py-3 text-white rounded-lg md:w-auto md:mx-2 focus:outline-none bg-gray-200 text-gray-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                 </svg>
                                 <span class="mx-2">
                                     Employer
                                 </span>
                             </button>
                             <button id="jobSeekerBtn" onclick="updateRole('job-seeker', this)"
                                 class="flex justify-center w-full px-6 py-3 mt-4 border rounded-lg md:mt-0 md:w-auto md:mx-2 focus:outline-none bg-gray-200 text-gray-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                 </svg>
                                 <span class="mx-2">
                                     Job Seeker
                                 </span>
                             </button>
                         </div>
                     </div>



                     <form method="POST" action="{{ route('kayit') }}"
                         class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                         @csrf
                         <input type="hidden" id="roleInput" name="role">
                         <div>
                             <label for='name' class="block mb-2 text-sm text-gray-600 ">First Name</label>
                             <input value="{{ old('name') }}" name="name" type="text" placeholder="John"
                                 class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                             @error('name')
                                 <span class="text-red-500 text-xs mt-0.5" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div>
                             <label for='last_name' class="block mb-2 text-sm text-gray-600 ">Last name</label>
                             <input value="{{ old('last_name') }}" name='last_name' type="text" placeholder="Snow"
                                 class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                             @error('last_name')
                                 <span class="text-red-500 text-xs mt-0.5" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                         <div>
                             <label for="phone" class="block mb-2 text-sm text-gray-600">Phone Number</label>
                             <input id="phone" type="tel"
                                 class=" py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                 name="phone" value="{{ old('phone') }}" required>
                             @error('phone')
                                 <span class="text-red-500 text-xs mt-0.5" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                         <div>
                             <label for="email" class="block mb-2 text-sm text-gray-600 ">Email address</label>
                             <input name="email" value="{{ old('email') }}" type="email"
                                 placeholder="johnsnow@example.com"
                                 class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                             @error('email')
                                 <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                             @enderror
                         </div>

                         <div>
                             <label for="password" class="block mb-2 text-sm text-gray-600 ">Password</label>
                             <input name="password" type="password" required autocomplete="new-password"
                                 placeholder="Enter your password"
                                 class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                             @error('password')
                                 <span class="text-red-500 text-xs mt-0.5" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div>
                             <label for="password-confirm" class="block mb-2 text-sm text-gray-600 ">Confirm
                                 password</label>
                             <input name="password_confirmation" type="password" placeholder="Enter your password"
                                 class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                 required autocomplete="new-password" />
                         </div>

                         <button type="submit"
                             class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                             <span>Sign Up </span>

                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100"
                                 viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                     clip-rule="evenodd" />
                             </svg>
                         </button>
                     </form>
                 </div>
             </div>
         </div>
     </section>
     {{-- <div class="container mx-auto sm:px-4">
         <div class="flex flex-wrap  justify-center">
             <div class="md:w-2/3 pr-4 pl-4">
                 <div class="relative flex flex-col min-w-0 rounded break-words border border-1 border-gray-300">
                     <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                         {{ __('Register') }}</div>
                     <div class="flex-auto p-6">
                         <form method="POST" action="{{ route('kayit') }}">
                             @csrf
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="name"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Name') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="name" type="text"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('name') bg-red-700 @enderror"
                                         name="name" value="{{ old('name') }}" required autocomplete="name"
                                         autofocus>
                                     @error('name')
                                         <span class="text-red-500 text-xs mt-0.5" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="phone"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Phone Number') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="phone" type="tel"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('phone') bg-red-700 @enderror"
                                         name="phone" value="{{ old('phone') }}" required>
                                 </div>
                                 @error('phone')
                                     <span class="text-red-500 text-xs mt-0.5" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="mb-6">
                                 <label for="email" class="inline-block text-lg mb-2">Email</label>
                                 <input value="{{ old('email') }}" type="email"
                                     class="border border-gray-200 rounded p-2 w-full" name="email" />
                                 @error('email')
                                     <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="mb-6">
                                 <label for="name" class="inline-block text-lg mb-2">
                                     Select Your Role
                                 </label>
                                 <select name='role' class="border border-gray-200 rounded p-2 w-full">
                                     <option value="employer" selected="selected">Employer</option>
                                     <option value="job-seeker">Job-Seeker</option>
                                 </select>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="password"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Password') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="password" type="password"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('password') bg-red-700 @enderror"
                                         name="password" required autocomplete="new-password">
                                     @error('password')
                                         <span class="text-red-500 text-xs mt-0.5" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="password-confirm"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Confirm Password') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="password-confirm" type="password"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                         name="password_confirmation" required autocomplete="new-password">
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap  mb-0">
                                 <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                     <button type="submit"
                                         class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                         {{ __('Register') }}
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div> --}}
     <script>
         var input = document.querySelector("#phone");
         var iti = window.intlTelInput(input, {
             initialCountry: "us" // Set your default country code here
         });

         // Get the selected country code and update the phone number input
         input.addEventListener("change", function() {
             var countryCode = iti.getSelectedCountryData().dialCode;
             var phoneNumber = input.value;

             document.getElementById('phone').classList.add('w-full');
             // Check if the phone number already includes the country code
             if (phoneNumber.startsWith("+" + countryCode)) {
                 return; // No need to modify the input value
             }

             var formattedPhoneNumber = "+" + countryCode + phoneNumber;
             input.value = formattedPhoneNumber;
         });

         function updateRole(role, button) {
             var clientBtn = document.getElementById('clientBtn');
             var jobSeekerBtn = document.getElementById('jobSeekerBtn');
             const roleInput = document.getElementById('roleInput');

             // Reset button styles
             clientBtn.classList.remove('bg-blue-500', 'text-white');
             clientBtn.classList.add('bg-gray-200', 'text-gray-500');
             jobSeekerBtn.classList.remove('bg-blue-500', 'text-white');
             jobSeekerBtn.classList.add('bg-gray-200', 'text-gray-500');

             // Set selected button styles
             button.classList.remove('bg-gray-200', 'text-gray-500');
             button.classList.add('bg-blue-500', 'text-white');
             console.log(role);
             roleInput.value = role;
         }

         // Set "employer" as the default value
         window.addEventListener('DOMContentLoaded', function() {
             var clientBtn = document.getElementById('clientBtn');
             updateRole('employer', clientBtn);
         });
     </script>
     {{-- <main>
         <div class="mx-4">
             <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                 <header class="text-center">
                     <h2 class="text-2xl font-bold uppercase mb-1">
                         Register
                     </h2>
                     <p class="mb-4">Create an account to post listings</p>
                 </header>

                 <form method='POST' action="/users">
                     @csrf
                     <div class="mb-6">
                         <label for="name" class="inline-block text-lg mb-2">
                             Name
                         </label>
                         <input value="{{ old('name') }}" type="text"
                             class="border border-gray-200 rounded p-2 w-full" name="name" />
                         @error('name')
                             <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                         @enderror
                     </div>
                     <div class="mb-6">
                         <label for="name" class="inline-block text-lg mb-2">
                             Select Your Role
                         </label>
                         <select name='role' class="border border-gray-200 rounded p-2 w-full">
                             <option value="employer" selected="selected">Employer</option>
                             <option value="job-seeker">Job-Seeker</option>
                         </select>
                     </div>
                     <div class="mb-6">
                         <label for="email" class="inline-block text-lg mb-2">Email</label>
                         <input value="{{ old('email') }}" type="email"
                             class="border border-gray-200 rounded p-2 w-full" name="email" />
                         <!-- Error Example -->
                         @error('email')
                             <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                         @enderror
                     </div>
                     <div class="mb-6">
                         <label for="phone" class="inline-block text-lg mb-2">Phone Number</label>
                         <input value="{{ old('phone') }}" type="phone"
                             class="border border-gray-200 rounded p-2 w-full" name="phone" />
                         <!-- Error Example -->
                         @error('phone')
                             <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                         @enderror
                     </div>
                     <div class="mb-6">
                         <label for="password" class="inline-block text-lg mb-2">
                             Password
                         </label>
                         <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                         @error('password')
                             <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                         @enderror
                     </div>

                     <div class="mb-6">
                         <label for="password2" class="inline-block text-lg mb-2">
                             Confirm Password
                         </label>
                         <input type="password" class="border border-gray-200 rounded p-2 w-full"
                             name="password_confirmation" />
                         @error('password_confirmation')
                             <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                         @enderror
                     </div>

                     <div class="mb-6">
                         <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                             Sign Up
                         </button>
                     </div>

                     <div class="mt-8">
                         <p>
                             Already have an account?
                             <a href="/login" class="text-laravel">Login</a>
                         </p>
                     </div>
                 </form>
             </div>
         </div>
     </main> --}}

 </x-layout>
