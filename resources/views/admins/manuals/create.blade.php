<x-app-layout>
   <form action="{{route('admin.manual.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid grid-cols-12 gap-4">
            <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Manual Details</h2>
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $manual->title)"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
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

            <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
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
    <div class="flex justify-end gap-4 mt-5">
        <a href="{{route('admin.manual')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ">Back</a>
         <x-primary-button>{{ __('Upload Manual') }}</x-primary-button>
    </div>
    </form>
</x-app-layout>
