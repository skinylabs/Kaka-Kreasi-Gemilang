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

        <!-- Tombol untuk menghapus pencarian -->
        @if ($search)
            <a href="{{ route('transportation', ['slug' => $tour->slug]) }}"
                class="textInput rounded-lg  flex gap-4 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-blue-500"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
                <span>Cari nama yang lain</span>
            </a>
        @else
            <!-- Form Pencarian hanya ditampilkan jika tidak ada pencarian -->
            <form action="{{ route('transportation', ['slug' => $tour->slug]) }}" method="GET" class="flex gap-1">
                <input type="text" name="search" placeholder="Masukkan Nama Kamu" class="textInput"
                    value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 fill-white rounded-lg px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-White"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg></button>
            </form>
        @endif

        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
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
                    @if ($participants->isEmpty())
                        <tr>
                            <td colspan="6" class="w-full text-center">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($participants as $index => $p)
                            <tr
                                class="border-dashed border-t border-gray-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">
                                    {{ $p->gender === 'L' ? 'Laki-laki' : ($p->gender === 'P' ? 'Perempuan' : 'N/A') }}</td>
                                <td class="p-2">{{ $p->name }}</td>
                                <td class="p-2">{{ $p->group }}</td>
                                <td class="p-2">
                                    {{ $p->transportation ? $p->transportation->transportation_name : 'Transportation not found' }}
                                </td>
                                <td class="p-2">{{ $p->room_code }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
