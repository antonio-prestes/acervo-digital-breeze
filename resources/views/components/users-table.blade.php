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
                <img src="https://cdn5.vectorstock.com/i/1000x1000/51/99/icon-of-user-avatar-for-web-site-or-mobile-app-vector-3125199.jpg"
                     alt=""
                     class="shadow rounded-full mx-auto block w-14 h-14 mt-2 mb-2"/>
            <td class="text-start">
                <p class="font-bold">{{$user->name}}</p>
                <p class="font-light">{{$user->email}}</p>
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->profile}}</td>
            <td>link do acervo</td>
            <td>
                <a href="" class="text-blue-700 font-semibold">Editar</a>
            </td>
            <td>
                <a href=""
                   class="text-red-700 font-semibold" onclick="return confirm('Are you sure?')">Excluir</a>
            </td>
        </tr>
    @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>
