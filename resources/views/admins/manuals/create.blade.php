<x-app-layout>
   <form action="{{route('admin.manual.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
    <div class="grid grid-cols-12 gap-4">
        <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Manual Details</h2>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Manual Name</label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @if ($errors->has('title'))
                        <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Manual Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
                <div class="mb-4">
                    <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a brand</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{old('brand_id') == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('brand_id'))
                        <span class="text-red-500 text-sm">{{ $errors->first('brand_id') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-red-500 text-sm">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Language</label>
                    <select id="language" name="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="language">Choose a language</option>
                        <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="km" {{ old('language') == 'km' ? 'selected' : '' }}>Khmer</option>
                    </select>
                    @if ($errors->has('language'))
                        <span class="text-red-500 text-sm">{{ $errors->first('language') }}</span>
                    @endif
                </div>

            </div>
        </div>

        <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Manual Image</h2>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 2M)</p>
                                <input name="image" class="w-64 md:w-full p-1 mt-3 text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-100 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="dropzone-file" type="file">
                                @if ($errors->has('image'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </label>
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Manual File</h2>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 10M)</p>
                                <input name="file_path" class="w-64 md:w-full p-1 mt-3 text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-100 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="dropzone-file" type="file">
                                @if ($errors->has('file_path'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('file_path') }}</span>
                                @endif
                            </div>
                        </label>
                    </div>
                </div>
        </div>
    </div>
    <div class="flex justify-end gap-4 mt-5">
        <a href="{{route('admin.manual')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ">Back</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Upload Manual</button>
    </div>
    </form>
</x-app-layout>
