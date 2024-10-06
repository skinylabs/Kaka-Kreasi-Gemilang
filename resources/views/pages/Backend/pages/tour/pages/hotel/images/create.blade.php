@extends('pages.backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Gambar Hotel</h1>
        </div>
    </div>

    <form action="{{ route('tour.hotelImage.store', $tour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-4">
            <div>
                <label for="hotel_images" class="label">
                    Gambar Hotel:
                </label>
                <input type="file" name="hotel_images[]" multiple class="textInput" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">
                    Tambah Gambar
                </button>
            </div>
        </div>
    </form>
@endsection
