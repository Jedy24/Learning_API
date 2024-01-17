<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to your Jetstream application!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        {{ json_encode(['name' => auth()->user()->name, 'email' => auth()->user()->email]) }}
    </p>
</div>
