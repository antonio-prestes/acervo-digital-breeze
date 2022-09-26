<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex items-center justify-between border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="/">
                    <span class="sr-only">Your Company</span>
                    <x-application-logo/>
                </a>
            </div>
            <nav class="hidden space-x-10 md:flex">
                <a href="{{route('home')}}" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                <a href="{{route('about')}}" class="text-base font-medium text-gray-500 hover:text-gray-900">Sobre</a>
                <a href="{{route('contact')}}" class="text-base font-medium text-gray-500 hover:text-gray-900">Contato</a>
            </nav>
            @if (Route::has('login'))
                <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                    @auth
                        <a href="{{route('dashboard')}}" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Dashboard</a>
                    @else
                        <a href="{{route('login')}}" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Login</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.

      Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="{{url('storage/books.svg')}}" alt="Your Company">
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
