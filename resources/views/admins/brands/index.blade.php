<x-app-layout>
    <div class="flex items-center justify-between bg-gray-200 p-2 rounded">
        <h2 class="text-2xl font-bold">Brands</h2>
        <a href="{{route('admin.brand.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create Brand
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
                        Logo
                    </div>
                </th>
               <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Brand Name
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
                        Create at
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
            @if ($brands->isEmpty())
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No brands found.
                    </td>
                </tr>
            @else
                @foreach ($brands as $brand)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4 w-6">
                    <img src="{{asset($brand->logo)}}" alt="" />
                </td>
                <td class="px-6 py-4">
                    {{ $brand->name }}
                </td>
                <td class="px-6 py-4">
                    {{ Str::limit($brand->description, 15) }}
                </td>
                <td class="px-6 py-4">
                    {{ $brand->created_at ? $brand->created_at->format('Y-m-d H:i') : '-' }}
                </td>
                <td class="px-6 py-4">
                     <a href="{{route('admin.brand.edit', ['brand'=>$brand, 'page' => request()->query('page', 1)])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-red-600 dark:text-blue-500 hover:underline" type="button">Remove</button>

                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <form action="{{route('admin.brand.remove', ['brand'=>$brand])}}" method="POST">
                            <input type="hidden" name="page" value="{{ request()->query('page', 1) }}">
                            @csrf
                            @method('DELETE')
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-gray-50 rounded-lg shadow-md dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this brand?</h3>
                                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>

                </td>
            </tr>
                @endforeach
            @endif

        </tbody>
    </table>
     @if ($brands->count())
    <nav class=" p-3">
      {{ $brands->links() }}
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

