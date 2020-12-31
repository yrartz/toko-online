<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        
        <h2 class="my-5 text-center">Tambah Produk</h2>
        
        <?php 
            $session = session();
            $errors = $session->getFlashdata('errors');
        ?>
        
        <?php if($errors){ ?>
            <div class="alert alert-danger">
                Terjadi Kesalahan
                <hr class="dropdown-divider">
                <?php foreach($errors as $err){ ?>
                <ul>
                    <li><?= $err ?></li>
                </ul>
                <?php } ?>
            </div>
        <?php } ?>
        
        <form method="post" enctype="multipart/form-data" action="/admin/save">
            <?php echo csrf_field() ?>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama')?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" value="<?= old('stok')?>" required>
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat (Gram)</label>
                <input type="number" class="form-control" name="berat" value="<?php echo old('berat')?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" value="<?= old('harga') ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" cols="5" required><?= old('deskripsi') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" value="<?= old('gambar')?>" required>
            </div>
            <button class="btn btn-success my-3" name="submit">Tambah Produk</button>
    </form>

    </div>

<?php echo $this->endSection() ?>