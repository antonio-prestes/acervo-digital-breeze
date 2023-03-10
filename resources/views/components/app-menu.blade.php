<div class="flex justify-between">
    <a href="{{$url}}"
       class="mb-5 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150'">
        Adicionar
    </a>

    @if (Str::contains(url()->current(), 'collection'))
        <a href="{{ route('collection.export') }}"
           class="mb-5 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150'">
            <i class="far fa-file-excel mr-2"></i> Exportar Excel
        </a>
    @endif
</div>
