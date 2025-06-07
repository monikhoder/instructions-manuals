<x-home-layout>
<x-alert type="error" :message="session('error')" />
<x-alert type="success" :message="session('success')" />
    {{-- header --}}
    <div class="relative bg-blue-100 min-h-32 w-screen flex  justify-center">
       <div class="flex items-center justify-start rtl:justify-end">
            <a href="{{url('/')}}" class="flex items-center space-x-3 rtl:space-x-reverse text-blue-700">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap uppercase">Manuals</span>
            </a>
        </div>

        <form class="w-96 absolute -bottom-2" method="GET">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative max-w-xl mx-auto">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none bg-gray-50 hover:outline-none" placeholder="Search Brand, Manual..." value="{{ request('search') }}" @if(request('search')) autofocus @endif />
                <div class="absolute inset-y-0 end-0 flex items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-none focus:outline-none font-sm rounded-lg rounded-s-none text-md px-2 py-1.5">Search</button>
                </div>
            </div>
        </form>
    </div>
{{-- end header --}}


{{-- Brand --}}
    <div class="max-w-3xl flex flex-col items-center justify-center mx-auto mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Brands</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full">
            @foreach ($brands as $brand)
                <div class="bg-white rounded-lg shadow-md flex flex-col justify-center items-center p-4 border-solid border-gray-200 border-3 hover:bg-gray-100 hover:border-gray-500 hover:shadow-sm hover:shadow-gray-400 transition duration-300 aspect-square">
                    @if($brand->logo)
                    <img src="{{ asset($brand->logo) }}" alt="" class="object-fit w-full ">
                    @else
                    <h2 class="text-xl text-center">{{$brand->name}}</h2>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    {{-- End Brand --}}
    {{-- Manuals --}}
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
</x-home-layout>


