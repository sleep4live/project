<style>
    .form-wrapper {
        max-width: 520px;
        margin: 40px auto;
        padding: 24px;
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
    }

    input[type="text"],
    textarea,
    input[type="file"],
    input[type="number"] {
        width: 100%;
        padding: 10px 12px;
        font-size: 14px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        background-color: #fff;
        color: #111827;
        box-sizing: border-box;
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #6b7280;
    }

    button {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        background-color: #111827;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #1f2937;
    }
</style>

<form method="POST" action="{{ route('admin.collections.store') }}" enctype="multipart/form-data" class="form-wrapper">
    @csrf

    <div class="form-group">
        <label>Nama Koleksi</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description" required>{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Nomor Koleksi</label>
        <input type="text" name="nomor_koleksi" value="{{ old('nomor_koleksi') }}">
    </div>

    <div class="form-group">
        <label>Tahun Masuk</label>
        <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk') }}" min="1900" max="{{ date('Y') }}">
    </div>

    <div class="form-group">
        <label>Gambar (opsional)</label>
        <input type="file" name="image" accept="image/*">
        <small style="color: #6b7280; font-size: 12px;">Format: JPG, JPEG, PNG, GIF (maks. 2MB)</small>
    </div>

    <button type="submit">Simpan</button>
</form>
