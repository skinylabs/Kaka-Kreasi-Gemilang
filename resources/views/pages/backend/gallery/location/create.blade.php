<x-backend-layout>
    <section class="py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Add New Location</h1>

            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Location -->
                <div class="mb-4">
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <a href="{{ route('locations.create') }}" class="button-primary">Add New Location</a>
                    </div>
                    <input type="text" name="location" id="location"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Gallery</button>
            </form>
        </div>
    </section>
</x-backend-layout>
