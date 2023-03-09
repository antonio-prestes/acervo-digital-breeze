<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                        <x-app-menu :url="'users/create'" class="mb-4 sm:mb-0"></x-app-menu>
                        @if(Session::has('message'))
                            <div class="px-6 py-4 mb-5 bg-green-50 rounded-lg text-green-700">
                                <span>{{Session::get('message')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="overflow-x-auto">
                        <x-users-table :users="$users" :itens="$itens"></x-users-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
