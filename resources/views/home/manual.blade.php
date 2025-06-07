<x-home-layout>
    <div class="max-w-3xl mx-auto mb-5">
        {{-- Header --}}
        <div class="flex justify-start">
            <div class="mt-2 p-2 w-28 bg-white border border-gray-200 rounded shadow-sm dark:bg-gray-800 dark:border-gray-700  ">
                <img src="{{asset($manual->image)}}" alt="img">
            </div>
            <div class="flex flex-col justify-center ms-5">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$manual->title}}</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Brand: <a href="{{route('brand.show', $manual->brand->slug)}}"> <span class="font-semibold">{{$manual->brand->name}}</span></a></p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Category: <span class="font-semibold">{{$manual->category->name}}</span></p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Downloads: <span class="font-semibold">{{$manual->download_count}}</span></p>
                <div>
                    <a href="{{route('manual.download', $manual)}}" class="btn-primary">Download</a>
                </div>

            </div>
        </div>

        {{-- End Header --}}

        {{-- Manual pdf View  --}}
        <div class="mt-5">
            <div class="relative w-full" style="padding-top: 133.33%;"> {{-- 4:3 aspect ratio (portrait) --}}
                <iframe
                    src="{{ route('manual.view', $manual) }}#toolbar=0&navpanes=0"
                    class="absolute top-0 left-0 w-full h-full border border-gray-200 rounded shadow-sm"
                    frameborder="0"
                    allow="fullscreen"
                    allowfullscreen
                >
                </iframe>
            </div>
        </div>
        {{-- End Manual pdf View  --}}

        {{-- Download Button --}}


    </div>

</x-home-layout>
