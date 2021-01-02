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
        <hr class="dropdown-divider my-3">
        <h5>Deskripsi</h5>
        <p><?php echo $produk['deskripsi']?></p>
        <hr class="dropdown-divider my-3">
        <div class="d-grid gap-2 mb-4">
        <a class="btn btn-success btn-block <?php if($produk['stok'] == 0) {echo 'disabled';} ?>" href="/user/beli/<?php echo $produk['slug']?>">Beli</a>
        </div>
        
        <div class="logo position-fixed" style="top:70%; left:80%">
            <div class="row">
            <p style="font-size:10px" class="mb-0">Contact Us</p>
            <a href="https://wa.me/6281805779263"><img src="<?php echo base_url('profil/wa.png')?>" width="60%" alt="whatsapp"></a>
            </div>
        </div>
        
    </div>
    
<?php echo $this->endSection() ?>