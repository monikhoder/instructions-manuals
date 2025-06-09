<x-usertap>
    <x-slot name="title">
        {{ __('My Uploads') }}
    </x-slot>

<div class="max-w-3xl flex flex-col items-center justify-center mx-auto mt-10 mb-5">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Manuals</h1>
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            @foreach ($manuals as $manual)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:border-gray-300 hover:shadow-lg transition duration-300">
                        {{-- Image --}}
                        <a href="{{route('manual.show', $manual->slug)}}" class="block">
                            <img class="p-8 rounded-t-lg" src="{{asset($manual->image)}}" alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white truncate">{{$manual->title}}</h5>
                            </a>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex gap-2">
                                    <span class="text-sm text-gray-900 bg-blue-100 px-1 py-0.5 rounded">{{$manual->brand->name}}</span>
                                    <span class="text-sm text-gray-900 bg-blue-100 px-1 py-0.5 rounded">{{$manual->category->name}}</span>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 text-gray-500 dark:text-white inline mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/></svg>{{$manual->download_count}}</span>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="max-w-3xl mx-auto text-center mt-4">
        {{-- @if ($manuals->count()) --}}
            <nav class=" p-10 mt-4">
            {{ $manuals->links() }}
            </nav>
        {{-- @endif --}}
    </div>

    {{-- End Manuals --}}
</x-usertap>
