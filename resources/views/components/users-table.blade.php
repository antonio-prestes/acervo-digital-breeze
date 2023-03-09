<table class="max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden shadow">
    <thead class="bg-gray-100 shadow h-10">
    <tr class="text-black text-center">
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2">Usuário</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2"></th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2">Itens</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2">Perfil</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2">Acervo</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2"></th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900 py-4 sm:py-2"></th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
    @forelse($users as $user)
        <tr class="text-center h-3 sm:h-auto">
            <td class="py-4 sm:py-2">
                @if($user->picture)
                    <img src="{{ $user->picture }}" alt=""
                         class="shadow rounded-full mx-auto block w-14 h-14 mt-2 mb-2">
                @else
                    <img
                        src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?b=1&amp;s=612x612&amp;w=0&amp;k=20&amp;c=IJ1HiV33jl9wTVpneAcU2CEPdGRwuZJsBs_92uk_xNs="
                        alt="" class="shadow rounded-full mx-auto block w-14 h-14 mt-2 mb-2">
                @endif
            </td>
            <td class="text-start py-4 sm:py-2">
                <p class="font-bold">{{ $user->name }}</p>
                <p class="font-light">{{ $user->email }}</p>
            </td>
            <td class="py-4 sm:py-2">{{ $itens->where('user_id', $user->id)->count() }}</td>
            <td class="py-4 sm:py-2">{{ $user->profile }}</td>
            <td class="py-4 sm:py-2">
                <a href="{{ route('collection.index', $user->user) }}" class="text-green-700 font-semibold">Acessar
                    coleção</a>
            </td>
            <td class="py-4 sm:py-2">
                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-700 font-semibold">Editar</a>
            </td>
            <td class="py-4 sm:py-2">
                <a href="{{ route('users.delete', $user->id) }}" class="text-red-700 font-semibold"
                   onclick="return confirm('Are you sure?')">Excluir</a>
            </td>
        </tr>
    @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>
