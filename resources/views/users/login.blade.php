<x-layout>
    <main>
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">WorkLink</h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
                            autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam
                            temporibus
                            molestiae
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
                        </div>

                        <p class="mt-3 text-gray-500">Sign in to access your account</p>
                    </div>

                    <div class="mt-8">
                        <form method='POST' action="/users/authenticate">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email
                                    Address</label>
                                <input type="email" name="email" placeholder="example@example.com"
                                    value="{{ old('email') }}"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg " />
                                @error('email')
                                    <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600">Password</label>
                                </div>

                                <input type="password" name="password" placeholder="Your Password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg " />
                                @error('password')
                                    <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a
                                href="/newregister"
                                class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign
                                up</a>.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layout>
