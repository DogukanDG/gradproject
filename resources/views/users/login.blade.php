<x-layout>


    <main>
        <div class="mx-4">
            <div class="bg-sky-200 border-1 border-sky-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Login
                    </h2>
                    <p class="mb-5">Login to your account</p>
                </header>

                <form method='POST' action="/users/authenticate">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2 font-bold">Email</label>
                        <input value="{{ old('email') }}" type="email"
                            class="border border-gray-200 rounded p-2 w-full" name="email"  placeholder = "john.doe@emu.edu.tr" required/>
                            
                        <!-- Error Example -->
                        @error('email')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2 font-bold">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" placeholder= "***********" required/>
                        @error('password')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>
                     <div class="mb-6">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Sign In
                        </button>
                    </div> 

                    <p>
                        Don't have an account?
                        <a href="/newregister" class="text-laravel underline decoration-blue-700 decoration-solid">Register</a>
                    </p>
            </div>
            </form>
        </div>
        </div>
    </main>



</x-layout>