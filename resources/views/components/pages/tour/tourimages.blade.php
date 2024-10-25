<div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-auto mt-4">
    <div class="flex justify-between items-center mt-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">IMAGES</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('tour.tour-images.create', $tour->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                Gambar</a>

            <!-- Tombol untuk membuka modal import gambar -->
            <button onclick="document.getElementById('importImageModal').classList.remove('hidden')"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                Import Gambar
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @if ($tour->tourImages->isEmpty())
            <div class="col-span-3 text-center">Belum ada gambar untuk tur ini.</div>
        @else
            @foreach ($tour->tourImages as $image)
                <div class="border rounded-lg overflow-hidden shadow">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Tour Image"
                        class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-sm text-gray-600">Tag: {{ ucfirst($image->image_tag) }}</p>

                        <!-- Tombol Edit dan Delete -->
                        <div class="flex justify-between mt-4">
                            <!-- Tombol Edit -->
                            <button
                                onclick="document.getElementById('editImageModal-{{ $image->id }}').classList.remove('hidden')"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <button class="bg-red-500 icon-function delete-image" data-id="{{ $image->id }}">
                                <x-icons.icon type="trash" fill="#fff" width="20" height="20" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Gambar -->
                <div id="editImageModal-{{ $image->id }}"
                    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <h3 class="text-lg font-semibold mb-4">Edit Image</h3>
                        <form action="{{ route('tour.tour-images.update', [$tour->id, $image->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Input Image Tag -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Tag</label>
                                <input type="text" name="image_tag" value="{{ $image->image_tag }}"
                                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            </div>

                            <!-- Input Gambar Baru (Opsional) -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Gambar Baru (Opsional)</label>
                                <input type="file" name="image_path"
                                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            </div>

                            <div class="flex justify-end">
                                <button type="button"
                                    onclick="document.getElementById('editImageModal-{{ $image->id }}').classList.add('hidden')"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md">Cancel</button>
                                <button type="submit"
                                    class="ml-4 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Modal untuk Konfirmasi Penghapusan -->
<div id="deleteImageModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
        <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
        <p class="mt-2 text-gray-600">Apakah Anda yakin ingin menghapus gambar ini?</p>
        <form id="delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex justify-end mt-4">
                <button type="button" id="cancel-btn"
                    class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300">Batal</button>
                <button type="submit"
                    class="ml-2 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">Hapus</button>
            </div>
        </form>
    </div>
</div>

@section('script')
    <script>
        // Hapus Tour Image
        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageId = this.dataset.id;
                const form = document.getElementById('delete-form');

                const tourId = {{ $tour->id }}; // Ambil ID tour dari variabel PHP
                // Set form action URL untuk menghapus gambar
                form.action = `/admin/tour/${tourId}/tour-images/${imageId}`;

                // Tampilkan modal konfirmasi
                document.getElementById('deleteImageModal').classList.remove('hidden');
            });
        });

        // Tombol batal di modal
        document.getElementById('cancel-btn').addEventListener('click', function() {
            document.getElementById('deleteImageModal').classList.add('hidden');
        });
    </script>
@endsection
