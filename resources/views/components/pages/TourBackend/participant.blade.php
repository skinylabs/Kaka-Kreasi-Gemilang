<section>
    <div class="flex justify-between items-center mt-6">
        <h1 class="text-2xl font-semibold text-slate-800">PARTICIPANTS</h1>
        <a href="{{ route('tour.participant.create', $tour->id) }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
            Peserta</a>
    </div>

    <x-ui.flash-message :message="session('success')" type="success" id="toast-success" />

    <div class="overflow-x-auto rounded-lg shadow mt-4">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">Daftar Peserta</h2>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tour->participants as $p)
                    <tr>
                        <td class="py-2 px-4">{{ $p->name }}</td>
                        <td class="py-2 px-4">
                            <button
                                onclick="document.getElementById('editParticipantModal-{{ $p->id }}').classList.remove('hidden')"
                                class="bg-blue-500 text-white rounded-md px-4 py-2">Edit</button>
                            <button class="bg-red-500 text-white rounded-md px-4 py-2"
                                data-id="{{ $p->id }}">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal Edit Participant -->
                    <div id="editParticipantModal-{{ $p->id }}"
                        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <h3 class="text-lg font-semibold mb-4">Edit Participant</h3>
                            <form action="{{ route('tour.participant.update', [$tour->id, $p->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="text" name="name" value="{{ $p->name }}"
                                        class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button"
                                        onclick="document.getElementById('editParticipantModal-{{ $p->id }}').classList.add('hidden')"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md">Cancel</button>
                                    <button type="submit"
                                        class="ml-4 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
