<div class="container-fluid px-4 pt-2">
    <h1 class="mt-2">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-header">
                    Change Color and Page
                </div>
                <div class="card-body">
                    <!-- Form untuk mengubah warna -->
                    <form action="" method="POST">
                        {{-- {{ route('admin.dashboard.color.update') }} --}}
                        @csrf
                        <div class="form-group">
                            <label for="primary_color">Primary Color:</label>
                            <input type="color" id="primary_color" name="primary_color" class="form-control" value="{{ old('primary_color', '#ffffff') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="secondary_color">Secondary Color:</label>
                            <input type="color" id="secondary_color" name="secondary_color" class="form-control" value="{{ old('secondary_color', '#000000') }}">
                        </div>
                        <div class="form-group">
                            <label for="page_select">Select Page:</label>
                            <select id="page_select" name="page_select" class="form-control" required>
                                <option value="home">Home</option>
                                <option value="about">About</option>
                                <option value="services">Services</option>
                                <option value="contact">Contact</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-9 mb-4">
            <div class="row">
                <div class="col-lg-9 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Catatan</h5>
                            <div class="mb-3">
                                <!-- Form untuk menambah catatan baru -->
                                <form action="" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="note_content" class="form-label">Tambah Catatan Baru</label>
                                        <textarea class="form-control" id="note_content" name="note_content" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan Catatan</button>
                                </form>
                            </div>
                            <hr>
                            <!-- Daftar catatan yang tersimpan -->
                            <h5 class="card-title">Daftar Catatan</h5>
                            <ul class="list-group">
                                {{-- @foreach($notes as $note)
                                    <li class="list-group-item">
                                        {{ $note->content }}
                                        <div class="float-end">
                                            <!-- Button untuk menghapus catatan -->
                                            <form action="{{ route('admin.dashboard.notes.destroy', $note->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>