<x-backend-layout>
    <section class="flex flex-col gap-4">
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">
                    Daftar Content Peraturan
                </h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tatatertib.rule.create', $tatatertib->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Isi Peraturan</a>

                <!-- Tombol untuk membuka modal rule -->
                <button onclick="document.getElementById('importRuleModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Rule
                </button>


            </div>
        </div>

        <!-- Modal untuk Import Transportasi -->
        <x-ui.modal.import-modal id="importRuleModal" title="Import Rule"
            actionUrl="{{ route('tatatertib.rule.import', $tatatertib->id) }}" method="POST" />

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
                            <span>Tata Tertib</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Isi Peraturan</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rule as $r)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $r->tatatertib->title }}</td>
                            <td class="p-2">{{ $r->content }}</td>
                            <td class="p-2">
                                <div class="flex gap-4 justify-center">

                                    <a href="{{ route('tatatertib.rule.edit', [$tatatertib->id, $r->id]) }}"
                                        class=" bg-blue-500 icon-function">
                                        <x-icons.icon type="edit" fill="#fff" width="20" height="20" />
                                    </a>
                                    <button class="bg-red-500 icon-function" data-id="{{ $tatatertib->id }}"
                                        data-rule-id="{{ $r->id }}">
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
                        const tatatertibId = this.getAttribute('data-id');
                        const ruleId = this.getAttribute('data-rule-id');
                        // Set form action to the correct route
                        deleteForm.setAttribute('action',
                            `/admin/tatatertib/${tatatertibId}/rule/${ruleId}`);
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
