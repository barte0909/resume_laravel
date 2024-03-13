@if(session()->has('successMessage'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 8000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center mt-2 mb-20">
    <div class="bg-gray-200 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md ">
        <div class="flex items-center">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-600 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm2-9H8a1 1 0 00-1 1v4a1 1 0 002 0v-2h2a1 1 0 000-2h-2V9a1 1 0 00-1-1zm0-6a1 1 0 011 1v1h1a1 1 0 100-2h-2z"/></svg></div>
            <div>
                <p class="font-bold">Message</p>
                <p class="text-sm">{{ session('successMessage') }}</p>
            </div>
        </div>
    </div>
</div>
@endif




