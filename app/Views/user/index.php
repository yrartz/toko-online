<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-10">
               <div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="Cari Produk..." id="keyword">
               <button class="btn btn-success" type="button" id="cari">Cari</button>
               </div>
            </div>
        </div>
    </div>
    
    <?php 
        $session = session();
        $beli = $session->getFlashdata('beli');
    ?>
    
    <?php if($beli){ ?>
        <div class="my-3 alert alert-success p-3">
            <?php echo $beli ?>
        </div>
    <?php } ?>
    
    <div class="container">
        <div class="row">
            <?php foreach($produk as $p){ ?>
            <div class="col-sm-12 col-md-4">
                <div class="card mb-3">
                    <img src="/img/<?php echo $p['gambar']?>" width="150px" class="mx-auto d-block">
                <div class="card-body">
                    <h3><?php echo $p['nama']?></h3>
                    <h5 class="text-success">Rp <?php echo $p['harga']?></h5>
                    <p class="text-muted">Stok: <?php echo $p['stok']?></p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success" href="/user/detail/<?php echo $p['slug']?>">Lihat Produk</a>
                </div>
            <?php } ?>
            </div>
        </div>
        </div>
    </div>

<?php echo $this->endSection() ?>