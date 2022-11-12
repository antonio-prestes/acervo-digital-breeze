<table
    class='max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden shadow'>
    <thead class="bg-gray-100 shadow h-10">
    <tr class="text-black text-center">
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Usuário</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900"></th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Itens</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Perfil</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Acervo</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900"></th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900"></th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
    @forelse($users as $user)
        <tr class="text-center h-3">
            <td>
                @if($user->picture)
                    <img src="{{ $user->picture }}" alt="" class="shadow rounded-full mx-auto block w-14 h-14 mt-2 mb-2">
                @else
                    <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?b=1&s=612x612&w=0&k=20&c=IJ1HiV33jl9wTVpneAcU2CEPdGRwuZJsBs_92uk_xNs=" alt="" class="shadow rounded-full mx-auto block w-14 h-14 mt-2 mb-2">
                @endif
            <td class="text-start">
                <p class="font-bold">{{$user->name}}</p>
                <p class="font-light">{{$user->email}}</p>
            </td>
            <td>{{$itens->where('user_id', $user->id)->count()}}</td>
            <td>{{$user->profile}}</td>
            <td>link do acervo</td>
            <td>
                <a href="{{route('users.edit', $user->id)}}"
                   class="text-blue-700 font-semibold">Editar</a>
            </td>
            <td>
                <a href="{{route('users.delete', $user->id)}}"
                   class="text-red-700 font-semibold" onclick="return confirm('Are you sure?')">Excluir</a>
            </td>
        </tr>
    @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>
