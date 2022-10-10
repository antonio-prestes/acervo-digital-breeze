<form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
    <div class="flex">
        <div class="item w-60 h-100" style="width: 600px">
            @csrf
            <div>
                <x-input-label for="category_id" :value="__('Genereo')"/>
                <select id="category_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="category_id" :value="old('category_id')" required autofocus>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                    @endforeach
                </select>
                <x-input-label for="status_id" :value="__('Status')"/>
                <select id="status_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="status_id" :value="old('status_id')" required autofocus>
                    @foreach($status as $status)
                        <option value="{{ $status->id }}">{{ $status->name}}</option>
                    @endforeach
                </select>
                <x-input-label for="title" :value="__('Titulo')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                              :value="old('title')" required autofocus/>
                <x-input-label for="author" :value="__('Autor')"/>
                <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                              :value="old('author')" required autofocus/>
                <x-input-label for="publishing_company" :value="__('Editora')"/>
                <x-text-input id="publishing_company" class="block mt-1 w-full" type="text" name="publishing_company"
                              :value="old('publishing_company')" required autofocus/>
                <x-input-label for="description" :value="__('Descrição')"/>
                <textarea id="description"
                          class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          type="text" name="description" :value="old('description')" required autofocus>
                </textarea>
            </div>
        </div>
        <div class="item w-32 h-32 ml-8" style="width: 500px">
            @csrf
            <div>
                <x-input-label for="img_url" :value="__('Capa')"/>
                <input type="file" name="img_url" id="img_url">
            </div>
            <div class="flex justify-end items-end mt-10">
                <div class="item w-52 h-32">
                    <x-primary-button class="ml-3" style="background: red">
                        {{ __('Cancelar') }}
                    </x-primary-button>
                    <x-primary-button class="ml-3 bg-green-600 hover:bg-green-700">
                        {{ __('Salvar') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</form>

