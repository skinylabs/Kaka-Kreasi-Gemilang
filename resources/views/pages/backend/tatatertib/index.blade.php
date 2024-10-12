<x-backend-layout>
    <section class="flex flex-col gap-4">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">Tata Tertib</h1>

                <div class="text-sm sm:text-base ">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/tour"
                                class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                                TOUR</a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Tata Tertib</p>
                        </li>
                    </ol>
                </div>
            </div>

            <a href="{{ route('tatatertib.create', $tour->id) }}" class="button-primary">Create New Tour</a>
        </div>

        <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />
        <x-ui.flash-message :message="session('error')" type="error" id="toast-error" />

        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3 ">
                            <span>No</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Tata Tertib ID</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Nama</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tatatertib as $t)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $t->id }}</td>
                            <td class="p-2">{{ $t->title }}</td>
                            <td class="p-2">
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ route('tatatertib.show', $t->id) }}"
                                        class="bg-yellow-500 icon-function">
                                        <x-icons.icon type="eye" fill="#fff" width="20" height="20" />
                                    </a>
                                    <a href="{{ route('tatatertib.edit', $t->id) }}" class="bg-blue-500 icon-function">
                                        <x-icons.icon type="edit" fill="#fff" width="20" height="20" />
                                    </a>
                                    <button class="bg-red-500 icon-function" data-tatatertib-id="{{ $t->id }}">
                                        <x-icons.icon type="trash" fill="#fff" width="20" height="20" />
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Apakah Anda yakin ingin menghapus data ini?</h2>
                <div class="flex justify-end space-x-4">
                    <button id="cancel-btn" class="bg-gray-500 text-white px-4 py-2 rounded">Tidak</button>
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get modal elements
                const modal = document.getElementById('modal');
                const deleteForm = document.getElementById('delete-form');
                const cancelBtn = document.getElementById('cancel-btn');

                // Handle delete button click
                const deleteButtons = document.querySelectorAll('.delete-btn');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const tatatertibId = this.getAttribute('data-tatatertib-id');
                        // Set form action to the correct route
                        deleteForm.setAttribute('action', `/admin/tatatertib/${tatatertibId}`);
                        // Show the modal
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    });
                });


                // Handle cancel button click
                cancelBtn.addEventListener('click', function() {
                    // Hide the modal
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });

                // Close modal when clicking outside the modal content
                window.addEventListener('click', function(event) {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>
    @endsection
</x-backend-layout>
