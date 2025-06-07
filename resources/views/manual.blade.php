<x-home-layout>
    <div class="max-w-3xl mx-auto mb-5">
        {{-- Header --}}
        <div class="flex justify-start">
            <div class="mt-2 p-2 w-28 bg-white border border-gray-200 rounded shadow-sm dark:bg-gray-800 dark:border-gray-700  ">
                <img src="{{asset($manual->image)}}" alt="img">
            </div>
            <div class="flex flex-col justify-center ms-5">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$manual->title}}</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Brand: <span class="font-semibold">{{$manual->brand->name}}</span></p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Category: <span class="font-semibold">{{$manual->category->name}}</span></p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Downloads: <span class="font-semibold">{{$manual->download_count}}</span></p>
            </div>
        </div>
        {{-- End Header --}}

        {{-- Manual pdf View  --}}
        <div class="mt-5">
            <iframe
                
                class="w-full h-screen border border-gray-200 rounded shadow-sm dark:border-gray-700"
                frameborder="0">
            </iframe>
        </div>
        {{-- End Manual pdf View  --}}

        {{-- Download Button --}}


    </div>

</x-home-layout>
