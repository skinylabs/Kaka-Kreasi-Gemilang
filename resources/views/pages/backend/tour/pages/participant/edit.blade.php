<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Edit Participant</h1>

            <div class="text-sm sm:text-base">
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
                        <p class="text-gray-800">Edit</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <form action="{{ route('tour.participant.update', [$tour->id, $participant->id]) }}" method="POST">
        @csrf
        @method('PUT') {{-- Menggunakan metode PUT untuk update data --}}
        <div class="flex flex-col gap-4">
            <!-- Participant Name -->
            <div>
                <label for="name" class="label">
                    Nama Participant:
                </label>
                <input type="text" name="name" class="textInput" value="{{ old('name', $participant->name) }}"
                    required>
            </div>

            <!-- Gender -->
            <div>
                <label for="gender" class="label">
                    Gender:
                </label>
                <select name="gender" class="textInput" required>
                    <option value="L" {{ $participant->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $participant->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Group -->
            <div>
                <label for="group" class="label">
                    Group:
                </label>
                <input type="text" name="group" class="textInput" value="{{ old('group', $participant->group) }}"
                    required>
            </div>

            <!-- Room Code -->
            <div>
                <label for="room_code" class="label">
                    Kode Kamar:
                </label>
                <input type="text" name="room_code" class="textInput"
                    value="{{ old('room_code', $participant->room_code) }}" required>
            </div>

            <div>
                <label for="transportation_slug" class="label">
                    Transportasi:
                </label>
                <select name="transportation_slug" class="textInput" required>
                    @foreach ($transportation as $t)
                        <option value="{{ $t->slug }}"
                            {{ isset($participant) && $participant->transportation_slug == $t->slug ? 'selected' : '' }}>
                            {{ $t->transportation_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Update Participant</button>
            </div>
        </div>
    </form>
</x-backend-layout>
