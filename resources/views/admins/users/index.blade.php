<x-app-layout>

   <div class="flex items-center justify-between bg-gray-200 p-2 rounded">
        <h2 class="text-2xl font-bold">User manager</h2>
        <a href="{{route('admin.users.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            New User
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
        @if (session('error'))
        <div class="fixed top-3 right-9 z-50">
            <div
                class="alert p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400 shadow-lg"
                role="alert"
            >
                <span class="font-medium">Error :</span>
                {{ session('error') }}
            </div>
        </div>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Profile
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Name
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                             </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Email
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Status
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
                @if ($users->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @else
                    @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 w-3 h-3">
                            @if ($user->profile_picture)
                                 <img src="{{asset($manual->image)}}" alt="image" />
                            @else
                                <span class="text-gray-500">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                             {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- {{ $user->roles->pluck('name')->implode(', ') }} --}}
                            @if($user->isAdmin())
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Admin</span>

                            @else
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">User</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->status }}
                        </td>

                        <td class="px-6 py-4">
                           <div class="flex">
                                <form action="{{ route('admin.users.ban', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')

                                    {{-- Toggle button for ban/unban --}}
                                    @if ($user->status === 'banned')
                                        <input type="hidden" name="status" value="active">
                                        <button type="submit" class="text-green-600 hover:underline ml-2" onclick="return confirm('Are you sure you want to unban this User?') ">Unban</button>
                                    @else
                                        <input type="hidden" name="status" value="banned">
                                        <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Are you sure you want to ban this User?') ">Ban</button>
                                    @endif
                                </form>
                                <form action="{{ route('admin.users.remove', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this User?')">Remove</button>
                                </form>

                           </div>

                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if ($users->count())
            <nav class=" p-3">
            {{ $users->links() }}
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
