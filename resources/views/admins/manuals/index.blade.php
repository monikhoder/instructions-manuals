<x-app-layout>
   <div class="flex items-center justify-between bg-gray-200 p-2 rounded">
        <h2 class="text-2xl font-bold">Manuals</h2>
        <a href="{{route('admin.manual.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Manual
        </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        @if (session('success'))
        <div class="fixed top-3 right-9 z-50">
            <div
                class="alert p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow-lg"
                role="alert"
            >
                <span class="font-medium">Success :</span>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Image
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Manual Title
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                             </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Description
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Brand
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Category
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Upload by
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Approved by
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                            Action
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($manuals->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No manuals found.
                        </td>
                    </tr>
                @else
                    @foreach ($manuals as $manual)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 w-3 h-3">
                            @if ($manual->image)
                                 <img src="{{asset($manual->image)}}" alt="image" />
                            @else
                                <span class="text-gray-500">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $manual->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($manual->description, 15) ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $manual->brand->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $manual->category->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $manual->user->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $manual->approved_by ? $manual->approvedBy->name : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                             <a href="{{route('admin.manual.edit', ['manual'=>$manual, 'page' => request()->query('page', 1)])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                               <form action="{{ route('admin.manual.remove', $manual) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this manual?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if ($manuals->count())
            <nav class=" p-3">
            {{ $manuals->links() }}
            </nav>
        @endif

    </div>
</x-app-layout>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            }
        });
</script>
