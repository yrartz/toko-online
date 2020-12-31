<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>
    <div class="container">
        
        <?php 
            $session = session();
            $errors = $session->getFlashdata('errors');
        ?>
        
        <div class="produk mt-4 p-3">
            <h2 class="text-center mb-4">Update Produk</h2>
            
            <?php if($errors){ ?>
                <div class="alert alert-danger">
                    Terjadi Kesalahan
                    <?php foreach($errors as $err){ ?>
                        <ul>
                            <li><?php echo $err ?></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <form method="post" enctype="multipart/form-data" action="/admin/edit">
             
             <?php echo csrf_field() ?>
             
             <input type="hidden" name="slug" value="<?php echo $produk['slug']?>">
             <input type="hidden" name="idproduk" value="<?php echo $produk['id']?>">
            <input type="hidden" name="gambarLama" value="<?php echo $produk['gambar']?>" required>
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo (old('nama')) ? old('nama') : $produk['nama']?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Produk</label>
                    <input type="text" name="stok" id="stok" class="form-control" value="<?php echo (old('stok')) ? old('stok') : $produk['stok']?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat (Gram)</label>
                    <input type="number" class="form-control" name="berat" id="berat" value="<?php echo (old('berat')) ? old('berat') : $produk['berat'] ?>">
                </div>
                
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="<?php echo (old('harga')) ? old('harga') : $produk['harga']?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="deskripsi" class="form-label" class="form-control">Deskripsi Produk</label>
                    <textarea id="deskripsi" name="deskripsi" cols="7" class="form-control" required><?php echo (old('deskripsi')) ? old('deskripsi') : $produk['deskripsi']?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                <div>
                <img src="/img/<?php echo $produk['gambar']?>" class="img-thumbnail mb-4 mt-2" width="150px">
                </div>
                
                <button type="submit" class="btn btn-success btn-block" name="submit">Update</button>
                
            </form>
        </div>
    </div>
<?php $this->endSection() ?>