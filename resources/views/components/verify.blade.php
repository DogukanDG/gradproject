<x-layout>
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap  justify-center">
            <div class="md:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        {{ __('Verify Your Phone Number') }}</div>
                    <div class="flex-auto p-6">
                        @if (session('error'))
                            <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800"
                                role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        Please enter the OTP sent to your number: {{ session('userInfo')['phone'] }}
                        <form action="{{ route('verify') }}" method="post">
                            @csrf
                            <input type="hidden" name="name" value="{{ session('userInfo')['name'] }}">
                            <input type="hidden" name="last_name" value="{{ session('userInfo')['last_name'] }}">
                            <input type="hidden" name="role" value="{{ session('userInfo')['role'] }}">
                            <input type="hidden" name="email" value="{{ session('userInfo')['email'] }}">
                            <input type="hidden" name="password" value="{{ session('userInfo')['password'] }}">

                            <div class="mb-4 flex flex-wrap ">
                                <label for="verification_code"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Phone Number') }}</label>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input type="hidden" name="phone" value="{{ session('userInfo')['phone'] }}">
                                    <input id="verification_code" type="tel"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('verification_code') bg-red-700 @enderror"
                                        name="verification_code" value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 flex flex-wrap  mb-0">
                                <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                    <button type="submit"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                        {{ __('Verify Phone Number') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
