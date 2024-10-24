<x-backend-layout>
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                {{ $tour->name }}
            </h1>

            <div class="text-sm sm:text-base">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Tours</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

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

        <!-- Modal untuk Import Transportasi -->
        <x-ui.modal.import-modal id="importTransportModal" title="Import Transportasi"
            action-url="{{ route('tour.transportation.import', $tour->id) }}" method="POST" />


        <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />
        <x-ui.flash-message :message="session('error')" type="error" id="toast-error" />

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
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
                                            <x-icons.icon type="trash" fill="#fff" width="20"
                                                height="20" /></a>
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

    <section>
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">
                    PARTICIPANT
                </h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tour.participant.create', $tour->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Participant</a>

                <!-- Tombol untuk membuka modal participant -->
                <button onclick="document.getElementById('importParticipantModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Participant
                </button>
            </div>
        </div>

        <!-- Modal untuk Import Participant -->
        <x-ui.modal.import-modal id="importParticipantModal" title="Import Participant"
            action-url="{{ route('tour.participant.import', $tour->id) }}" method="POST" />

        <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />
        <x-ui.flash-message :message="session('error')" type="error" id="toast-error" />

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">name</th>
                        <th class="px-6 py-3">gender</th>
                        <th class="px-6 py-3">group</th>
                        <th class="px-6 py-3">room_code</th>
                        <th class="px-6 py-3">transportation_id</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($participant->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($participant as $p)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">
                                    {{ $p->name }}
                                </td>
                                <td class="p-2">
                                    {{ $p->gender === 'L' ? 'Laki-laki' : ($p->gender === 'P' ? 'Perempuan' : 'N/A') }}
                                </td>
                                <td class="p-2">
                                    {{ $p->group }}
                                </td>
                                <td class="p-2">
                                    {{ $p->room_code }}
                                </td>
                                <td class="p-2">
                                    @if ($p->transportation)
                                        {{ $p->transportation->transportation_name }}
                                    @else
                                        Belim ada partisipant
                                    @endif
                                </td>

                                <td class="p-2">
                                    <div class="flex gap-4 justify-center">
                                        <a href="{{ route('tour.participant.edit', [$tour->id, $p->id]) }}"
                                            class="bg-blue-500 icon-function">
                                            <x-icons.icon type="trash" fill="#fff" width="20" height="20" />
                                        </a>
                                        <button class="bg-red-500 icon-function" data-id="{{ $tour->id }}"
                                            data-participant-id="{{ $p->id }}">
                                            <x-icons.icon type="trash" fill="#fff" width="20"
                                                height="20" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

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
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
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
                            <td colspan="6" class="w-full text-center ">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($rundown as $r)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">
                                    {{ \Carbon\Carbon::parse($r->date)->translatedFormat('j F Y') }}
                                </td>
                                <td class="p-2">
                                    {{ \Carbon\Carbon::parse($r->time)->format('H:i') . ' ' . $r->timezone }}
                                </td>

                                <td class="p-2">{{ $r->activity }}</td>
                                <td class="p-2">{{ $r->description }}</td>
                                <td class="p-2">
                                    <div class="flex gap-4 justify-center">
                                        <a href="{{ route('tour.rundown.edit', [$tour->id, $r->id]) }}"
                                            class="bg-blue-500 icon-function">
                                            <x-icons.icon type="trash" fill="#fff" width="20"
                                                height="20" />
                                        </a>
                                        <button class="bg-red-500 icon-function" data-id="{{ $tour->id }}"
                                            data-rundown-id="{{ $r->id }}"> <x-icons.icon type="trash"
                                                fill="#fff" width="20" height="20" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">TOUR IMAGES</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tour.rundown.create', $tour->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Kegiatan</a>

                <button onclick="document.getElementById('importRundownModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Rundown
                </button>
            </div>
        </div>

        <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />

        <!-- Tampilkan Gambar Tur -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-auto mt-4">
            <h2 class="text-lg font-semibold text-slate-800 mb-4">Daftar Gambar</h2>
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
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Edit</button>

                                    <!-- Tombol Delete -->
                                    <button
                                        onclick="document.getElementById('deleteImageModal-{{ $image->id }}').classList.remove('hidden')"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Gambar -->
                        <div id="editImageModal-{{ $image->id }}"
                            class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                <h3 class="text-lg font-semibold mb-4">Edit Image</h3>
                                <form action="{{ route('tour.tour-images.update', [$tour->id, $image->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Tag</label>
                                        <input type="text" name="image_tag" value="{{ $image->image_tag }}"
                                            class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Gambar Baru
                                            (Opsional)
                                        </label>
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

                        <!-- Modal Konfirmasi Delete Gambar -->
                        <div id="deleteImageModal-{{ $image->id }}"
                            class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                <h3 class="text-lg font-semibold mb-4">Delete Image</h3>
                                <p>Apakah Anda yakin ingin menghapus gambar ini?</p>
                                <div class="flex justify-end mt-4">
                                    <button type="button"
                                        onclick="document.getElementById('deleteImageModal-{{ $image->id }}').classList.add('hidden')"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md">Cancel</button>

                                    <form action="{{ route('tour.tour-images.destroy', [$tour->id, $image->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="ml-4 px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>






    <!-- Modal untuk Import Hotel -->
    <x-ui.modal.import-modal id="importRundownModal" title="Import Rundown"
        action-url="{{ route('tour.rundown.import', $tour->id) }}" method="POST" />

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


    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('modal');
                const deleteForm = document.getElementById('delete-form');
                const cancelBtn = document.getElementById('cancel-btn');
                const deleteButtons = document.querySelectorAll('.delete-btn');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const tourId = this.getAttribute('data-id');
                        let entityId; // Variable untuk menyimpan id yang akan dihapus
                        let url; // Variable untuk menyimpan url

                        // Memeriksa apakah tombol adalah untuk transportasi atau hotel
                        if (this.hasAttribute('data-transportation-id')) {
                            entityId = this.getAttribute('data-transportation-id');
                            url = `/admin/tour/${tourId}/transportation/${entityId}`;
                        } else if (this.hasAttribute('data-hotel-id')) {
                            entityId = this.getAttribute('data-hotel-id');
                            url = `/admin/tour/${tourId}/hotel/${entityId}`; // Update URL untuk hotel
                        } else if (this.hasAttribute('data-rundown-id')) {
                            entityId = this.getAttribute('data-rundown-id');
                            url =
                                `/admin/tour/${tourId}/rundown/${entityId}`; // Update URL untuk rundown
                        } else if (this.hasAttribute('data-participant-id')) {
                            entityId = this.getAttribute('data-participant-id');
                            url =
                                `/admin/tour/${tourId}/participant/${entityId}`; // Update URL untuk participant
                        }

                        deleteForm.setAttribute('action', url);
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    });
                });

                cancelBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
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
