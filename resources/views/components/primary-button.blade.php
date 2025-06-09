<button {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center']) }}>
    {{ $slot }}
</button>
