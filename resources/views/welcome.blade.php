<x-home-layout>
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

    <div class="items-center justify-center flex flex-col min-h-screen p-6">
        <h1 class="text-3xl font-bold mb-4">Welcome to Our Application</h1>
        <p class="text-gray-700 mb-6">This is a simple welcome page built with Blade and Tailwind CSS.</p>
        @for($i = 0; $i < 30; $i++)
            <div class="bg-white shadow-md rounded-lg p-6 mb-4 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-2">Card Title {{ $i + 1 }}</h2>
                <p class="text-gray-600">This is a card description. You can add more content here.</p>
            </div>
        @endfor
    </div>

</x-home-layout>

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
