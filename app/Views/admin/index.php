<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <div class="produk mt-5">
            
            <h2 class="text-center mb-4">Daftar Produk</h2>
            
            <form method="post" action="">
            <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="Cari Produk..." name="keyword">
                <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
            </div>
            </form>
            
            <?php 
                $session = session();
                $tambah = $session->getFlashdata('tambah');
                $hapus = $session->getFlashdata('hapus');
                $kosong = $session->getFlashdata('kosong');
                $update = $session->getFlashdata('update');
                $pesananBaru = $session->getFlashdata ('pesananBaru');
            ?>
            
            <?php if($tambah){ ?>
                <div class="alert alert-success p-3">
                    <?= $tambah ?>
                </div>
            <?php } ?>
            
            <?php if($hapus){ ?>
                <div class="alert alert-info p-3">
                    <?= $hapus ?>
                </div>
            <?php } ?>
            
            <?php if($kosong){ ?>
                <div class="alert alert-warning p-3">
                    <?= $kosong ?>
                </div>
            <?php } ?>
            
            <?php if($update){ ?>
                <div class="alert alert-success p-3">
                    <?= $update ?>
                </div>
            <?php } ?>
            
            <?php if($pesananBaru){ ?>
                <div class="my-3 alert alert-warning p-3">
                    <?php echo $pesananBaru ?> <a href="<?php echo base_url('admin/pesanan')?>" class="alert-link">Cek di sini</a>
                </div>
            <?php } ?>
            
            <a href="<?php echo base_url('admin/tambah')?>" class="btn btn-primary mb-2">Tambah Produk</a>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 + (2 * ($currentPage - 1)) ?>
                    <?php foreach($produk as $p){ ?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $p['nama']?></td>
                        <td><img src="/img/<?php echo $p['gambar']?>" width="100px"></td>
                        <td>
                            <a href="/admin/detail/<?php echo $p['slug']?>" class="btn btn-info m-1"><i class="fas fa-info-circle mr-1"></i> Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php echo $pager->links('produk', 'produk_page') ?>
        </div>
    </div>

<?php echo $this->endSection() ?>