<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Login
                    </h2>
                    <p class="mb-4">Login to your account</p>
                </header>

                <form method='POST' action="/users/authenticate">
                    @csrf

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
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                        @error('password')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>
                     <div class="mb-6">
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Sign In
                        </button>
                    </div> 

                    <p>
                        Dont have an account?
                        <a href="/newregister" class="text-laravel">Register</a>
                    </p>
            </div>
            </form>
        </div>
        </div>
    </main>



</x-layout>