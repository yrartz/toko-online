<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h3 class="mt-5 text-center">Yeay, Produk kamu berhasil dipesan!</h3>
        <h5 class="my-3">Segera upload bukti pembayaran agar produkmu dapat kami kirim</h5>
        <ul>
            <li>BNI: xxxxxxxxxx</li>
            <li>GOPAY: xxxxxxxxx</li>
            <li>OVO: xxxxxxx</li>
            <li>DANA: xxxxxxxxx</li>
        </ul>
        
        <?php
            $session = session();
            $errrors = $session->getFlashdata('errors');
        ?>
        
        <?php if($errors){ ?>
            <div class="my-3 alert alert-danger">
                Terjadi Kesalahan
                <ul>
                    <?php foreach($errors as $err){ ?>
                    <li><?php echo $err ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        
        <form method="post" enctype="multipart/form-data" action="transaksi/struk" class="p-3"></form>
        <div class="my-3">
            <input type="file" name="struk" class="form-control">
            <button type="submit" name="submit" class="btn btn-success">Upload</button>
        </div>
        
    </div>

<?php echo $this->endSection() ?>