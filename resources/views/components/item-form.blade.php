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

<form action="{{ isset($item) ? route('collection.update', $item->id) : route('collection.store')}}" method="POST"
      enctype="multipart/form-data">
    <div class="flex flex-col md:flex-row md:space-x-8">
        <div class="w-full md:w-1/2">
            @csrf
            @isset($item->id)
                @method('PUT')
            @endisset
            <div class="my-4">
                <x-input-label for="category_id" :value="__('Genereo')"/>
                <select id="category_id"
                        class="block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="category_id" required autofocus>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{ isset($item->category_id) && $item->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-4">
                <x-input-label for="status_id" :value="__('Status')"/>
                <select id="status_id"
                        class="block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="status_id" required autofocus>
                    @foreach($status as $status)
                        <option
                            value="{{ $status->id }}" {{ isset($item->status_id) && $item->status_id == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-4">
                <x-input-label for="title" :value="__('Titulo')"/>
                <x-text-input id="title" class="block w-full" type="text" name="title"
                              value="{{ isset($item->title) ? $item->title : '' }}" required autofocus></x-text-input>
            </div>

            <div class="my-4">
                <x-input-label for="author" :value="__('Autor')"/>
                <x-text-input id="author" class="block w-full" type="text" name="author"
                              value="{{ isset($item->author) ? $item->author : '' }}" required autofocus/>
            </div>

            <div class="my-4">
                <x-input-label for="publishing_company" :value="__('Editora')"/>
                <x-text-input id="publishing_company" class="block w-full" type="text" name="publishing_company"
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
        @csrf
        <div>
            <img src="{{ isset($item->img_url) ? $item->img_url : '' }}" alt="" class="shadow" width="200px"
                 style="display: block; margin: 4px auto 4px auto;"/>
            <x-input-label for="img" :value="__('Capa')"/>
            <input type="file" name="img" id="img">
        </div>
        <div class="flex justify-end items-end mt-10">
            <div class="item">
                <a href="{{route('collection')}}">
                    <x-primary-button class="ml-3 bg-red-700 hover:bg-red-600" type="button">
                        {{ __('Cancelar') }}
                    </x-primary-button>
                </a>
            </div>
            <div>
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
</form>

