<x-backend-layout>
    <section class="py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Create New Gallery</h1>

            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <button type="button" id="open-location-modal" class="text-blue-500">Add New Location</button>
                    </div>
                    <select name="location" id="location" class="mt-1 block w-full border-gray-300 rounded-md"
                        required>
                        <option value="" disabled selected>Pilih lokasi</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Images (multiple upload) -->
                <div class="mb-4">
                    <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                    <input type="file" name="images[]" id="images" multiple
                        class="mt-1 block w-full border-gray-300 rounded-md">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Gallery</button>
            </form>
        </div>
    </section>

    <!-- Modal untuk Menambahkan Lokasi -->
    <div id="location-modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg max-w-lg w-full">
            <h2 class="text-lg font-semibold mb-4">Add New Location</h2>
            <form id="location-form" method="POST" action="{{ route('locations.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="close-location-modal"
                        class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Location</button>
                </div>
            </form>
        </div>
    </div>

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Modal untuk lokasi
                const locationModal = document.getElementById('location-modal');
                const openLocationModalBtn = document.getElementById('open-location-modal');
                const closeLocationModalBtn = document.getElementById('close-location-modal');

                openLocationModalBtn.addEventListener('click', function() {
                    locationModal.classList.remove('hidden');
                    locationModal.classList.add('flex');
                });

                closeLocationModalBtn.addEventListener('click', function() {
                    locationModal.classList.add('hidden');
                });

                window.addEventListener('click', function(event) {
                    if (event.target === locationModal) {
                        locationModal.classList.add('hidden');
                    }
                });

                // Handle form submission untuk lokasi
                const locationForm = document.getElementById('location-form');
                locationForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Mencegah pengiriman form default

                    const formData = new FormData(locationForm);

                    // Kirim data lokasi baru menggunakan Fetch API
                    fetch(locationForm.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Menambahkan opsi lokasi baru ke dropdown
                                const locationSelect = document.getElementById('location');
                                const newOption = document.createElement('option');
                                newOption.value = data.location.name;
                                newOption.textContent = data.location.name;
                                locationSelect.appendChild(newOption);
                                locationSelect.value = data.location.name; // Pilih lokasi baru

                                // Tutup modal
                                locationModal.classList.add('hidden');
                                locationForm.reset(); // Reset form
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>
    @endsection
</x-backend-layout>
