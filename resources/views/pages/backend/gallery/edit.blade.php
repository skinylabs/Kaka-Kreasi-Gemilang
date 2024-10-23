<!-- resources/views/gallery/edit.blade.php -->
<x-frontend-layout>
    <section class="py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Edit Gallery</h1>

            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $gallery->title }}"
                        class="border-gray-300 p-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="location" class="block">Location:</label>
                    <input type="text" name="location" id="location" value="{{ $gallery->location }}"
                        class="border-gray-300 p-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="image" class="block">Image:</label>
                    <input type="file" name="image" id="image" class="border-gray-300 p-2 w-full">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
            </form>
        </div>
    </section>
</x-frontend-layout>
