@props(['type' => 'success', 'message' => ''])

@if($message)
    <div class="fixed top-3 right-9 z-50">
        <div
            class="alert p-4 text-sm rounded-lg shadow-lg
                @if($type === 'error')text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400 @else text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400 @endif"
            role="alert"
        >
            <span class="font-medium">{{ ucfirst($type) }} :</span>
            {{ $message }}
        </div>
    </div>
@endif
