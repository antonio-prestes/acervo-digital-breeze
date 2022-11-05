<table
    class='max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden shadow'>
    <thead class="bg-gray-100 shadow">
    <tr class="text-black text-center">
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Avatar</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">Nome</th>
        <th class="text-base font-medium text-gray-500 hover:text-gray-900">E-mail</th>
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
                     class="shadow rounded-full mx-auto block w-14 h-14"/>
            <td class="font-semibold">{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>admin</td>
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
