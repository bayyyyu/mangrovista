<x-app>
    <div class="container">
        <h2>Import Data Katalog Pohon</h2>
        <form action="{{ url('Admin/Katalog-Pohon') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Pilih file Excel:</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
</x-app>