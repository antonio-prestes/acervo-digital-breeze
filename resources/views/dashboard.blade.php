<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-dash-card :itens="$itens"/>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                Últimos itens cadastrados
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-itens-table :itens="$itens"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
