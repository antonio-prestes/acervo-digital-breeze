<div class="py-12">
    <div class="max-w-sm sm:px-6 lg:px-8 ml-[200px]">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Total Itens
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{$itens->count()}}
                    </p>
                </div>
            </div>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-100 h-10 py-2">
                <a href="{{route('collection')}}" class="text-blue-700 font-semibold ml-3">Ver Todos</a>
            </p>
        </div>
    </div>
</div>

