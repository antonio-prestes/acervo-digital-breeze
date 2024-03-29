<div class="bg-white">
    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pt-6 pb-6">
                <a class="text-4xl font-bold tracking-tight text-gray-900"
                   href="{{route('collection.index', Route::input('user'))}}">Coleção</a>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4 sm:grid-cols-4">
                    <!-- Filters -->
                    <form>
                        <h3 class="mb-4">Categorias</h3>
                        <ul role="list" class="border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                            @foreach($categories as $category)
                                <li>
                                    <div class="flex flex-wrap justify-center">
                                        <a class="min-w-0 flex-1 text-gray-500"
                                           href="{{route('collection.category', ['user' => Route::input('user'), 'category'=> $category->id])}}">{{$category->name}}</a>
                                        <div
                                            class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-gray-700 bg-gray-100 border border-gray-300 ">
                                            <div class="text-xs font-normal leading-none max-w-full flex-initial">
                                                {{ $categoryCounts[$category->id] }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <!-- Replace with your content -->
                        <div class="bg-white">
                            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-1 sm:px-6 lg:max-w-7xl lg:px-8">
                                <div
                                    class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                    @foreach($collection as $item)
                                        <div class="group relative">
                                            <div
                                                class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                                <img src="{{$item->img_url}}"
                                                     href="{{ route('collection.item', $item->id) }}"
                                                     alt="Front of men&#039;s Basic Tee in black."
                                                     class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                            </div>
                                            <div class="mt-4 flex justify-between">
                                                <div>
                                                    <h3 class="text-sm text-gray-700">
                                                        <a href=" {{ route('collection.item', $item->id) }} ">
                                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                                            {{$item->title}}
                                                        </a>
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-500">{{$item->author}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- More products... -->
                                </div>
                                <div class="pt-3">
                                    {{$collection->links()}}
                                </div>
                            </div>
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

