<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acervo') }}
        </h2>
    </x-slot>
    <x-app-menu :url="'collection/create'"/>
</x-app-layout>
