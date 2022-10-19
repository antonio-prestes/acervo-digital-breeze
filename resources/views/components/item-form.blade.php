<form action="{{ isset($item) ? route('collection.update', $item->id) : route('collection.store')}}" method="POST"
      enctype="multipart/form-data">
    <div class="flex">
        <div class="item w-60 h-100" style="width: 600px">
            @csrf
            @isset($item->id)
                @method('PUT')
            @endisset
            <div>
                <x-input-label for="category_id" :value="__('Genereo')"/>
                <select id="category_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="category_id" required
                        autofocus>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}"
                            {{ isset($item->category_id) && $item->category_id == $category->id ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                <x-input-label for="status_id" :value="__('Status')"/>
                <select id="status_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="status_id"
                        required autofocus>
                    @foreach($status as $status)
                        <option value="{{ $status->id }}"
                            {{ isset($item->status_id) && $item->status_id == $status->id ? 'selected' : ''}}>
                            {{$status->name}}
                        </option>
                    @endforeach
                </select>
                <x-input-label for="title" :value="__('Titulo')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                              value="{{ isset($item->title) ? $item->title : '' }}" required autofocus/>
                <x-input-label for="author" :value="__('Autor')"/>
                <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                              value="{{ isset($item->author) ? $item->author : '' }}" required autofocus/>
                <x-input-label for="publishing_company" :value="__('Editora')"/>
                <x-text-input id="publishing_company" class="block mt-1 w-full" type="text" name="publishing_company"
                              value="{{ isset($item->publishing_company) ? $item->publishing_company : '' }}" required
                              autofocus/>
                <x-input-label for="description" :value="__('Descrição')"/>
                <textarea id="description"
                          class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          type="text" name="description"
                          required
                          autofocus>{{ isset($item->description) ? $item->description : '' }}</textarea>
            </div>
        </div>
        <div class="item w-32 h-32 ml-8" style="width: 500px">
            @csrf
            <div>
                <img src="{{ isset($item->img_url) ? $item->img_url : '' }}" alt="" class="shadow" width="200px"
                     style="display: block; margin: 4px auto 4px auto;"/>
                <x-input-label for="img_url" :value="__('Capa')"/>
                <input type="file" name="img_url" id="img_url">
            </div>
            <div class="flex justify-end items-end mt-10">
                <div class="item">
                    <a href="{{route('collection')}}"
                       class="bg-red-500 hover:bg-red-400 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out duration-150'">
                        Cancelar
                    </a>
                </div>
                <div class="item ml-20">
                    <x-primary-button class="ml-3 bg-green-700 hover:bg-green-600">
                        @if(isset($item))
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

