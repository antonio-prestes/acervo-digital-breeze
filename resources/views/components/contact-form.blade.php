<!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800 sm:mx-4">
        <div class="flex flex-wrap">
            <div class="grow-0 shrink-0 basis-auto mb-6 md:mb-0 w-full sm:w-full lg:w-6/12 px-2 lg:px-6">
                <h2 class="text-xl lg:text-3xl font-bold mb-3">Contact us</h2>
                <p class="text-gray-500 mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laudantium, modi accusantium ipsum corporis quia asperiores
                    dolorem nisi corrupti eveniet dolores ad maiores repellendus enim
                    autem omnis fugiat perspiciatis? Ad, veritatis.
                </p>
                <p class="text-gray-500 mb-1">New York, 94126, United States</p>
                <p class="text-gray-500 mb-1">+ 01 234 567 89</p>
                <p class="text-gray-500 mb-1">info@gmail.com</p>
            </div>
            <div class="grow-0 shrink-0 basis-auto mb-12 md:mb-0 w-full sm:w-full lg:w-6/12 px-2 lg:px-6">
                @if(session('success'))
                    <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                        <span class="font-medium"></span> {{ session('success') }}
                        </div>
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.create') }}">
                    @csrf
                    <div class="form-group mb-6">
                        <input type="text" class="form-control block w-full px-3 py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
                               placeholder="Name" name="name">
                    </div>
                    <div class="form-group mb-6">
                        <input type="email" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
                               placeholder="Email address" name="email">
                    </div>
                    <div class="form-group mb-6">
            <textarea class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            " id="exampleFormControlTextarea13" rows="3" placeholder="Message" name="message"></textarea>
                    </div>
                    <button type="submit" class="
            w-full
            px-6
            py-2.5
            bg-indigo-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-indigo-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg
            transition
            duration-150
            ease-in-out">Send</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->

