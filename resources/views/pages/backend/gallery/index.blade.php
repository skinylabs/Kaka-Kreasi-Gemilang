<x-backend-layout>
    <div class="w-full flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">Gallery</h1>
                <div class="text-sm sm:text-base ">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/tour"
                                class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA TOUR</a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Gallery</p>
                        </li>
                    </ol>
                </div>
            </div>
            <a href="{{ route('galleries.create') }}" class="button-primary">Add New Image</a>
        </div>

        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3"><span>No</span></th>
                        <th class="px-6 py-3"><span>Title</span></th>
                        <th class="px-6 py-3"><span>Location</span></th>
                        <th class="px-6 py-3"><span>Image</span></th>
                        <th class="px-6 py-3"><span>Timestamp</span></th>
                        <th class="px-6 py-3"><span>Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $g)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $g->title }}</td>
                            <td class="p-2">{{ $g->location->name }}</td>
                            <td class="p-2">
                                @if ($g->images->isNotEmpty())
                                    @foreach ($g->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="{{ $g->title }}" class="w-16 h-16 object-cover">
                                    @endforeach
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="p-2">{{ $g->created_at ? $g->created_at->format('d M Y') : 'No Date' }}</td>
                            <td class="p-2">
                                <div class="flex gap-4 justify-center">
                                    <a href="javascript:void(0);" class="bg-yellow-500 icon-function"
                                        onclick="openModal('{{ asset('storage/' . $g->images->first()->image_path) }}', '{{ $g->title }}', '{{ $g->location }}', '{{ $g->id }}')">
                                        <x-icons.icon type="eye" fill="#fff" width="20" height="20" />
                                    </a>
                                    <a href="javascript:void(0);" class="bg-blue-500 icon-function"
                                        onclick="openEditModal('{{ $g->id }}', '{{ $g->title }}', '{{ $g->location }}', '{{ asset('storage/' . $g->images->first()->image_path) }}')">
                                        <x-icons.icon type="edit" fill="#fff" width="20" height="20" />
                                    </a>
                                    <button class="bg-red-500 icon-function delete-btn" data-id="{{ $g->id }}">
                                        <x-icons.icon type="trash" fill="#fff" width="20" height="20" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal untuk menampilkan gambar -->
        <div id="image-modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-4 relative max-w-sm w-full">
                <button id="close-image-modal"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">X</button>
                <img id="modal-image" src="" alt="Gambar" class="w-full h-auto object-contain">
            </div>
        </div>

        <!-- Modal untuk Edit -->
        <div id="edit-modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 shadow-lg max-w-lg w-full">
                <button id="close-edit-modal"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">X</button>
                <h2 class="text-lg font-semibold mb-4">Edit Gallery</h2>
                <form id="edit-form" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-id"> <!-- Menyimpan ID -->
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <!-- Current Image (optional) -->
                            <div class="mb-4">
                                <img id="current-image" src="" alt="Current Image"
                                    class="w-full h-auto object-cover rounded-lg">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="edit-title"
                                    class="mt-1 block w-full border-gray-300 rounded-md" required>
                            </div>

                            <!-- Location -->
                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" id="edit-location"
                                    class="mt-1 block w-full border-gray-300 rounded-md" required>
                            </div>

                            <!-- Images (multiple upload) -->
                            <div class="mb-4">
                                <label for="images" class="block text-sm font-medium text-gray-700">Upload
                                    Images</label>
                                <input type="file" name="images[]" id="images" multiple
                                    class="mt-1 block w-full border-gray-300 rounded-md">
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update
                                Gallery</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal untuk konfirmasi penghapusan -->
        <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Apakah Anda yakin ingin menghapus data ini?</h2>
                <div class="flex justify-end space-x-4">
                    <button id="cancel-btn" class="bg-gray-500 text-white px-4 py-2 rounded">Tidak</button>
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Modal gambar
                const imageModal = document.getElementById('image-modal');
                const modalImage = document.getElementById('modal-image');
                const closeImageModalBtn = document.getElementById('close-image-modal');

                window.openModal = function(imageSrc, title, location, id) {
                    modalImage.src = imageSrc;
                    imageModal.classList.remove('hidden');
                    imageModal.classList.add('flex');
                };

                closeImageModalBtn.addEventListener('click', function() {
                    imageModal.classList.add('hidden');
                });

                window.addEventListener('click', function(event) {
                    if (event.target === imageModal) {
                        imageModal.classList.add('hidden');
                    }
                });

                // Modal edit
                const editModal = document.getElementById('edit-modal');
                const closeEditModalBtn = document.getElementById('close-edit-modal');

                window.openEditModal = function(id, title, location, currentImage) {
                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-title').value = title;
                    document.getElementById('edit-location').value = location;
                    document.getElementById('current-image').src = currentImage ? currentImage : '';

                    // Set the form action
                    const formAction = `/galleries/${id}`;
                    document.getElementById('edit-form').action = formAction;

                    editModal.classList.remove('hidden');
                    editModal.classList.add('flex');
                };

                closeEditModalBtn.addEventListener('click', function() {
                    editModal.classList.add('hidden');
                });

                // Modal konfirmasi hapus
                const modal = document.getElementById('modal');
                const cancelBtn = document.getElementById('cancel-btn');
                const deleteBtns = document.querySelectorAll('.delete-btn');

                deleteBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const actionUrl = `/galleries/${id}`;
                        document.getElementById('delete-form').action = actionUrl;
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    });
                });

                cancelBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                window.addEventListener('click', function(event) {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>
    @endsection
</x-backend-layout>
