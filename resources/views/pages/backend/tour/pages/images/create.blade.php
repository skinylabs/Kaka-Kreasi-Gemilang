<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Gambar</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/admin/tour"
                            class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="javascript:history.back()"
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
        <div class="flex flex-col gap-4">
            <label for="images">Unggah Gambar:</label>
            <input type="file" name="images[]" id="images" multiple required class="
        textInput">

            <label for="image_tag">Tag Gambar:</label>
            <select name="image_tag" class="textInput">
                <option value="pemandangan">Pemandangan</option>
                <option value="hotel">Hotel</option>
                <option value="transportation">Transportation</option>
                <option value="aktifitas">Aktifitas</option>
            </select>
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Unggah Gambar</button>
            </div>
        </div>

    </form>


</x-backend-layout>
