<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h2 class="my-4 text-center">Daftar Pesanan</h2>
        
        <?php
            $session = session();
            $kosong = $session->getFlashdata ('empty');
            $beli = $session->getFlashdata ('beli');
        ?>
        
        <?php if($kosong){ ?>
            <div class="my-3 alert alert-info">
                <?php echo $kosong ?>
            </div>
        <?php } ?>
        
        <?php if($beli){ ?>
            <div class="my-3 alert alert-success">
                <?php echo $beli ?>
            </div>
        <?php } ?>
        
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Produk<th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                <?php foreach($pesanan as $p){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $p['nama']?></td>
                    <td><?php echo $p['produk']?></td>
                    <td><a href="/admin/detailpesanan/<?php echo $p['id']?>" class="btn btn-info">Detail</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php echo $this->endSection() ?>