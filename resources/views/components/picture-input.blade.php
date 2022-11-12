<div class="flex items-center" x-data="picturePreview()">
    <div class="rounded-full bg-gray-200 mr-2">
        <img id="preview"
             @if($user)
                 src="{{ URL::to($user) }}"
             @else
                 src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?b=1&s=612x612&w=0&k=20&c=IJ1HiV33jl9wTVpneAcU2CEPdGRwuZJsBs_92uk_xNs="
             @endif
             alt=""
             class="w-24 h-24 rounded-full object-cover">
    </div>
    <div>
        <x-primary-button @click="document.getElementById('picture').click()" class="relative" type="button">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
                Carregar avatar
            </div>
            <input @change="showPreview(event)" type="file" name="picture" id="picture"
                   class="absolute inse-0 -z-10 opacity-0">
        </x-primary-button>
    </div>
    <script>
        function picturePreview() {
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0) {
                        document.getElementById('preview').src = URL.createObjectURL(event.target.files[0])
                    }
                }
            }
        }
    </script>
</div>
