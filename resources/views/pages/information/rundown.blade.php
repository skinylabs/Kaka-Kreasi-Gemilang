@extends('pages.information.app')

@section('content')
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-slate-800">
                {{ $tour->name }}
            </h1>
            <p class="font-bold text-slate-600">
                {{ $tour->client }}
            </p>
        </div>

        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        @if ($hasDate)
                            <th class="px-6 py-3">Tanggal</th>
                        @endif
                        @if ($hasTime)
                            <th class="px-6 py-3">Waktu</th>
                        @endif
                        @if ($hasActivity)
                            <th class="px-6 py-3">Kegiatan</th>
                        @endif
                        @if ($hasDescription)
                            <th class="px-6 py-3">Keterangan</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($rundown->isEmpty())
                        <tr>
                            <td colspan="6" class="w-full text-center ">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($rundown as $index => $r)
                            <!-- Menambahkan $index untuk menghitung baris -->
                            <tr
                                class="border-dashed border-t border-gray-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                @if ($hasDate)
                                    <td class="p-2">
                                        {{ \Carbon\Carbon::parse($r->date)->translatedFormat('j F Y') }}
                                    </td>
                                @endif
                                @if ($hasTime)
                                    <td class="p-2">
                                        {{ \Carbon\Carbon::parse($r->time)->format('H:i') . ' ' . $r->timezone }}
                                    </td>
                                @endif
                                @if ($hasActivity)
                                    <td class="p-2">{{ $r->activity }}</td>
                                @endif
                                @if ($hasDescription)
                                    <td class="p-2">{{ $r->description }}</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
