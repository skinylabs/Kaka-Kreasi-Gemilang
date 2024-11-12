<x-backend-layout>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Edit Transportasi</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/admin/tour"
                            class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="javascript:history.back()"
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


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tour.transportation.update', [$tour->id, $transportation->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-4">
            <div>
                <label for="transportation_name" class="label">
                    Nama Kendaraan:
                </label>
                <input type="text" name="transportation_name" class="textInput"
                    value="{{ $transportation->transportation_name }}" required>
            </div>

            <button type="submit" class="button-primary w-[20%]">Update Transportasi</button>
        </div>
    </form>
</x-backend-layout>
