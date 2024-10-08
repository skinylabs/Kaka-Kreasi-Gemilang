@extends('pages.backend.app')

@section('content')
    <h1>Daftar Content Peraturan</h1>
    <div class="flex justify-between items-center mt-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                PARTICIPANT
            </h1>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('tatatertib.rule.create', $tatatertib->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                Participant</a>

            <!-- Tombol untuk membuka modal participant -->
            <button onclick="document.getElementById('importParticipantModal').classList.remove('hidden')"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                Import Participant
            </button>


        </div>
    </div>

    <!-- Modal untuk Import Transportasi -->
    <x-ui.modal.import-modal id="importParticipantModal" title="Import Participant"
        action-url="{{ route('tatatertib.rule.import', $tatatertib->id) }}" />

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">No</th>
                <th class="border border-gray-300 p-2">Tata Tertib</th>
                <th class="border border-gray-300 p-2">Content</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rule as $r)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>

                    <td class="border border-gray-300 p-2">{{ $r->tatatertib->title }}</td>
                    <td class="border border-gray-300 p-2">{{ $r->content }}</td>
                    <td class="border border-gray-300 p-2">
                        <div class="flex justify-evenly">
                            <a href="{{ route('tatatertib.show', $r->id) }}">View</a>
                            <a href="{{ route('tatatertib.edit', $r->id) }}">Edit</a>
                            <button class="text-red-500 delete-btn" data-tatatertib-id="{{ $r->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
@endsection
