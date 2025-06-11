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

                                <form action="{{ route('user.manual.remove',$manual) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 text-sm" onclick="return confirm('Are you sure you want to delete this manual?')">
                                            <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                    </button>
                                </form>
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
