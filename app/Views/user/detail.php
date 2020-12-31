<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>
    
    <div class="container">
        <img src="/img/<?php echo $produk['gambar']?>" class="img-thumbnail mx-auto d-block mt-4" width="200px">
        
        <?php if($produk["stok"] == 0) { ?>
        <div class="p-3 my-3 alert alert-info">
            Stok produk habis
        </div>
        <?php } ?>
        
        <h3 class="mt-4"><?php echo $produk['nama']?></h3>
        <h5 class="text-success">Rp <?php echo $produk['harga']?></h5>
        <p class="text-muted">Stok: <?php echo $produk['stok']?></p>
        <p><?php echo $jumlah ?> Terjual</p>
        <hr class="dropdown-divider my-3">
        <h5>Deskripsi</h5>
        <p><?php echo $produk['deskripsi']?></p>
        <hr class="dropdown-divider my-3">
        <div class="d-grid gap-2 mb-4">
        <a class="btn btn-success btn-block <?php if($produk['stok'] == 0) {echo 'disabled';} ?>" href="/user/beli/<?php echo $produk['slug']?>">Beli</a>
        </div>
    </div>
    
<?php echo $this->endSection() ?>