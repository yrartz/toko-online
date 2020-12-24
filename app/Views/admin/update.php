<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        
        <h2 class="my-5 text-center">Edit Produk</h2>
        
        <form>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="stok" min="0" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" cols="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <button class="btn btn-success my-3" name="submit">Edit Produk</button>
    </form>

    </div>

<?php echo $this->endSection() ?>