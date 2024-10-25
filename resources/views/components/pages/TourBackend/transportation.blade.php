<section>
    <div class="flex justify-between items-center mt-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">TRANSPORTATION</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('tour.transportation.create', $tour->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                Transportasi</a>

            <!-- Tombol untuk membuka modal transportasi -->
            <button onclick="document.getElementById('importTransportModal').classList.remove('hidden')"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                Import Transportasi
            </button>
        </div>
    </div>

    <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />
    <x-ui.flash-message :message="session('error')" type="error" id="toast-error" />

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
            <thead>
                <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Armada</th>
                    <th class="px-6 py-3">Slug</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($transportation->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($transportation as $t)
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $t->transportation_name }}</td>
                            <td class="p-2">{{ $t->slug }}</td>

                            <td class="p-2">
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ route('tour.transportation.edit', [$tour->id, $t->id]) }}"
                                        class="bg-blue-500 icon-function">
                                        <x-icons.icon type="trash" fill="#fff" width="20" height="20" /></a>
                                    <button class="bg-red-500 icon-function" data-id="{{ $tour->id }}"
                                        data-transportation-id="{{ $t->id }}"> <x-icons.icon type="trash"
                                            fill="#fff" width="20" height="20" /></button>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</section>


<!-- Modal untuk Konfirmasi Penghapusan -->
<div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75  items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
        <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
        <p class="mt-2 text-gray-600">Apakah Anda yakin ingin menghapus item ini?</p>
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
