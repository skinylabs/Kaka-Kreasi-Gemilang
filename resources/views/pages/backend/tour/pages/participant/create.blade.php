@extends('pages.backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Participant</h1>

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
                        <p class="text-gray-800">Create</p>
                    </li>
                </ol>
            </div>

        </div>
    </div>

    <form action="{{ route('tour.participant.store', $tour->id) }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">
            <!-- Participant Name -->
            <div>
                <label for="name" class="label">
                    Nama Participant:
                </label>
                <input type="text" name="name" class="textInput" required>
            </div>

            <!-- Gender -->
            <div>
                <label for="gender" class="label">
                    Gender:
                </label>
                <select name="gender" class="textInput" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <!-- Group -->
            <div>
                <label for="group" class="label">
                    Group:
                </label>
                <input type="text" name="group" class="textInput" required>
            </div>

            <!-- Room Code -->
            <div>
                <label for="room_code" class="label">
                    Kode Kamar:
                </label>
                <input type="text" name="room_code" class="textInput" required>
            </div>

            <div>
                <label for="transportation_slug" class="label">
                    Transportasi:
                </label>
                <select name="transportation_slug" class="textInput" required>
                    @foreach ($transportation as $t)
                        <option value="{{ $t->slug }}">{{ $t->transportation_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Tambah Participant</button>
            </div>
        </div>
    </form>
@endsection
