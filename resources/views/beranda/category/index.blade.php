<x-main title="Categori">
    <div class="w-full flex gap-3 flex-wrap justify-center items-center min-h-96">
        @foreach ($categories as $category)
            <span class="bg-gray-200 py-2 px-4 rounded-md text-sm font-medium text-gray-700">{{ $category->name }}</span>
        @endforeach
    </div>
</x-main>
