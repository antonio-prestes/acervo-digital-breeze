<table
    class='max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden shadow'>
    <thead class="bg-gray-100 shadow h-10">
    <tr class="text-black text-center" style="height: 45px">
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Capa</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Titulo</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Autor</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Genero</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Status</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900"></th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900"></th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
    @forelse($itens as $item)
        <tr class="text-center" style="height: 100px">
            <td><img src="{{$item->img_url}}" alt="" class="shadow" width="95px"
                     style="
                     display: block;
                     margin: 4px auto 4px auto;
                     "
                />
            <td class="font-semibold">{{$item->title}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->category->name}}</td>
            <td>
                <span class="text-sm font-medium py-1 px-2 rounded align-middle text-gray-800 text-opacity-90
                {{ $item->status->name === 'Disponível' ? 'bg-green-100' : '' }}
                {{ $item->status->name === 'Não localizado' ? 'text-red-500 bg-red-100' : '' }}
                {{ $item->status->name === 'Emprestado' ? 'text-yellow-500 bg-yellow-100' : '' }}">
                    {{$item->status->name}}
                </span>
            </td>
            <td>
                <a href="{{route('collection.edit', $item->id)}}" class="text-blue-700 font-semibold">Editar</a>
            </td>
            <td>
                <a href="{{route('collection.delete', $item->id)}}"
                   class="text-red-700 font-semibold" onclick="return confirm('Are you sure?')">Excluir</a>
            </td>
        </tr>
    @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>
