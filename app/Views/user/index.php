<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>


    
    <?php 
        $session = session();
        $beli = $session->getFlashdata('beli');
        $cari = $session->getFlashdata('cari');
    ?>
    
    <?php if($beli){ ?>
        <div class="my-3 alert alert-success p-3">
            <?php echo $beli ?>
        </div>
    <?php } ?>
    
    <div class="container">
        <div class="row">
            
            <div class="col-sm-12 col-md-6 mt-5 justify-content-center">
                <form method="post" action="/user/index">
              <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="Cari Produk..." name="keyword" autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
            </div>
                </form>
                
                <?php if($keyword){ ?>
                <p>Hasil pencarian untuk <b>"<?php echo $keyword ?>"</b></p>
                <?php } ?>
                
    <?php if($cari){ ?>
        <div class="my-3 alert alert-info p-3">
            <?php echo $cari ?>
        </div>
    <?php } ?>
                
            </div>

            <div class="col-sm-12 col-md-4">
            <?php foreach($produk as $p){ ?>
                <div class="card mb-3 mr-3">
                    <img src="/img/<?php echo $p['gambar']?>" width="250px" class="mx-auto d-block">
                <div class="card-body">
                    <h3><?php echo $p['nama']?></h3>
                    <h5 class="text-success">Rp <?php echo $p['harga']?></h5>
                    <p class="text-muted">Stok: <?php echo $p['stok']?></p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success d-block" href="/user/detail/<?php echo $p['slug']?>">Lihat Produk</a>
                </div>

            </div>
           <?php } ?>
        </div>
        
        <?php echo $pager->links('produk', 'produk_page') ?>;
        
        </div>
    </div>

<?php echo $this->endSection() ?>