<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Edit Rundown</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="/tours"
                            class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Tours</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Edit Rundown</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <form action="{{ route('tour.rundown.update', [$tour->id, $rundown->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method untuk update -->
        <div class="flex flex-col gap-4">
            <div>
                <label for="date" class="label">
                    Tanggal:
                </label>
                <input type="date" name="date" class="textInput" value="{{ $rundown->date }}" required>
            </div>

            <div>
                <label for="time" class="label">
                    Waktu:
                </label>
                <input type="time" name="time" class="textInput" value="{{ $rundown->time }}" required>
            </div>

            <div>
                <label for="timezone" class="label">
                    Zona Waktu:
                </label>
                <select name="timezone" class="textInput">
                    <option value="WIB" {{ $rundown->timezone == 'WIB' ? 'selected' : '' }}>WIB (Waktu Indonesia
                        Barat)
                    </option>
                    <option value="WITA" {{ $rundown->timezone == 'WITA' ? 'selected' : '' }}>WITA (Waktu Indonesia
                        Tengah)</option>
                    <option value="WIT" {{ $rundown->timezone == 'WIT' ? 'selected' : '' }}>WIT (Waktu Indonesia
                        Timur)
                    </option>
                </select>
            </div>

            <div>
                <label for="activity" class="label">
                    Kegiatan:
                </label>
                <input type="text" name="activity" class="textInput" value="{{ $rundown->activity }}" required>
            </div>

            <div>
                <label for="description" class="label">
                    Deskripsi:
                </label>
                <textarea name="description" class="textInput" required>{{ $rundown->description }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Update Rundown</button>
            </div>
        </div>
    </form>
</x-backend-layout>
