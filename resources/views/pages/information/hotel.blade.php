<x-information-layout :tour="$tour">
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-slate-800">
                {{ $title }}
            </h1>
            <p class="font-bold text-slate-600">
                SMK MUHAMMADIYAH 1 KLATEN
            </p>
        </div>
        <div class="my-slider">
            @foreach ($hotelImage as $image)
                <div class="h-40 object-cover object-center overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Gambar Transportasi">
                </div>
            @endforeach


        </div>
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table
                class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Jenis Kelamin</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Kelas</th>
                        <th class="px-6 py-3">Armada</th>
                        <th class="px-6 py-3">Ruang</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($participant->isEmpty())
                        <tr>
                            <td colspan="6" class="w-full text-center ">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($participant as $p)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $p->gender }}</td>
                                <td class="p-2">{{ $p->name }}</td>
                                <td class="p-2">{{ $p->group }}</td>
                                <td class="p-2">
                                    @if ($p->transportation)
                                        {{ $p->transportation->transportation_name }}
                                    @else
                                        Transportation not found
                                    @endif
                                </td>
                                <td class="p-2">{{ $p->room_code }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </section>
</x-information-layout>
