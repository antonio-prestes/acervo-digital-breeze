<div class="max-w-6xl mx-auto overflow-x-auto">
    <table class="table-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 shadow">
        <thead class="bg-gray-100 shadow">
        <tr class="text-black text-center">
            <th class="py-3 text-base font-medium text-gray-500 hover:text-gray-900">Capa</th>
            <th class="py-3 text-base font-medium text-gray-500 hover:text-gray-900">Título</th>
            <th class="py-3 text-base font-medium text-gray-500 hover:text-gray-900">Autor</th>
            <th class="py-3 text-base font-medium text-gray-500 hover:text-gray-900">Gênero</th>
            <th class="py-3 text-base font-medium text-gray-500 hover:text-gray-900">Status</th>
            <th class="py-3"></th>
            <th class="py-3"></th>
            <th class="py-3"></th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @forelse($itens as $item)
            <tr class="text-center">
                <td class="py-3">
                    <img src="{{$item->img_url}}" alt="" class="w-24 h-32 object-cover mx-auto shadow" />
                </td>
                <td class="py-3 font-semibold">{{$item->title}}</td>
                <td class="py-3">{{$item->author}}</td>
                <td class="py-3">{{$item->category->name}}</td>
                <td class="py-3">
          <span class="inline-block px-3 py-1 rounded text-sm font-medium text-gray-800 text-opacity-90
            @if($item->status->name === 'Disponível') bg-green-100 @endif
            @if($item->status->name === 'Não localizado') text-red-500 bg-red-100 @endif
            @if($item->status->name === 'Emprestado') text-yellow-500 bg-yellow-100 @endif">
            {{$item->status->name}}
          </span>
                </td>
                <td class="py-3">
                    <a href="{{route('collection.item', $item->id)}}" class="text-green-700 font-semibold hover:underline">Visualizar</a>
                </td>
                <td class="py-3">
                    <a href="{{route('collection.edit', $item->id)}}" class="text-blue-700 font-semibold hover:underline">Editar</a>
                </td>
                <td class="py-3">
                    <a href="{{route('collection.delete', $item->id)}}" class="text-red-700 font-semibold hover:underline"
                       onclick="return confirm('Are you sure?')">Excluir</a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="py-3 text-center" colspan="8">Sem resultados</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
