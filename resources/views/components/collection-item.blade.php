<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<style>
    #social-links ul{
        padding-left: 0;
    }
    #social-links ul li {
        display: inline-block;
    }
    #social-links ul li a {
        padding: 3px;
        margin: 1px;
        font-size: 25px;
    }
    #social-links .fa-facebook{
        color: #0d6efd;
    }
    #social-links .fa-twitter{
        color: deepskyblue;
    }
    #social-links .fa-whatsapp{
        color: #25D366
    }
</style>
<div class="bg-white">
    <div>
        <!--
          Mobile filter dialog

          Off-canvas filters for mobile, show/hide based on off-canvas filters state.
        -->

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pt-6 pb-6">
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <img src="{{$item->img_url}}" alt="book cover" width="300" class="rounded-img rounded-md">
                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <!-- Replace with your content -->
                        <div class="bg-white">
                            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-1 sm:px-6 lg:max-w-7xl lg:px-8">
                                <div
                                    class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-1 xl:gap-x-8">
                                    <div class="group relative">
                                        <a class="text-xl ml-4"> {{$item->title}} </a>
                                        <p class="mt-1 ml-4 text-sm text-gray-500"> {{ $item->author }} </p>
                                        <div class="min-h-80 mt-2 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md
                                        bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                            <p class="mt-1 ml-4 mr-4 text-sm text-gray-500"> {{ $item->description }}</p>
                                        </div>
                                        <span>Compartilhar nas redes sociais: {!! $shareButtons !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

