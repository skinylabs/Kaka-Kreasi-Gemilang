<section>
    <div class="flex justify-between items-center mt-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">RUNDOWN KEGIATAN</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('tour.rundown.create', $tour->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                Kegiatan</a>

            <!-- Tombol untuk membuka modal import rundown -->
            <button onclick="document.getElementById('importRundownModal').classList.remove('hidden')"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                Import Rundown
            </button>
        </div>
    </div>

    <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
            <thead>
                <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Waktu</th>
                    <th class="px-6 py-3">Kegiatan</th>
                    <th class="px-6 py-3">Deskripsi</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($rundown->isEmpty())
                    <tr>
                        <td colspan="6" class="w-full text-center">Belum ada data</td>
                    </tr>
                @else
                    @foreach ($rundown as $r)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ \Carbon\Carbon::parse($r->date)->translatedFormat('j F Y') }}</td>
                            <td class="p-2">{{ \Carbon\Carbon::parse($r->time)->format('H:i') . ' ' . $r->timezone }}
                            </td>
                            <td class="p-2">{{ $r->activity }}</td>
                            <td class="p-2">{{ $r->description }}</td>
                            <td class="p-2">
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ route('tour.rundown.edit', [$tour->id, $r->id]) }}"
                                        class="bg-blue-500 icon-function">
                                        <x-icons.icon type="edit" fill="#fff" width="20" height="20" />
                                    </a>
                                    <button class="bg-red-500 icon-function delete-rundown"
                                        data-id="{{ $tour->id }}" data-rundown-id="{{ $r->id }}">
                                        <x-icons.icon type="trash" fill="#fff" width="20" height="20" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-5">
            <h2 class="text-lg font-semibold">Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus rundown ini?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelDelete" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded">Hapus</button>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</section>

@section('script')
    <script>
        // Ambil elemen modal dan tombol
        const deleteModal = document.getElementById('deleteModal');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');
        let rundownId;

        // Hapus Rundown
        document.querySelectorAll('.delete-rundown').forEach(button => {
            button.addEventListener('click', function() {
                const tourId = this.dataset.id;
                rundownId = this.dataset.rundownId;

                // Set form action URL untuk menghapus rundown
                document.getElementById('delete-form').action =
                `/admin/tour/${tourId}/rundown/${rundownId}`;

                // Tampilkan modal konfirmasi
                deleteModal.classList.remove('hidden');
            });
        });

        // Tombol batal di modal
        cancelDelete.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });

        // Konfirmasi hapus
        confirmDelete.addEventListener('click', function() {
            document.getElementById('delete-form').submit();
        });
    </script>
@endsection
