<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="konten p-3">
        <img src="/img/<?php echo $produk['gambar']?>" class="d-block mx-auto my-3" width="150px">
        <h3 class="mb-4 text-center"><?php echo $produk['nama']?></h3>
        <h4 class="text-success">Rp <?php echo $produk['harga']?></h4>
        <p class="text-muted">Stok: <?php echo $produk['stok']?></p>
        <p><?php echo $jumlah ?> Terjual</p>
        <hr class="dropdown-divider my-3">
        <p><?php echo $produk['deskripsi']?></p>
        
        <form method="post" action="/admin/hapus" class="d-inline-block">
            <input type="hidden" name="id_produk" value="<?php echo $produk['id']?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus?')"><i class="fas fa-trash"></i> Hapus</button>
        </form>
        
      <a class="btn btn-warning" href="/admin/update/<?php echo $produk['slug']?>"><i class="fas fa-edit"></i> Update</a>
       
    </div>

<?php echo $this->endSection() ?>