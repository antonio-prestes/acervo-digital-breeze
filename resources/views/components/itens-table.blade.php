<table
    class='max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden mt-5 shadow'>
    <thead class="bg-gray-100 shadow">
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
            <td>{{$item->title}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->status->name}}</td>
            <td>
                <a href="" style="color: blue">Editar</a>
            </td>
            <td>
                <a href="" style="color: red">Excluir</a>
            </td>
        </tr>
    @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>
