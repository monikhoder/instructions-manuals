<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100
        text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('POST')
        <div class="grid grid-cols-12 gap-4">
                <div class="bg-white col-span-12 lg:col-span-6 shadow-md sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-4">User Details</h2>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @if ($errors->has('name'))
                                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"/>
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <input type="password" value="password" name="password" class="hidden">
                    </div>
                </div>
        </div>
            <div class="flex justify-end gap-4 mt-5">
                <a href="{{route('admin.users')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ">Back</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create User</button>
            </div>

    </form>
</x-app-layout>
