 <x-layout>

 <style>
    .form-container {
        background: linear-gradient(45deg, #4F46E5, #3B82F6);
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        max-width: 400px; /* Adjust the maximum width as needed */
        margin: 0 auto; /* Center the form horizontally */
    }

    .form-title {
        background: rgba(255, 255, 255, 0.1);
        padding: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-field {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.5);
    }

   
    .form-select {
        width: 100%;
        padding: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.1);
        color: #000; /* Change the text color to black or any other suitable color */
    }



    .form-button {
        background: linear-gradient(45deg, #3B82F6, #4F46E5);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .form-button:hover {
        background: linear-gradient(45deg, #3B82F6, #8A4FFF);
    }
</style>



<div class="container mx-auto sm:px-4">
    <div class="flex flex-wrap justify-center">
        <div class="md:w-2/3 pr-4 pl-4 pt-16">
            <div class="relative flex flex-col min-w-0 rounded break-words form-container">
                <h2 class="text-4xl font-bold uppercase text-white mb-1 animate-pulse text-center">
                    {{ __('Register') }}
                </h2>
                <div class="flex-auto p-6">
                    <form method="POST" action="{{ route('kayit') }}">
                        @csrf

                        <div class="form-field">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-input" name="name" value="{{ old('name') }}"
                                placeholder="{{ __('Enter your name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                            <input id="phone" type="tel" class="form-input" name="phone" value="{{ old('phone') }}"
                                placeholder="{{ __('Enter your phone number') }}" required>
                            @error('phone')
                            <span class="text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email') }}" type="email" class="form-input" name="email"
                                placeholder="{{ __('Enter your email') }}" />
                            @error('email')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="name" class="form-label">Select Your Role</label>
                            <select name='role' class="form-select">
                                <option value="employer" selected="selected">Employer</option>
                                <option value="job-seeker">Job-Seeker</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-input" name="password" required
                                placeholder="{{ __('Enter your password') }}" autocomplete="new-password">
                            @error('password')
                            <span class="text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-input"
                                name="password_confirmation" required placeholder="{{ __('Confirm your password') }}"
                                autocomplete="new-password">
                        </div>

                        <div class="form-field mb-0">
                            <button type="submit" class="form-button">
                                <span class="animate-pulse">{{ __('Register') }}</span>
                            </button>
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
