<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Tata Tertib</h1>

            <div class="text-sm sm:text-base">
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
                        <p class="text-gray-800">Create</p>
                    </li>
                </ol>
            </div>

        </div>
    </div>


    <form action="{{ route('tatatertib.store') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">
            <div>
                <label for="title" class="label">Title</label>
                <input type="text" name="title" class="textInput" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Tambah Tata Tertib</button>
            </div>
        </div>
    </form>
</x-backend-layout>
