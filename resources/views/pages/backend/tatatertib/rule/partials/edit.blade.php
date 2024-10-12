<x-backend-layout>
    <h1>Edit Tata Tertib</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tatatertib.rule.update', [$tatatertib->id, $rule->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="content" class="block text-gray-700">Isi Peraturan</label>
            <input type="text" name="content" id="content" class="w-full p-2 border border-gray-300"
                value="{{ old('content', $rule->content) }}" required>
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
            Update Peraturan
        </button>
    </form>
</x-backend-layout>
