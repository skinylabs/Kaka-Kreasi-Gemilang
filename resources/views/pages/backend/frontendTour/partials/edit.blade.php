<x-backend-layout>
    <div class="container">
        <h1>Edit Tour</h1>
        <form action="{{ route('frontend-tour.update', $frontendTour) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Tempat</label>
                <input type="text" class="form-control" name="name" value="{{ $frontendTour->name }}" required>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="images[]" accept="image/*" multiple>

                <!-- Tampilkan semua gambar yang ada -->
                <div class="mt-2">
                    @foreach ($frontendTour->images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $frontendTour->name }}" width="100"
                            class="me-2 mb-2">
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" required>{{ $frontendTour->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" name="price" value="{{ $frontendTour->price }}"
                    step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-select" name="rating" required>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ $i == $frontendTour->rating ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</x-backend-layout>
