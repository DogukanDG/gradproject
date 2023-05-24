 <x-layout>
     <div class="container mx-auto sm:px-4">
         <div class="flex flex-wrap  justify-center">
             <div class="md:w-2/3 pr-4 pl-4">
                 <div
                     class="relative flex flex-col min-w-0 rounded break-words border bg-blue-300 border-1 border-sky-500">
                     <div class="py-3 px-6 mb-0 bg-sky-300 border-b-1 border-gray-300 text-xl font-semibold text-black-600/100 dark:text-black-500/100 ">
                         {{ __('Register') }}</div>
                     <div class="flex-auto p-6">
                         <form method="POST" action="{{ route('kayit') }}">
                             @csrf
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="name"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right text-xl font-semibold text-black-600/100 dark:text-black-500/100">{{ __('Name') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="name" type="text"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-sky-500 rounded @error('name') bg-red-700 @enderror"
                                         name="name" value="{{ old('name') }}" required autocomplete="name"
                                         autofocus>
                                     @error('name')
                                         <span class="hidden mt-1 text-sm text-red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="phone"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right text-xl font-semibold text-black-600/100 dark:text-black-500/100">{{ __('Phone Number') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="phone" type="tel"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-sky-500 rounded @error('phone') bg-red-700 @enderror"
                                         name="phone" value="{{ old('phone') }}" required>
                                     @error('phone')
                                         <span class="hidden mt-1 text-sm text-red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="mb-6">
                                 <label for="email" class="inline-block text-lg mb-2 text-xl font-semibold text-black-600/100 dark:text-black-500/100">Email</label>
                                 <input value="{{ old('email') }}" type="email"
                                     class="border border-sky-500 rounded rounded p-2 w-full" name="email" placeholder = "john.doe@emu.edu.tr" required/>
                                 <!-- Error Example -->
                                 @error('email')
                                     <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="mb-6">
                                 <label for="name" class="inline-block text-lg mb-2 text-xl font-semibold text-black-600/100 dark:text-black-500/100">
                                     Select Your Role
                                 </label>
                                 <select name='role' class="border border-sky-500 rounded rounded p-2 w-full text-lg">
                                     <option value="employer" selected="selected">Employer</option>
                                     <option value="job-seeker">Job-Seeker</option>
                                 </select>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="password"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right text-xl font-semibold text-black-600/100 dark:text-black-500/100">{{ __('Password') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="password" type="password"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-sky-500 rounded @error('password') bg-red-700 @enderror"
                                         name="password" required autocomplete="new-password" placeholder = "***********" required>
                                     @error('password')
                                         <span class="hidden mt-1 text-sm text-red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap ">
                                 <label for="password-confirm"
                                     class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right text-xl font-semibold text-black-600/100 dark:text-black-500/100">{{ __('Confirm Password') }}</label>
                                 <div class="md:w-1/2 pr-4 pl-4">
                                     <input id="password-confirm" type="password"
                                         class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-sky-500 rounded"
                                         name="password_confirmation" required autocomplete="new-password" placeholder = "***********" required>
                                 </div>
                             </div>
                             <div class="mb-4 flex flex-wrap  mb-0">
                                 <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                     <button type="submit"
                                         class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                         {{ __('Register') }}
                                     </button>
                                     
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
     {{-- <main>
         <div class="mx-4">
             <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                 <header class="text-center">
                     <h2 class="text-2xl font-bold uppercase mb-1">
                         Register
                     </h2>
                     <p class="mb-4">Create an account to post gigs</p>
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
