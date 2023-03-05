<div class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mt-5">
            <div class="relative flex flex-col items-center">
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
                    <div class="flex flex-col items-center pb-5 mt-5">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                             src="{{$user->picture}}"
                             alt="Bonnie image"
                        />
                        <a href="{{ route('collection.index', $user->user) }}"
                           class="mb-1 text-xl font-medium text-gray-900">{{$user->name}}</a>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->user}}</span>
                        <a href="mailto:{{$user->email}}" class="mt-1">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
