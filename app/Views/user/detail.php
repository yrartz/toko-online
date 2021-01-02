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
        
        
        <div id="disqus_thread"></div>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://toko-online-2.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>

        
    </div>
    
<?php echo $this->endSection() ?>