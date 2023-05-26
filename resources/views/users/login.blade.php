<x-layout>
  <main>
<style>
  .btn-animate {
  animation-name: buttonAnimation;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@keyframes buttonAnimation {
  from {
    transform: scale(1);
  }
  to {
    transform: scale(1.05);
  }
}
</style>
 
<div class="flex justify-end items-center h-screen">
  <div class="w-1/2">
    <!-- Replace the placeholder image URL with your desired image source -->
    <img class="w-full h-auto max-h-screen" src="images/loginpic3.png" alt="Image">
  </div>
  <div class="w-1/2">
    <div class="mx-4">
      <div class="bg-gradient-to-r from-purple-400 to-indigo-500 border border-blue-200 p-10 rounded-lg max-w-lg mx-auto mt-24 animate-fadeIn">
        <header class="text-center">
          <h2 class="text-4xl font-bold uppercase text-white mb-4">Login</h2>
          <p class="text-xl text-white mb-6">Login to your account</p>
        </header>

        <form method="POST" action="/users/authenticate">
          @csrf

          <div class="mb-6">
            <label for="email" class="block text-white text-lg mb-2">Email</label>
            <input value="{{ old('email') }}" type="email"
              placeholder="Enter your email"
              class="border border-gray-300 rounded p-2 w-full text-gray-800 bg-white" name="email" />
            <!-- Error Example -->
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

          </div>

          <div class="mb-6">
            <label for="password" class="block text-white text-lg mb-2">Password</label>
            <input type="password"
              placeholder="Enter your password"
              class="border border-gray-300 rounded p-2 w-full text-gray-800 bg-white" name="password" />
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <button type="submit"
              class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4 transition-all duration-200 btn-animate">
              Sign In
            </button>
          </div>

          <p class="text-center text-white">
            Don't have an account?
            <a href="/register" class="text-blue-200 text-xl hover:underline">Register</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>



  
  </main>
</x-layout>
