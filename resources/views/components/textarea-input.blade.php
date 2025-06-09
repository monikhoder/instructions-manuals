@props(['name', 'label', 'value' => null, 'error' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    @if($error)
        <span class="text-red-500 text-sm">{{ $error }}</span>
    @endif
</div>
