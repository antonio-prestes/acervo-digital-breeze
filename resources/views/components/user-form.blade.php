@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <div class="px-6 py-4 mb-5 bg-red-50 rounded-lg text-red-700">
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store')}}"
      enctype="multipart/form-data">
    @csrf
    @isset($user->id)
        @method('PUT')
    @endisset
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
            <div class="mt-2">
                <div>
                    <x-input-label for="picture" :value="__('Avatar')"/>

                    <x-picture-input user="{{ isset($user->picture) ? $user->picture : '' }}"></x-picture-input>
                </div>
                @if(Auth::user()->profile == 'admin')
                    <div class="mt-2">
                        <x-input-label for="profile" :value="__('Perfil')"/>

                        <select id="profile"
                                class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="profile"
                                required autofocus>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                @endif
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3 mb-4">
                    <x-input-label for="user" :value="__('Username')"/>

                    <x-text-input id="user" class="block w-full" type="text" name="user"
                                  value="{{ isset($user->user) ? $user->user : '' }}" required
                                  autofocus></x-text-input>
                </div>
                <div class="w-full px-3 mb-4">
                    <x-input-label for="name" :value="__('Nome')"/>

                    <x-text-input id="name" class="block w-full" type="text" name="name"
                                  value="{{ isset($user->name) ? $user->name : '' }}" required
                                  autofocus></x-text-input>
                </div>
                <div class="w-full px-3 mb-4">
                    <x-input-label for="email" :value="__('Email')"/>

                    <x-text-input id="email" class="block w-full" type="email" name="email"
                                  value="{{ isset($user->email) ? $user->email : '' }}"
                                  required></x-text-input>
                </div>
                <div class="w-full px-3 mb-4">
                    <x-input-label for="password"
                                   value="{{isset($user->password) ? 'Nova senha' : 'Senha'}}"></x-input-label>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"></x-text-input>
                </div>
            </div>
            <div class="flex justify-end mt-2">
                <div class="">
                    <a href="{{route('users')}}">
                        <x-primary-button class="ml-3 bg-red-700 hover:bg-red-600" type="button">
                            {{ __('Cancelar') }}
                        </x-primary-button>
                    </a>
                    <x-primary-button class="ml-3 bg-green-700 hover:bg-green-600">
                        @if(isset($user))
                            {{ __('Editar') }}
                        @else
                            {{ __('Criar') }}
                        @endif
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</form>
