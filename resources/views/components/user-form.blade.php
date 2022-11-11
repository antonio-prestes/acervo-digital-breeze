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
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="">
    <div class="w-1/2">
    <div class="mt-2">
        <x-input-label for="name" :value="__('Perfil')"></x-input-label>
        <select id="status_id"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" name="status_id"
                required autofocus>
                <option>Admin</option>
                <option>User</option>
        </select>
    </div>
    <div class="nt-2">
        <x-input-label for="name" :value="__('Nome')"></x-input-label>

        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                      autofocus></x-text-input>
    </div>
    <div class="mt-2">
        <x-input-label for="email" :value="__('Email')"></x-input-label>

        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                      required></x-text-input>
    </div>
    <div class="mt-2">
        <x-input-label for="password" :value="__('Password')"></x-input-label>

        <x-text-input id="password" class="block mt-1 w-full"
                      type="password"
                      name="password"
                      required autocomplete="new-password"></x-text-input>
    </div>
    </div>
    </div>
</form>
