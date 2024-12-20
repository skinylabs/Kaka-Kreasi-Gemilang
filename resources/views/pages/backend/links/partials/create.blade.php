<x-backend-layout>
    <div class="container">
        <h1>Tambah Link</h1>
        <form action="{{ route('links.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Judul Link</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">URL</label>
                <input type="url" class="form-control" name="link" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</x-backend-layout>
