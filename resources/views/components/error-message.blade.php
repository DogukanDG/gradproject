@if (session()->has('error'))
    <div x-data="{ show: true }" x-init='setTimeout(()=> show=false,3000)' x-show='show'
        class="fixed z-40 top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3">
        <p>{{ session('error') }}</p>
    </div>
@endif
