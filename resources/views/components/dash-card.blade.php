<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-around">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow w-1/4">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
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
        @if(Auth::user()->profile == 'admin')
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow w-1/4">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Usuários
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{$users->count()}}
                    </p>
                </div>
            </div>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-100 h-10 py-2">
                <a href="{{route('users')}}" class="text-blue-700 font-semibold ml-3">Ver Todos</a>
            </p>
        </div>
        @endif
    </div>
</div>

