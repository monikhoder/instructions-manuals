<x-home-layout>
        <form action="{{route('admin.manual.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="grid grid-cols-12 gap-4 max-w-3xl mx-auto p-4">
            <div class="flex items-center justify-center p-3 bg-gray-200 col-span-12 text-blue-700 rounded">
                <svg class="w-24 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/>
                </svg>
                <h1 class="text-2xl font-bold  ml-4">Upload Manual</h1>
            </div>
            <div class="bg-white col-span-12 shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Manual Details</h2>
                    <x-text-input
                        name="title"
                        label="Manual Name"
                        :error="$errors->first('title')"
                    />
                    <x-textarea-input
                        name="description"
                        label="Manual Description"
                    />
                    <x-select-input
                        name="brand_id"
                        label="Brand"
                        :options="$brands->pluck('name', 'id')"
                        :selected="old('brand_id')"
                        :error="$errors->first('brand_id')"
                    />
                    <x-select-input
                        name="category_id"
                        label="Category"
                        :options="$categories->pluck('name', 'id')"
                        :selected="old('category_id')"
                        :error="$errors->first('category_id')"
                    />
                    <x-select-input
                        name="language"
                        label="Language"
                        :options="['en' => 'English', 'km' => 'Khmer']"
                        :selected="old('language')"
                        :error="$errors->first('language')"
                    />
                </div>
            </div>

            <div class="bg-white col-span-12 shadow-md sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-4">Manual Image</h2>
                        <x-file-upload
                            name="image"
                            label="Manual Image"
                            accept="image/*"
                            maxSize="2M"
                            :error="$errors->first('image')"
                        />
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-4">Manual File</h2>
                        <x-file-upload
                            name="file_path"
                            label="Manual File"
                            accept=".pdf"
                            maxSize="10M"
                            :error="$errors->first('file_path')"
                        />
                    </div>
            </div>
    </div>
    <div class="flex justify-end gap-4 mb-2 max-w-3xl mx-auto p-4">
        <a href="{{route('admin.manual')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ">Back</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Upload Manual</button>
    </div>
    </form>
</x-home-layout>
