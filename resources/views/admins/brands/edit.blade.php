<x-app-layout>
    <form action="{{route('admin.brand.update', ['brand' => $brand])}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" name="page" value="{{ request()->query('page', 2) }}">
    <div class="grid grid-cols-12 gap-4">
        <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Brand Details</h2>
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700">Brand ID</label>
                    <input type="text" id="id" name="id" value="{{$brand->id }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Brand Name</label>
                    <input type="text" id="name" name="name" value="{{$brand->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @if ($errors->has('name'))
                        <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Brand Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{$brand->description }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Brand Logo</h2>
                <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 2M)</p>
                                <input name="logo" class="w-64 md:w-full p-1 mt-3 text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-100 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="dropzone-file" type="file">
                                <input type="hidden" name="remove_logo" id="remove-logo" value="0">
                                @if ($errors->has('logo'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('logo') }}</span>
                                @else
                                    @if ($brand->logo)
                                        <div class="flex flex-row w-full gap-2 items-center mt-1" id="logo-preview">
                                            <img  src="{{ asset($brand->logo) }}" alt="Brand Logo" class=" w-6 h-6 object-cover rounded">
                                            <span class="text-gray-700 ms-2">{{ basename($brand->logo) }}</span>
                                            <button class="text-red-500 text-xl" id="remove-img">x</button>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </label>
                </div>
            </div>
        </div>


    </div>
    </div>
    <div class="flex justify-end gap-4 mt-5">
        <a href="{{route('admin.brand')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ">Back</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Brand</button>
    </div>

    </form>
</x-app-layout>

<script>
    document.getElementById('remove-img').addEventListener('click', function(e) {
        e.preventDefault();
        const logoPreview = document.getElementById('logo-preview');
        logoPreview.style.display = 'none';
        document.getElementById('dropzone-file').value = '';
        document.getElementById('remove-logo').value = '1';
    });
    document.getElementById('dropzone-file').addEventListener('change', function() {
        const fileInput = this;
        const logoPreview = document.getElementById('logo-preview');
        logoPreview.style.display = 'none';
        logoPreview.innerHTML = '';
    });

</script>
