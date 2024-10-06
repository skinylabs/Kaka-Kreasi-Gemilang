@extends('pages.backend.app')

@section('content')
    <h1>Edit Transportasi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tours.tatatertib.update', [$tour->id, $tatatertib->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300"
                value="{{ old('title', $tatatertib->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="rule" class="block text-gray-700">Tata Tertib</label>
            <input type="text" name="rule" id="rule" class="w-full p-2 border border-gray-300"
                value="{{ old('rule', $tatatertib->rule) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transportasi</button>
    </form>
@endsection
