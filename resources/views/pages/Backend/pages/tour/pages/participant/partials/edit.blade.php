@extends('pages.backend.app')

@section('content')
    <h1>Edit Transportasi</h1>

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
@endsection
