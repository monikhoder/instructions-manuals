{{-- @props(['name', 'label', 'type' => 'text', 'value' => null, 'error' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        {{ $attributes }}
    >
    @if($error)
        <span class="text-red-500 text-sm">{{ $error }}</span>
    @endif
</div> --}}


@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:border-blue-500 rounded-md shadow-sm']) }}>
