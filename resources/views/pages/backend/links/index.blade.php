<x-backend-layout>
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tour List</h1>
            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/tour" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Tour List</p>
                    </li>
                </ol>
            </div>
        </div>
        <a href="{{ route('links.create') }}" class="button-primary">Add New Image</a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
            <thead>
                <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                    <th class="px-6 py-3"><span>No</span></th>
                    <th class="px-6 py-3"><span>Name</span></th>
                    <th class="px-6 py-3"><span>Link</span></th>
                    <th class="px-6 py-3"><span>Type</span></th>
                    <th class="px-6 py-3"><span>Deskripsi</span></th>
                    <th class="px-6 py-3"><span>Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $l)
                    <tr class="border-dashed border-t border-gray-200">
                        <td class="p-2">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-2">
                            {{ $l->name }}
                        </td>
                        <td class="p-2">
                            <a href="{{ $l->link }}" class="text-blue-500 hover:text-blue-700 hover:underline"
                                title="{{ $l->link }}">
                                {{ Str::limit($l->link, 50, '...') }}
                            </a>
                        </td>
                        <td class="p-2">
                            {{ $l->type }}
                        </td>

                        <td class="p-2">
                            {{ $l->description }}
                        </td>


                        <td class=" p-2">
                            <button class="bg-blue-500 text-white px-2 py-1 rounded"
                                onclick="openEditModal('{{ $l->id }}', '{{ $l->name }}', '{{ $l->link }}', '{{ $l->type }}', '{{ $l->description }}')">
                                Edit
                            </button>
                            <form action="{{ route('links.destroy', $l->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
        <div class="bg-white p-5 rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Edit Link</h2>
            <form id="edit-form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-id" name="id">
                <div class="mb-4">
                    <label for="edit-name" class="block">Nama</label>
                    <input type="text" id="edit-name" name="name" class="border rounded w-full" required>
                </div>
                <div class="mb-4">
                    <label for="edit-link" class="block">Link</label>
                    <input type="url" id="edit-link" name="link" class="border rounded w-full" required>
                </div>
                <div class="mb-4">
                    <label for="edit-description" class="block">Deskripsi</label>
                    <textarea id="edit-description" name="description" class="border rounded w-full"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <button type="button" class="bg-gray-300 text-black px-4 py-2 rounded"
                    onclick="closeEditModal()">Batal</button>
            </form>
        </div>
    </div>
    <script>
        function openEditModal(id, name, link, type, description) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-link').value = link;
            document.getElementById('edit-type').value = type;
            document.getElementById('edit-description').value = description;

            document.getElementById('edit-form').action = `/admin/links/${id}`;

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-backend-layout>
