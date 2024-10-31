<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Participant</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="/tours"
                            class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Tours</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Create</p>
                    </li>
                </ol>
            </div>

        </div>
    </div>

    <form action="{{ route('tour.tour-images.store', $tour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="images">Unggah Gambar:</label>
        <input type="file" name="images[]" id="images" multiple required>

        <label for="image_tag">Tag Gambar:</label>
        <select name="image_tag">
            <option value="pemandangan">Pemandangan</option>
            <option value="hotel">Hotel</option>
            <option value="transportation">Transportation</option>
            <option value="aktifitas">Aktifitas</option>
        </select>

        <button type="submit">Unggah Gambar</button>
    </form>
</x-backend-layout>
