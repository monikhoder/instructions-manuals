<x-home-layout>
<div class="max-w-3xl mx-auto border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="{{route('user.dashboard')}}" class="inline-flex items-center justify-center p-4 rounded-t-lg {{ request()->is('dashboard') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:border-b-2 text-gray-500 hover:text-gray-600 hover:border-gray-300'}}" aria-current="page">
                    <svg class="w-4 h-4 me-2  dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>Dashboard
            </a>
        </li>
        <li class="me-2">
            <a href="{{route('user.my_upload')}}" class="inline-flex items-center justify-center p-4 rounded-t-lg {{ request()->is('my_upload') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:border-b-2 text-gray-500 hover:text-gray-600 hover:border-gray-300'}}">
                <svg class="w-5 h-4 me-2 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/>
                </svg> My Uploads
            </a>
        </li>
        <li class="me-2">
            <a href="{{route('profile.edit')}}" class="inline-flex items-center justify-center p-4 rounded-t-lg {{ request()->is('profile') ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:border-b-2 text-gray-500 hover:text-gray-600 hover:border-gray-300'}}">
                <svg class="w-4 h-4 me-2 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                </svg>Profile
            </a>
        </li>



    </ul>
    {{$slot}}
</div>
</x-home-layout>
