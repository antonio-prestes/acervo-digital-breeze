<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acervo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-app-menu :url="'collection/create'"></x-app-menu>
                    @if(Session::has('message'))
                        @if(Session::has('message'))
                            <div class="px-6 py-4 mb-5 bg-green-50 rounded-lg text-green-700">
                                <span>{{Session::get('message')}}</span>
                            </div>
                        @endif
                    @endif
                    <x-itens-table :itens="$itens"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
