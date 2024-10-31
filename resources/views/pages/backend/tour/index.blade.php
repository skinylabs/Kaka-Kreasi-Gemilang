<x-backend-layout>
    <div class="w-full flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">Tours</h1>
                <div class="text-sm sm:text-base ">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/tour"
                                class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA TOUR</a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Tours</p>
                        </li>
                    </ol>
                </div>
            </div>
            <a href="{{ route('tour.create') }}" class="button-primary">Create New Tour</a>
        </div>

        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Client</th>
                        <th class="px-6 py-3">Start Date</th>
                        <th class="px-6 py-3">End Date</th>
                        <th class="px-6 py-3">Tata Tertib</th>
                        <th class="px-6 py-3">User ID</th>
                        <th class="px-6 py-3">Code</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $tour->name }}</td>
                            <td class="p-2">{{ $tour->client }}</td>
                            <td class="p-2">{{ $tour->start_date }}</td>
                            <td class="p-2">{{ $tour->end_date }}</td>
                            <td>{{ $tour->tatatertib->title }}</td>
                            <td class="p-2">{{ $tour->user->name }}</td>
                            <td class="p-2 toggle-password" data-id="{{ $tour->id }}">
                                <span id="password-{{ $tour->id }}"
                                    class="password-text hidden">{{ $tour->security_password }}</span>
                            </td>

                            <td class="p-2">
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ route('tour.show', $tour->id) }}" class="bg-yellow-500 icon-function">
                                        <x-icons.icon type="eye" fill="#fff" width="20" height="20" />
                                    </a>
                                    <a href="{{ route('tour.edit', $tour->id) }}" class="bg-blue-500 icon-function">
                                        <x-icons.icon type="edit" fill="#fff" width="20" height="20" />
                                    </a>
                                    <button class="bg-red-500 icon-function" data-id="{{ $tour->id }}">
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
                // Get modal elements
                const modal = document.getElementById('modal');
                const deleteForm = document.getElementById('delete-form');
                const cancelBtn = document.getElementById('cancel-btn');
                const passwordCells = document.querySelectorAll('.toggle-password');

                // Handle delete button click
                const deleteButtons = document.querySelectorAll('.delete-btn');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const tourId = this.getAttribute('data-id');
                        // Set form action to the correct route
                        deleteForm.setAttribute('action', `/admin/tour/${tourId}`);
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

                // Show password when holding down on the cell
                passwordCells.forEach(cell => {
                    const tourId = cell.getAttribute('data-id');
                    const passwordField = document.getElementById(`password-${tourId}`);

                    cell.addEventListener('mousedown', function() {
                        passwordField.classList.remove('hidden'); // Show password
                    });

                    cell.addEventListener('mouseup', function() {
                        passwordField.classList.add('hidden'); // Hide password
                    });

                    cell.addEventListener('mouseleave', function() {
                        passwordField.classList.add('hidden'); // Hide password when mouse leaves
                    });
                });
            });
        </script>
    @endsection
</x-backend-layout>
