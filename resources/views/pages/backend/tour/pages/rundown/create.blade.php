@extends('pages.backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Rundown</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Tours</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Tambah Rundown</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <form action="{{ route('tour.rundown.store', $tour->id) }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">
            <div>
                <label for="date" class="label">
                    Tanggal:
                </label>
                <input type="date" name="date" class="textInput" required>
            </div>

            <div>
                <label for="time" class="label">
                    Waktu:
                </label>
                <input type="time" name="time" class="textInput" required>
            </div>

            <div>
                <label for="timezone" class="label">
                    Zona Waktu:
                </label>
                <select name="timezone" class="textInput">
                    <option value="WIB" selected>WIB (Waktu Indonesia Barat)</option>
                    <option value="WITA">WITA (Waktu Indonesia Tengah)</option>
                    <option value="WIT">WIT (Waktu Indonesia Timur)</option>
                </select>
            </div>

            <div>
                <label for="activity" class="label">
                    Kegiatan:
                </label>
                <input type="text" name="activity" class="textInput" required>
            </div>

            <div>
                <label for="description" class="label">
                    Deskripsi:
                </label>
                <textarea name="description" class="textInput" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Tambah Rundown</button>
            </div>
        </div>
    </form>
@endsection
