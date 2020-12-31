<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h2 class="text-center my-4">Daftar Pesanan</h2>
        
        <?php
            $session = session();
            $beli = $session->getFlashdata('beli');
            $kosong = $session->getFlashdata('kosong');
        ?>
        
        <?php if($beli){ ?>
            <div class="my-3 alert alert-success p-3">
                <?php echo $beli ?>
            </div>
        <?php } ?>
        
        <?php if($kosong){ ?>
            <div class="my-3 alert alert-info">
                <?php echo $kosong ?>
            </div>
        <?php } ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                <?php foreach($pesanan as $p){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $p['produk']?></td>
                    <td><?php echo $p['jumlah']?></td>
                    <td><?php echo $p['total_harga']?></td>
                    <td><?php echo $p['created_at']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php echo $this->endSection() ?>