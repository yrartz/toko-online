<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <div class="produk mt-5">
            
            <h2 class="text-center mb-4">Daftar Produk</h2>
            
            <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="Cari...">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
            </div>
            
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
                    <tr>
                        <th>1</th>
                        <th>Sagu</th>
                        <th>image</th>
                        <th>
                            <a href="<?php echo base_url('admin/detail')?>" class="btn btn-info m-1"><i class="fas fa-info-circle mr-1"></i> Detail</a>
                            <a href="<?php echo base_url('admin/update')?>" class="btn btn-warning m-1"><i class="fas fa-pen-square"></i> Edit</a>
                            <a href="<?php echo base_url('admin/hapus')?>" class="btn btn-danger m-1"><i class="fas fa-trash"></i> Hapus</a>
                        </th>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>

<?php echo $this->endSection() ?>